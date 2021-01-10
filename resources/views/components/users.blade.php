@foreach($users as $user)
    <div class="d-flex justify-content-between mb-4">
        <h3><a href="{{ route('user',$user) }}">{{ $user->name }}</a></h3>
        <form action="{{ route('follow-user', $user) }}" method="POST" class="display:inline-block">
        @csrf
        @method('POST')
            <button class="btn btn-primary ml-4" type="submit">
                @if(auth()->user()->following($user))
                    Unfollow
                @else 
                    Follow
                @endif
            </button>
        </form>
    </div>
@endforeach