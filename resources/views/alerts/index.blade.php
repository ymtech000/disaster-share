@extends('layouts.app')

@section('content')
<h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
<div class="submit-select">
    <form id="submit_form" method="get" action="area_searches">
        @include('commons.area_search')
    </form>
</div>

<div class="conteiner">
    <div class="card-group　mx-auto">
        <div id="lists" class="row">
            @if (count($alerts) > 0)
                <table class="table table-striped">
                    @foreach ($alerts as $alert)
                        <div class="card border-0 col-8 col-sm-10 col-md-4 post-cards">
                            @if($alert->user->image == null)
                                <div class="profile">
                                    <a href="/users/{{$alert->user->id}}"><img class="img-fluid float-left user-img" src="{{ Gravatar::src($alert->user->email, 500) }}" width="35" height="35" alt=""></a>
                                    <p>{{$alert->user->name}}</p>
                                </div>
                            @else
                                <div class="profile">
                                    <a href="/users/{{$alert->user->id}}"><img class="float-left user-img" src="{{$alert->user->image}}" width="35" height="35"></a>
                                    <p>{{$alert->user->name}}</p>
                                </div>
                            @endif
                            <a href="alerts/{{$alert->id}}"><img src="{{$alert->image}}" width="270" height="270" class="img"></a>
                            <div>
                                <div class="col-md-4 title">{{$alert->title}}</div>
                                <div class="col-md-6 heart-button">
                                    @include('favorites.favorite_button', ['alert' => $alert])
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>
                {{ $alerts->links('pagination::bootstrap-4') }}
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
    .title{
        font-weight:bold;
        float:left;
    }
    .contents{
        float:left;
    }
    .user-img{
        border-radius:50%;
        margin-bottom:10px;
    }
    p{
        margin-bottom:10px;
    }
    .submit-select{
        width:170px;
        margin-left:840px;
    }
    .heart-button{
        float:right;
    }
    .fa-search{
        color:black;
    }
</style>
