@extends('layouts.app')

@section('content')
    @include('users.user_info', ['user' => $user])
    @if (count($alerts) > 0)
        @include('alerts.alerts', ['alerts' => $alerts])
    @endif
@endsection
<style>
    .card{
        margin-bottom:70px;
    }
    .follow_button{
        width:100%;
    }
    .name{
        margin-top:30px;
    }
</style>