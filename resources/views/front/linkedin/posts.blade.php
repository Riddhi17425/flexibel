

@section('content')
<div class="container">
    <h2>LinkedIn Posts</h2>
    @if(!empty($posts['elements']))
        @foreach($posts['elements'] as $post)
            <div class="card mb-3">
                <div class="card-body">
                    @if(isset($post['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text']))
                        <p>{{ $post['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text'] }}</p>
                    @endif
                    @if(isset($post['specificContent']['com.linkedin.ugc.ShareContent']['media'][0]['media']))
                        <img src="{{ $post['specificContent']['com.linkedin.ugc.ShareContent']['media'][0]['media'] }}" class="img-fluid">
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p>No posts found.</p>
    @endif
</div>
@endsection
