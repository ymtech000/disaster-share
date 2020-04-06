@extends('layouts.app')

@section('content')
<h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
<div class="conteiner">
    <div class="card-group　mx-auto">
        <div id="lists" class="row">
            @if (count($alerts) > 0)
                <table class="table table-striped">
                    @foreach ($alerts as $alert)
                        <div class="card border-0 col-6 col-sm-6 col-md-4 post-cards">
                            <div class="profile">
                                <a href="users/{{$user->id}}"><img class="avatar-type-circle float-left mr-sm-2 ml-1 d-none d-sm-block" src="/assets/default-a877b525b8bae5a97946d44b91113c09ec0c0b98e34c356205bd37cd299430cb.jpg" width="30" height="30" /></a>
                                <p>{{$alert->user->name}}</p>
                            </div>
                            <a href="alerts/{{$alert->id}}"><img src="{{$alert->image}}" width="270" height="270" class="img"></a>
                            <div class="buttons">
                                <div class="favorite-button">
                                    @include('favorites.favorite_button', ['alert' => $alert])
                                </div>
                                <div class="area"><i class="fa fa-location-arrow"></i> {{$alert->area}}</div>
                            </div>
                            <div class="title">{{$alert->title}}</div>
                        </div>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
<style>
    .profile{
        display:inline;
    }
    .comment{
        float:left;
        margin-right:10px;
    }
    .row{
        padding-left:70px;
        padding-right:70px;
    }
    .img{
        border-radius:5px;
        margin-bottom:10px;
    }
    .favorite-button{
        width:10px;
    }
    .title{
        font-weight:bold;
    }
    .contents{
        float:left;
    }
</style>