<div class="links mb-4 d-flex justify-content-between">
    <a href="{{ route('posts') }}" class="btn btn-md active flex-1 mr-1 {{ Request::path() === 'posts' ? 'btn-primary' : 'btn-light' }}" role="button" aria-pressed="true">Home</a>
    <a href="{{ route('profile', auth()->user()) }}" class="btn  btn-md active flex-1 mr-1 {{ Request::is('profile/*') ? 'btn-primary' : 'btn-light' }}" role="button" aria-pressed="true">Profile</a>
    <a href="{{ route('following-users') }}" class="btn  btn-md active flex-1 mr-1 {{ Request::path() === 'following' ? 'btn-primary' : 'btn-light' }}" role="button" aria-pressed="true">Following</a>
    <a href="{{ route('create-post') }}" class="btn btn-md active flex-1 mr-1 {{ Request::is('posts/create') ? 'btn-primary' : 'btn-light' }}" role="button" aria-pressed="true">Create Post</a>
    <a href="{{ route('explore-users') }}" class="btn btn-md active flex-1 mr-1 {{ Request::path() === 'explore' ? 'btn-primary' : 'btn-light' }}" role="button" aria-pressed="true">Explore</a>
</div>