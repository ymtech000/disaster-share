@extends('layouts.app')

@section('content')
    @include('users.user_info', ['user' => $user])
    @if (count($alerts) > 0)
        @include('alerts.alerts', ['alerts' => $alerts])
    @endif
    <style>
    .name{
        margin-top:30px;
    }
    .follow_button{
        width:100%;
    }
</style>
@endsection