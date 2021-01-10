<div class="comments mt-5">
            <h4 class="mb-5">Comments</h4>
            @forelse($post->comments as $comment)
            <div class="card mt-2 p-2">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>{{ $comment->user->name }} <small class="text-muted" style="font-size:13px">{{ $comment->created_at->diffForHumans() }}</small></h5>
                        <p class="mb-0">{{ $comment->body }}</p>    
                    </div>
                    @if($comment->user->is(auth()->user()))
                        <form action="{{ route('delete-comment', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
            @empty
                <p>No comments yet!</p>
            @endforelse
        </div>