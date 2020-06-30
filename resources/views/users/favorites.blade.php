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
            <div class="card-body"> 
                @if($user->image == null)
                    <img src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200" style="border-radius:10px; margin-bottom:3px;">
                @else
                    <img src="{{$user->image}}" width="200" height="200" style="border-radius:10px;margin-bottom:3px;">
                @endif
                @if (Auth::id() !== $user->id)
                    @if (Auth::user()->is_following($user->id))
                        <button id="follow" class="btn btn-primary btn-black btn-follow" onclick="toggleText(this, {{ $user->id }})" style=" width:200px; height:38px;">フォロー中</button>
                    @else
                        <button id="follow" class="btn btn-primary btn-black btn-follow" onclick="toggleText(this, {{ $user->id }})" style=" width:200px; height:38px;">フォローする</button>
                    @endif
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="name">
                <p style="font-weight:bold;">{{$user->name}}</p>
                <p>{{$user->introduction}}</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    @include('users.navtabs', ['user' => $user])
    @include('alerts.alerts', ['alerts' => $alerts])
<style>
    .name{
        margin-top:30px;
    }
</style>
@endsection