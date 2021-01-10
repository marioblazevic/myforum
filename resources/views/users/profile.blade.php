<x-master>

    <div class="container">
        <h3>{{$user->name}}</h3>
        <p>User since: {{$user->created_at->diffForHumans()}}</p>
        <h5 class="mt-20">Posts from: {{ $user->name }}</h5>
        <div class="posts">
        @forelse($user->myTimeline() as $post)
            <x-post :post="$post"></x-post>
        @empty
            <p class="mt-5">No posts yet!</p>
            <a href="{{ route('create-post') }}">Create your first post?</a>
        @endforelse
        </div>
    </div>

</x-master>