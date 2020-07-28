@extends('layouts.app')

@section('content')
    @include('commons.user_info', ['user' => $user])
    @include('users.users', ['users' => $users])
<style>
    .name{
        margin-top:30px;
    }
    .follow_button{
        width:100%;
    }
</style>
@endsection