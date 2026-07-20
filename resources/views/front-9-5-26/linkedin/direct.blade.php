<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0077B5;
            text-align: center;
            margin-bottom: 30px;
        }
        .linkedin-feed {
            width: 100%;
            margin-top: 20px;
        }
        .post {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: white;
        }
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .company-logo {
            width: 48px;
            height: 48px;
            border-radius: 24px;
            margin-right: 10px;
            background-color: #0077B5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        .company-name {
            font-weight: bold;
            color: #333;
        }
        .post-date {
            color: #777;
            font-size: 0.9em;
            margin-top: 3px;
        }
        .post-content {
            margin-bottom: 15px;
            line-height: 1.5;
            white-space: pre-line; /* Preserve line breaks in LinkedIn posts */
        }
        .post-media {
            margin-top: 10px;
            text-align: center;
        }
        .post-media img {
            max-width: 100%;
            border-radius: 4px;
            max-height: 400px;
        }
        .post-actions {
            display: flex;
            border-top: 1px solid #e0e0e0;
            padding-top: 10px;
            color: #666;
        }
        .post-action {
            margin-right: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .post-action svg {
            margin-right: 5px;
        }
        .post-action span {
            font-size: 0.9em;
        }
        .linkedin-link {
            text-align: center;
            margin-top: 20px;
        }
        .linkedin-button {
            display: inline-block;
            background-color: #0077B5;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }
        .no-posts {
            text-align: center;
            padding: 30px;
            color: #777;
        }
        .loading {
            text-align: center;
            padding: 30px;
            color: #0077B5;
        }
        .error-message {
            text-align: center;
            color: #d32f2f;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #ffebee;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LinkedIn Posts</h1>
        
        <div id="linkedin-feed" class="linkedin-feed">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="post">
                        <div class="post-header">
                            <div class="company-logo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="company-name">{{ env('LINKEDIN_COMPANY_NAME', 'Company Name') }}</div>
                                <div class="post-date">
                                    @if($post['created'])
                                        {{ date('F j, Y', $post['created']/1000) }}
                                    @else
                                        Recent post
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="post-content">
                            {{ $post['text'] }}
                        </div>
                        @if(!empty($post['media']) && !empty($post['media'][0]['thumbnail']))
                            <div class="post-media">
                                <img src="{{ $post['media'][0]['thumbnail'] }}" alt="Post media" 
                                     onerror="this.onerror=null; this.style.display='none';">
                            </div>
                        @endif
                        <div class="post-actions">
                            <div class="post-action">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                </svg>
                                <span>Like</span>
                            </div>
                            <div class="post-action">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <span>Comment</span>
                            </div>
                            <div class="post-action">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 2l4 4-4 4"></path>
                                    <path d="M3 11v-1a4 4 0 0 1 4-4h14"></path>
                                    <path d="M7 22l-4-4 4-4"></path>
                                    <path d="M21 13v1a4 4 0 0 1-4 4H3"></path>
                                </svg>
                                <span>Share</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-posts">
                    <p>No LinkedIn posts found. Please check your LinkedIn connection and credentials.</p>
                    <p>Make sure your OAuth tokens have the necessary permissions to access company posts.</p>
                </div>
            @endif
        </div>
        
        <div class="linkedin-link">
            <a href="https://www.linkedin.com/company/{{ $companyId }}" target="_blank" class="linkedin-button">
                View on LinkedIn
            </a>
        </div>
    </div>
</body>
</html>