@extends('layouts.app')

@section('content')
    @include('users.user_info', ['user' => $user])
    @include('users.users', ['users' => $users])
@endsection