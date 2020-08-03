@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">USERS LIST</h1>
    @include('users.users', ['users' => $users])
@endsection