<x-master>
    <div class="container">
        @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title"><a href="">{{ $post->title }}</a></h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                <p class="card-text">{{ $post->body }}</p>
                <img src="storage/{{ $post->picture_path }}" class="img-fluid mb-2" style="display:block" alt="">

                <x-like :post="$post"></x-like>
                
                <x-comment-delete :post="$post"></x-comment-delete>

            </div>
        </div>

        <x-comment-create :post="$post"></x-comment-create>

        <x-comments :post="$post"></x-comments>

        @endforeach
    </div>
</x-master>