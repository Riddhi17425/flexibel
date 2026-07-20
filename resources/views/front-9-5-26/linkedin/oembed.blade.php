<!-- Save this file as resources/views/front/linkedin/oembed.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>LinkedIn Company Posts</h1>
    
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">
                    <!-- LinkedIn's Official Embed Code -->
                    <div class="linkedin-embed text-center">
                        <!-- LinkedIn JavaScript SDK -->
                        <script src="https://platform.linkedin.com/in.js" type="text/javascript">
                            lang: en_US
                        </script>
                        
                        <!-- Company Profile Plugin -->
                        <div class="mb-4">
                            <div 
                                class="linkedin-company-plugin" 
                                data-id="{{ str_replace(['https://www.linkedin.com/company/', '/'], '', $companyUrl) }}" 
                                data-format="inline" 
                                data-related="false" 
                                data-size="large" 
                                data-type="company-profile">
                            </div>
                        </div>
                        
                        <!-- Company Posts Display -->
                        <div class="mt-5">
                            <h4>Recent Posts</h4>
                            <div class="linkedin-post-container">
                                <!-- LinkedIn Posts Feed Plugin -->
                                <div 
                                    class="linkedin-company-plugin" 
                                    data-id="{{ str_replace(['https://www.linkedin.com/company/', '/'], '', $companyUrl) }}" 
                                    data-posts="true"
                                    data-format="inline" 
                                    data-count="10" 
                                    data-type="company">
                                </div>
                            </div>
                        </div>
                        
                        <!-- View on LinkedIn button -->
                        <div class="mt-4">
                            <a href="{{ $companyUrl }}" class="btn btn-primary" target="_blank">
                                View All Posts on LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .linkedin-company-plugin {
        display: inline-block;
        margin: 0 auto;
        min-width: 300px;
    }
    
    .linkedin-post-container {
        margin-top: 20px;
        min-height: 400px;
    }
    
    /* Responsive adjustments for the plugins */
    @media (max-width: 768px) {
        .linkedin-company-plugin {
            width: 100%;
        }
    }
</style>
@endsection