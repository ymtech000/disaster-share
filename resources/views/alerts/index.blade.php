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
                                    @if (Auth::id() != $alert->id)
                                        @if (Auth::user()->is_favorite($alert->id))
                                            {!! Form::open(['route' => ['alerts.unfavorite', $alert->id], 'method' => 'delete']) !!}
                                                <button name="button" type="submit" class="heart-button" style="cursor:pointer">
                                                <button type="submit"　class="unavorite-btn" id="unfavorite-btn" onclick="getData({{$alert->id}})" style="cursor:pointer;">
                                                    <span class="fas fa-thumbs-up unfavorite-btn"></span>
                                                </button>
                                            
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::open(['route' => ['alerts.favorite', $alert->id]]) !!}
                                                <button type="submit"　class="favorite-btn" id="favorite-btn" onclick="getData({{$alert->id}})" style="cursor:pointer;">
                                                    <span class="far fa-thumbs-up favorite-btn"></span>
                                                </button> 
                                            {!! Form::close() !!}
                                        @endif
                                    @endif
                                    <style>
                                        .favorite-btn{
                                            color:red;
                                        }
                                    </style>
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    // いいねボタン押下
    $('#favorite-btn').click(function getData(id) {
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/alerts/'+ id +'/favorite',
            type: 'POST',
            data: {'id': id},
        })
        // Ajaxリクエストが成功した場合
        .done(function() {
            alert('通信に成功しました。');
        // Ajaxリクエストが失敗した場合
        }).fail(function() {
                alert('通信に失敗しました。');
        });
    });

    
    
    $('#unfavorite-btn').click(function getData(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/alerts/'+ id +'/unfavorite',
            type: 'POST',
            data: {'id': id},
        })
        .done(function() {
                alert('通信に成功しました。');
            // Ajaxリクエストが失敗した場合
            }).fail(function() {
                alert('通信に失敗しました。');
            });
    });
        
     
</script>    




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
