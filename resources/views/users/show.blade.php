@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">YOUR PAGE</h1>
    
    <form action="users/{{Auth::user()->id}}/image" method="post" enctype="multipart/form-data">
        <div class="form-group">
                画像
            <div class="file_upload">
                <input type="file" id="file_upload" name="thefile">
            </div>
        </div>
        <input type="submit">
    </form>
    @if($user->image !== null)
        <img src="{{$user->image}}">
    @endif
    <div class="profile">
        <div class="card">
            <div class="card-body">
                <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
            <h3>{{ $user->name}}</h3>
        </div>
    </div>
    <div>
        <div class="navtabs">
            @include('users.navtabs', ['user' => $user])
        </div>
        @if (count($alerts) > 0)
            @include('alerts.alerts', ['alerts' => $alerts])
        @endif
    </div>
@endsection
<style>
    .img-fluid {
        border-radius: 50%;  /* 角丸半径を50%にする(=円形にする) */
        width:  180px;       /* ※縦横を同値に */
        height: 180px;       /* ※縦横を同値に */
    }
    .card{
        text-align:center;
        height:300px;
        width:300px;
    }
    .card-header{
        width:300px;
    }
    .profile{
        text-align:center;
    }
    h2{
        text-align:center;
    }
    .navtabs{
        padding-top:50px;
    }
</style>
