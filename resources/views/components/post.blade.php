<div class="card mt-3">
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('post', $post) }}">{{ $post->title }}</a></h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
        <p class="card-text">{{ $post->body }}</p>
        <img src="{{asset('storage/'.$post->picture_path) }} " class="img-fluid mb-2" style="display:block" alt="">

        <x-like :post="$post"></x-like>

        @if(auth()->user()->is($post->user))
        <a href="{{ route('posts-edit', $post) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('posts-delete', $post) }}" style="display:inline-block" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger ml-3" type="submit">Delete</button>
        </form>
        @endif
    </div>
</div>