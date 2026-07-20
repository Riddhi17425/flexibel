@include('layouts.header')

<section>
    <div class="text-center mb-4">
        <h1>LinkedIn Feed</h1
    </div>
    <div class="container">
        <div>
            <div class="row g-4">
                @forelse ($feed as $post)
                    @php
                        $description = $post['text']['text'] ?? '';
                        $contentEntities = $post['content']['contentEntities'][0] ?? [];
                        $mediaUrl = null;

                        if (!empty($contentEntities['thumbnails'][0]['imageSpecificContent']['url'])) {
                            $mediaUrl = $contentEntities['thumbnails'][0]['imageSpecificContent']['url'];
                        } elseif (!empty($contentEntities['entityLocation'])) {
                            $mediaUrl = $contentEntities['entityLocation'];
                        } else {
                            $mediaUrl = asset('images/default-placeholder.jpg');
                        }

                        $activityUrn = $post['activity'] ?? $post['id'] ?? '';
                        preg_match('/urn:li:(activity|share):(\d+)/', $activityUrn, $matches);
                        $activityId = $matches[2] ?? null;

                        $permalink = $activityId
                            ? "https://www.linkedin.com/feed/update/urn:li:activity:$activityId"
                            : '#';

                        $mediaType = $contentEntities['mediaType'] ?? ''; // Check if it's a video
                    @endphp

                    <div class="col-lg-4 d-flex">
                        <div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px">
                            @if ($mediaUrl)
                                @if (Str::contains($mediaType, 'VIDEO'))
                                    <video class="linkedin_img img-fluid" controls muted>
                                        <source src="{{ $mediaUrl }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ $mediaUrl }}" alt="LinkedIn Media" class="linkedin_img img-fluid">
                                @endif
                            @endif

                            @if (!empty($description))
                                <p class="mt-3" style="font-size: 16px">{{ Str::limit($description, 100) }}</p>
                            @endif

                            <div class="text-center">
                                <a href="{{ $permalink }}" target="_blank" class="prod_btn">
                                    View on LinkedIn
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No LinkedIn posts found.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
