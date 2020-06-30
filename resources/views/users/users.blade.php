@if (count($users) > 0)
    @foreach ($users as $user)
        <div class="card-body">
            <a href="/users/{{$user->id}}" style="color:black; text-decoration: none;"><p style="font-weight:bold;">{{$user->name}}</p></a>
            @if($user->image == null)
                <a href="/users/{{$user->id}}"><img class=" user-img avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200" style="border-radius:10px;"></a>
            @else
                <a href="/users/{{$user->id}}"><img class="user-img" src="{{$user->image}}" width="200" height="200" style="border-radius:10px;"></a>
            @endif
           <p> @include('user_follow.follow_button', ['user' => $user])</p>
        </div>
        {{ $users->links('pagination::bootstrap-4') }}
    @endforeach
@endif