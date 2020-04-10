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
                                <a href="users/{{$user->id}}"><img class="float-left user-image" src="{{$alert->user->image}}" width="35" height="35"></a>
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
    .user-image{
        border-radius:50%;
        margin-right:10px;
        margin-bottom:10px;
    }
    p{
        margin-bottom:10px;
    }
</style>