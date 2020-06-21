
    <div class="card-body"> 
                @if($user->image == null)
                    <img src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200" style="border-radius:10px;">
                @else
                    <img src="{{$user->image}}" width="200" height="200" style="border-radius:10px;">
                @endif
                <div class="follow">@include('user_follow.follow_button', ['user' => $user])</div>
            </div>
    @include('user_follow.follow_button', ['user' => $user])

    
        