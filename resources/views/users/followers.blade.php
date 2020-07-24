@extends('layouts.app')

@section('content')
    <div class="error">
        @if (\Session::has('error'))
            <div class="alert alert-error" id="error">
                {!! \Session::get('error') !!}
            </div>
        @endif
    </div>
    <div class='form-row'>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            @include('users.card', ['user'=>$user])
        </div>
        <div class="col-md-3">
            <div class="name">
                <p style="font-weight:bold;">{{$user->name}}</p>
                <p>{{$user->introduction}}</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
  
    <div class="navtabs">
        @include('users.navtabs', ['user' => $user])
    </div>
    @include('users.users', ['users' => $users])
    <style>
        .name{
            margin-top:30px;
        }
    </style>
@endsection