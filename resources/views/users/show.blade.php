@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">YOUR PAGE</h1>
    {!! link_to_route('profile_edit.index', 'プロフィールを編集', [], ['class' => 'btn btn-light']) !!}
    {!! link_to_route('users.edit', 'プロフ編集',['id' => $user->id], ['class' => 'btn btn-light']) !!}
    @if($user->image == null)
    <div class="profile">
        <div class="card">
            <div class="card-body">
                <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
            <h3>{{ $user->name}}</h3>
        </div>
    </div>
    @else
    <img src="{{$user->image}}" width="300" height="300">
    @endif
    
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
