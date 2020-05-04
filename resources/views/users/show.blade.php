@extends('layouts.app')

@section('content')
    @if(Auth::user()->id == $user->id)
        <h1 class="text-center font-weight-bold font-family-Tahoma">YOUR PAGE</h1>
    @else
        <h1 class="text-center font-weight-bold font-family-Tahoma">USER PAGE</h1>
    @endif
    <div class="container">
        <div class="row">
            <aside class="col-sm-4 col-md-4">
                @include('users.card', ['user' => $user])
            </aside>
            <div class="introduction col-sm-8 col-md-8">{{$user->introduction}}</div>
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
    .card{
        margin-bottom:70px;
    }
</style>