<div class="form-row">
    <div class="offset-md-2 col-md-3">
        <div style="text-align:center">
            @include('users.card', ['user' => $user])
        </div>  
    </div>
    <div class="col-md-6 name">
        <p style="font-weight:bold;">{{$user->name}}</P>
        <p>{{$user->introduction}}</p>
    </div>
    @include('users.navtabs', ['user' => $user])
</div>
<link rel="stylesheet" href="{{asset('/css/users_user_info.css')}}">