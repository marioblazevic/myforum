<h3 class="mt-4">Posts from people i follow:</h3>
@forelse($posts as $post)
    <x-post :post="$post"></x-post>
@empty
    <p class="mt-5">No posts yet!</p>
    <a href="{{ route('create-post') }}">Create your first post?</a>
@endforelse