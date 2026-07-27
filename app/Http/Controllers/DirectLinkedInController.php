<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DirectLinkedInController extends Controller
{
    // LinkedIn credentials (store these in .env file in production)
    private $organizationId;
    private $clientId;
    private $clientSecret;
    private $companyName;

    public function __construct()
    {
        // Get credentials from environment variables
        $this->organizationId = env('LINKEDIN_ORGANIZATION_ID');
        $this->clientId       = env('LINKEDIN_CLIENT_ID');
        $this->clientSecret   = env('LINKEDIN_CLIENT_SECRET');
        $this->companyName    = env('LINKEDIN_COMPANY_NAME', 'Company Name');
    }

    /**
     * Display LinkedIn posts directly on the page with no redirects
     */
    public function index()
    {
        // Automatically ensure we have a token
        $accessToken = $this->ensureAccessToken();

        // Fetch LinkedIn posts
        $posts = $this->getLinkedInPosts($accessToken);

        // Return the view with posts
        return view('front.linkedin.direct', [
            'companyId'   => $this->organizationId,
            'companyName' => $this->companyName,
            'posts'       => $posts,
        ]);
    }

    /**
     * Make sure we have a valid access token
     */
    private function ensureAccessToken()
    {
        // Check if we have a cached token
        if (Cache::has('linkedin_access_token')) {
            Log::info('Using cached LinkedIn token');
            return Cache::get('linkedin_access_token');
        }

        // No cached token, get a new one
        Log::info('Obtaining new LinkedIn token');
        return $this->getAccessToken();
    }

    /**
     * Get a new LinkedIn access token
     */
    private function getAccessToken()
    {
        try {
            Log::info('Requesting new LinkedIn access token');

            // Make request to get token
            $response = Http::asForm()->post('https://www.linkedin.com/oauth/v2/accessToken', [
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]);

            // Debug the response
            Log::debug('LinkedIn token response: ' . $response->body());

            if ($response->successful()) {
                $data        = $response->json();
                $accessToken = $data['access_token'];
                $expiresIn   = $data['expires_in'] - 300; // Cache for 5 minutes less than the actual expiration

                // Cache the token
                Cache::put('linkedin_access_token', $accessToken, $expiresIn);

                Log::info('LinkedIn token obtained successfully');
                return $accessToken;
            }

            // If we couldn't get a token, log the error
            Log::error('LinkedIn token error: ' . $response->body());
        } catch (\Exception $e) {
            Log::error('LinkedIn token exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Get LinkedIn posts for the organization
     */
    private function getLinkedInPosts($accessToken)
    {
        // Create cache key based on organization ID
        $cacheKey = 'linkedin_posts_' . $this->organizationId;

        // Check if we have cached posts
        if (Cache::has($cacheKey)) {
            Log::info('Using cached LinkedIn posts');
            return Cache::get($cacheKey);
        }

        if (! $accessToken) {
            Log::error('No LinkedIn access token available');
            return []; // Return empty array if no token
        }

        // First try to get posts using the shares endpoint
        $posts = $this->getPostsFromSharesEndpoint($accessToken);

        // If we couldn't get posts from shares endpoint, try UGC Posts endpoint
        if (empty($posts)) {
            Log::info('No posts from shares endpoint, trying UGC endpoint');
            $posts = $this->getPostsFromUgcEndpoint($accessToken);
        }

        // Cache the posts for 1 hour if we got any
        if (! empty($posts)) {
            Cache::put($cacheKey, $posts, 3600);
        }

        return $posts;
    }

    /**
     * Get posts from the shares endpoint
     */
    private function getPostsFromSharesEndpoint($accessToken)
    {
        try {
            Log::info('Fetching posts from LinkedIn shares endpoint');

            // Fetch posts from LinkedIn API
            $response = Http::withHeaders([
                'Authorization'             => 'Bearer ' . $accessToken,
                'X-Restli-Protocol-Version' => '2.0.0',
            ])->get("https://api.linkedin.com/v2/shares", [
                'q'      => 'owners',
                'owners' => 'urn:li:organization:' . $this->organizationId,
                'count'  => 10,
            ]);

            // Log the raw response for debugging
            Log::debug('LinkedIn shares API response: ' . $response->body());

            if ($response->successful()) {
                $data  = $response->json();
                $posts = $data['elements'] ?? [];

                // Process the posts
                return $this->processSharesPosts($posts);
            }

            // If we couldn't get posts, log the error
            Log::error('LinkedIn shares API error: ' . $response->body());
        } catch (\Exception $e) {
            Log::error('LinkedIn shares exception: ' . $e->getMessage());
        }

        return [];
    }

    /**
     * Get posts from the UGC Posts endpoint
     */
    private function getPostsFromUgcEndpoint($accessToken)
    {
        try {
            Log::info('Fetching posts from LinkedIn UGC endpoint');

            // Fetch posts from LinkedIn API
            $response = Http::withHeaders([
                'Authorization'             => 'Bearer ' . $accessToken,
                'X-Restli-Protocol-Version' => '2.0.0',
            ])->get("https://api.linkedin.com/v2/ugcPosts", [
                'q'       => 'authors',
                'authors' => 'List(urn:li:organization:' . $this->organizationId . ')',
                'count'   => 10,
            ]);

            // Log the raw response for debugging
            Log::debug('LinkedIn UGC API response: ' . $response->body());

            if ($response->successful()) {
                $data  = $response->json();
                $posts = $data['elements'] ?? [];

                // Process the posts
                return $this->processUgcPosts($posts);
            }

            // If we couldn't get posts, log the error
            Log::error('LinkedIn UGC API error: ' . $response->body());
        } catch (\Exception $e) {
            Log::error('LinkedIn UGC exception: ' . $e->getMessage());
        }

        return [];
    }

    /**
     * Process posts from shares endpoint
     */
    private function processSharesPosts($posts)
    {
        $enrichedPosts = [];

        foreach ($posts as $post) {
            // Extract text content
            $text = $post['text']['text'] ?? '';

            // Extract media (images, videos, etc.)
            $media = [];
            if (isset($post['content']['contentEntities'])) {
                foreach ($post['content']['contentEntities'] as $mediaItem) {
                    if (isset($mediaItem['thumbnails'])) {
                        $media[] = [
                            'type'      => $mediaItem['thumbnails'][0]['resolvedUrl'] ? 'READY' : 'PROCESSING',
                            'thumbnail' => $mediaItem['thumbnails'][0]['resolvedUrl'] ?? '',
                        ];
                    }
                }
            }

            // Create enriched post
            $enrichedPosts[] = [
                'id'      => $post['id'] ?? '',
                'text'    => $text,
                'media'   => $media,
                'created' => $post['created']['time'] ?? null,
            ];
        }

        return $enrichedPosts;
    }

    /**
     * Process posts from UGC endpoint
     */
    private function processUgcPosts($posts)
    {
        $enrichedPosts = [];

        foreach ($posts as $post) {
            // Extract text content
            $text = '';
            if (isset($post['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text'])) {
                $text = $post['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text'];
            }

            // Extract media (images, videos, etc.)
            $media = [];
            if (isset($post['specificContent']['com.linkedin.ugc.ShareContent']['media'])) {
                foreach ($post['specificContent']['com.linkedin.ugc.ShareContent']['media'] as $mediaItem) {
                    if (isset($mediaItem['thumbnails'])) {
                        $media[] = [
                            'type'      => $mediaItem['status'] ?? 'READY',
                            'thumbnail' => $mediaItem['thumbnails'][0]['url'] ?? '',
                        ];
                    }
                }
            }

            // Create enriched post
            $enrichedPosts[] = [
                'id'      => $post['id'] ?? '',
                'text'    => $text,
                'media'   => $media,
                'created' => $post['created']['time'] ?? null,
            ];
        }

        return $enrichedPosts;
    }
}
