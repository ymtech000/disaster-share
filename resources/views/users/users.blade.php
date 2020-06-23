@if (count($users) > 0)
    <div class="card-body">
        <p>{{$user->name}}</p>
        @if($user->image == null)
            <a href="/users/{{$user->id}}"><img class=" user-img avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200"></a>
        @else
            <a href="/users/{{$user->id}}"><img class="user-img" src="{{$user->image}}" width="200" height="200"></a>
        @endif
        @include('user_follow.follow_button', ['user' => $user])
    </div>
    {{ $users->links('pagination::bootstrap-4') }}
@endif
