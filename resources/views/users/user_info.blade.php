<div class="form-row">
    <div class="offset-md-3 col-md-3">
        <div class="user_icon">
            @include('users.card', ['user'=>$user])
        </div>
    </div>
    <div class="col-md-5">
        <div class="name">
            <p style="font-weight:bold;">{{$user->name}}</p>
            <p>{{$user->introduction}}</p>
        </div>
    </div>
</div>
@include('users.navtabs', ['user'=>$user])
<link rel="stylesheet" href="{{asset('/css/users_user_info.css')}}">