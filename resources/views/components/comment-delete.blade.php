@if(auth()->user()->is($post->user))
    <a href="{{ route('posts-edit', $post) }}" class="btn btn-success">Edit</a>
    <form action="{{ route('posts-delete', $post) }}" style="display:inline-block" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger ml-3" type="submit">Delete</button>
    </form>
@endif