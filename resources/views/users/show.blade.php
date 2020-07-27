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
        <div class="col-md-2"></div>
        <div class="col-md-3">
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
        @if (count($alerts) > 0)
            @include('alerts.alerts', ['alerts' => $alerts])
        @endif
@endsection
<style>
    .card{
        margin-bottom:70px;
    }
    /*.follow{*/
    /*    width:200px;*/
    /*}*/
    .btn{
        width:90%;
    }
    .name{
        margin-top:30px;
    }
</style>