<div class="links mb-4 d-flex justify-content-between">
    <a href="{{ route('posts') }}" class="btn btn-light btn-md active flex-1 mr-1" role="button" aria-pressed="true">Home</a>
    <a href="{{ route('profile', auth()->user()) }}" class="btn btn-light btn-md active flex-1 mr-1" role="button" aria-pressed="true">Profile</a>
    <a href="{{ route('following-users') }}" class="btn btn-light btn-md active flex-1 mr-1" role="button" aria-pressed="true">Following</a>
    <a href="{{ route('create-post') }}" class="btn btn-light btn-md active flex-1 mr-1" role="button" aria-pressed="true">Create Post</a>
    <a href="{{ route('explore-users') }}" class="btn btn-light btn-md active flex-1 mr-1" role="button" aria-pressed="true">Explore</a>
</div>