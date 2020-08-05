@if (count($users) > 0)
    <div class='form-row'>
        @foreach ($users as $user)
            <div id="user_card{{$user->id}}" class="col-sm-3 user_card" style="text-align:center;">
                <div class="card-body">
                    <p class="user_name" style="font-weight:bold;">
                        <a href="/users/{{$user->id}}" style="color:black;">
                            {{$user->name}}
                        </a>
                    </p>
                    @if($user->image == null)
                        <a href="/users/{{$user->id}}"><img class=" user-img avatar-type-circle" src="{{ Gravatar::src($user->email) }}" alt=""  style="width:100%; max-width:250px;"></a>
                    @else
                        <a href="/users/{{$user->id}}"><img class="user-img" src="{{$user->image}}" style="max-width:250px;"></a>
                    @endif
                    @include('user_follow.follow_button', ['user'=>$user])
                </div>
            </div>
        @endforeach
    </div>
    {{ $users->links('pagination::bootstrap-4') }}
@endif
<script src="{{asset('/js/users_response.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/users_users.css')}}">
