@extends('layouts.app')

@section('content')
<h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
    {!! Form::open(['route' => 'post_searches.index', 'method' => 'get']) !!}
        <ul>
            <li>{!! Form::text('search' ,'', ['class' => 'form-control', 'placeholder' => '検索はこちらから'] ) !!}</li>
            <button type="submit" name="button">
                <span style="color:black" class="fas fa-search"></span>
            </button>
        </ul>
    {!! Form::close() !!}
    <div class="container">
        <!--検索ボタンが押された時に表示される-->
        @if(!empty($datas))
        <!--検索条件に一致した投稿を表示-->
            <div class="conteiner">
                <div class="card-group　mx-auto">
                    <div id="lists" class="row">
                        <table class="table table-striped">
                            @foreach ($datas as $data)
                                <div class="card border-0 col-8 col-sm-6 col-md-4 post-cards">
                                    @if($data->user->image == null)
                                        <div class="profile">
                                            <a href="/users/{{$data->user->id}}"><img class="img-fluid float-left user-img" src="{{ Gravatar::src($data->user->email, 500) }}" width="35" height="35" alt=""></a>
                                            <p>{{$data->user->name}}</p>
                                        </div>
                                    @else
                                        <div class="profile">
                                            <a href="/users/{{$data->user->id}}"><img class="float-left user-img" src="{{$data->user->image}}" width="35" height="35"></a>
                                            <p>{{$data->user->name}}</p>
                                        </div>
                                    @endif
                                    <a href="alerts/{{$data->id}}"><img src="{{$data->image}}" width="270" height="270" class="img"></a>
                                    <div class="card-body border-bottom">
                                        <div class="contents">
                                            <div class="comment">コメント数：{{count($data->alertcomments)}}</div>
                                            <div class="text-muted">{{$data->time}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                        
                    </div>
                </div>
            </div>
        @endif
    </div>  
@endsection
<style>
    .profile{
        display:inline;
    }
    .form-group{
        width:300px;
        margin:0 auto;
    }
    .comment{
        float:left;
        margin-right:10px;
    }
    .search{
        display:inline-block;
    }
    .img{
        border-radius:5px;
    }
    .user-img{
        border-radius:50%;
        margin-right:10px;
        margin-bottom:10px;
    }
    li{
        display:inline-block;
    }
</style>
