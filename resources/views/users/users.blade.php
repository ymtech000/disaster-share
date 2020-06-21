@if (count($users) > 0)
    @if($user->image == null)
        <div class="card-body">
            <p>{{$user->name}}</p>
            <a href="/users/{{$user->id}}"><img class=" user-img avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200"></a>
             @include('user_follow.follow_button', ['user' => $user])
        </div>
    @else
        <div class="card-body">
            <p>{{ $user->name}}</p>
            <a href="/users/{{$user->id}}"><img class="user-img" src="{{$user->image}}" width="200" height="200"></a>
             @include('user_follow.follow_button', ['user' => $user])
        </div>
    @endif
    {{ $users->links('pagination::bootstrap-4') }}
@endif
