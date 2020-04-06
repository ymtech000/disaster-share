@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'post_searches.index', 'method' => 'get']) !!}
        <div class="form-group">
            {!! Form::text('search' ,'', ['class' => 'form-control', 'placeholder' => '検索はこちらから'] ) !!}
            <div class="search">
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <h3 class="brown p-2">投稿一覧</h3>
    <div class="container">
        <!--検索ボタンが押された時に表示される-->
        @if(!empty($datas))
        <!--検索条件に一致した投稿を表示-->
            <div class="conteiner">
                <div class="card-group　mx-auto">
                    <div id="lists" class="row">
                        <table class="table table-striped">
                            @foreach ($datas as $data)
                                <div class="card border-0 col-6 col-sm-6 col-md-4 post-cards">
                                    <div class="profile">
                                            <a href="/users/47"><img class="avatar-type-circle float-left mr-sm-2 ml-1 d-none d-sm-block" src="/assets/default-a877b525b8bae5a97946d44b91113c09ec0c0b98e34c356205bd37cd299430cb.jpg" width="30" height="30" /></a>
                                            <div>{{$data->user->name}}</div>
                                    </div>
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
        margin-top:20px;
    }
    .img{
        border-radius:5px;
    }
</style>
