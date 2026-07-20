<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LinkedInController extends Controller
{
    public function fetchPosts()
    {
        $accessToken = 'AQUkgFkgamnNOUyaHzWM1Q9INCe9IGrjVZz52CFnTJRzC-yH7x2KTnMoJtUWOm9Tw6i1FbBdMccG63tvEH_tm3FCCQ9CHJ_4I1MVoQ5__FRSsU0AkXKl_HT7Gw1FSXH_u_uJ1dqbts3B-BvOnAJRrwWVvMazl_3JWLC2DTQKE85Vdrj247Z13KHA3USZdL6qUq6LJiNDLzcl-gI4mtioa1xbMqvnbhig9kY0KbuW49fV7ulKpH2aolFgMB6u5Y2Aqix2eaTzwiQLFWnUdoN5cTG-O-kX1Y8S5JYRUEw1_OFawb5GHCyideHAIVvOcsKLux55HITwZflwIzymhfY7HkkndsRxFQ';

        $client = new Client();

        try {
            // Get your LinkedIn user ID (URN format)
            $profileResponse = $client->request('GET', 'https://api.linkedin.com/v2/me', [
                'headers' => [
                    'Authorization' => "Bearer $accessToken"
                ]
            ]);

            $profile = json_decode($profileResponse->getBody(), true);
            $userUrn = $profile['id']; // Example: 'abcdef123456'

            // Fetch UGC posts created by the user
            $postsResponse = $client->request('GET', "https://api.linkedin.com/v2/ugcPosts?q=authors&authors=List(urn:li:person:$userUrn)&sortBy=LAST_MODIFIED", [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'X-Restli-Protocol-Version' => '2.0.0'
                ]
            ]);

            $posts = json_decode($postsResponse->getBody(), true);

            return view('linkedin.posts', compact('posts'));

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
