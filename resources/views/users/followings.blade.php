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
        <div class="offset-md-2 col-md-3">
            <span style="text-align:center;">
                @include('users.card', ['user'=>$user])
            </span>
        </div>
        <div class="col-md-6">
            <div class="name">
                <p style="font-weight:bold;">{{$user->name}}</p>
                <p>{{$user->introduction}}</p>
            </div>
        </div>
    </div>
    <div class="navtabs">
        @include('users.navtabs', ['user' => $user])
    </div>
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