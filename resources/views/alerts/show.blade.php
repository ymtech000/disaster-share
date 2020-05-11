<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Disaster-Share</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @include('commons.navbar')
        
        <div class="container">
            
          <h1 class="text-center font-weight-bold font-family-Tahoma">DETAILS</h1>
    
    <div class='form-row'>
        <div class="card border-0 col-6 col-md-4 post-cards">
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
            @if(Auth::id() == $alert->user_id)
                <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                <ul class="dropdown-menu" style="list-style: none;">
                    <li class="dropdown-item">
                        <a href="{{ route('alerts.edit', ['id' => $alert->id]) }}"><span class="fa fa-edit" style="color:black;"></span></a>
                        {!! link_to_route('alerts.edit', '編集', ['id' => $alert->id], ['class' => 'btn btn-default']) !!}
                    </li>
                    <li class="dropdown-item">
                        <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alert-delete"><span class="fa fa-trash delete-btn" style="cursor:pointer; color:black;"></span></a>
                        <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alert-delete">削除</a>
                    </li>
                </ul>
            @endif
            <div class="img">
                <img class="place-img" src="{{$alert->image}}" width="450" height="450">
            </div>
        </div>
        <div class="map">
            @include('commons.map')
        </div>
    </div>
    <div class='form-row'>
        <h2 class="col-md-4">{{$alert->title}}</h2>
        <div class="buttons col-md-2">
            <div class="heart-button">
                @include('favorites.favorite_button', ['alert' => $alert])
            </div>
        </div>
    </div>
    <div class='form-row'>
        <div class='col-md-7'>
            <table class="table table-bordered">
                <tr>
                    <th>メッセージ</th>
                    <td>{{ $alert->content }}</td>
                </tr>
            </table>
        </div>
        <div class='col-md-5'>
            <table class="table table-bordered">
                <tr>
                    <th>エリア</th>
                    <td>{{ $alert->area }}</td>
                </tr>
                <tr>
                    <th>場所</th>
                    <td>{{ $alert->location }}</td>
                </tr>
                <tr>
                    <th>時間</th>
                    <td>{{ $alert->time }}</td>
                </tr>
            </table>
        </div>
    </div>
    
    {!! Form::open(['route' => 'alertcomments.store']) !!}
        <div class="form-group">
            {{ Form::hidden('alert_id', $alert->id) }}
            {!! Form::label('comment', 'コメント', ['class' => 'comment']) !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('コメントする', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    
    <div class="comment"><span class="far fa-comment"></span>{{count($alert->alertcomments)}}</div>
    <div align="left">
        @if(count($alert->alertcomments)>0)
                <div class="card card-body">
                    @foreach($alert->alertcomments as $alertcomment)
                        <table class="table table-bordered">
                            <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alertcomment-comment-thread">
                                <thread>
                                    <td>
                                        <div class="profile">
                                            <a href="/users/{{$alert->user->id}}"><img class="img-fluid float-left user-img" src="{{ Gravatar::src($alert->user->email, 500) }}" width="35" height="35" alt=""></a>
                                        </div>
                                    </td>
                                    <td>{{$alertcomment->user->name}}</td>
                                    <td>{{$alertcomment->comment}}</td>
                                    <td>{{$alertcomment->time}}</td>
                                    <td><button type="button" onclick="getData(<?php echo $alertcomment->id; ?>)">{{$alertcomment->id}}</button></td>
                                    <td>
                                        <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                                        <ul class="dropdown-menu" style="list-style: none;">
                                            <li class="dropdown-item">
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alertcomment-comment"><span class="far fa-comment" style=" color:black;"></span></a>
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alertcomment-comment">コメント</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alertcomment-delete"><span class="fa fa-trash delete-btn" style=" color:black;"></span></a>
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alertcomment-delete">削除</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{ route('alertcomments.edit', ['id' => $alertcomment->id]) }}"><span class="fa fa-edit" style=" color:black;"></span></a>
                                                {!! link_to_route('alertcomments.edit', '編集', ['id' => $alertcomment->id], ['class' => 'btn btn-default']) !!}
                                            </li>
                                        </ul>
                                    </td>
                                </thread>
                            </a>
                        </table>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <!--ボタン・リンククリック後に表示される画面の内容 -->
    <div class="modal fade" id="alert-delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">投稿削除確認画面</h4></h4>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                    </div>
                    <div class="modal-body">
                        <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                    </div>
                    <div class="modal-footer">
                        {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                            <input class="btn btn-danger" type="submit" value="削除">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
     <!--ボタン・リンククリック後に表示される画面の内容 -->
    @if($alertcomment !== null)
        <div class="modal fade" id="alertcomment-comment" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">コメント</h4>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                    </div>
                    <div class="modal-body">
                        @include('commons.error_messages')
                        {!! Form::open(['route' => 'alertcomments.store']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::hidden('alert_id', $alertcomment->alert_id) }}
                            {{ Form::hidden('parent_id', $alertcomment->id) }}
                            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                            @endif
                        </div>
                        {!! Form::submit('コメントする', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    <!--ボタン・リンククリック後に表示される画面の内容 -->
    <div class="modal fade" id="alertcomment-delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">投稿削除確認画面</h4>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                    </div>
                    <div class="modal-body">
                        <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                    </div>
                    <div class="modal-footer">
                        {!! Form::model($alertcomment, ['route' => ['alertcomments.destroy', $alertcomment->id], 'method' => 'delete']) !!}
                            <input class="btn btn-danger" type="submit" value="削除">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        var alertcomment = @json($alertcomment);
        var alertcomment_id = [{
            id: Number(alertcomment.id),
            }];
            
        console.log(alertcomment);
        console.log(alertcomment_id);
        
    function getData(alertcomment_id) {
        $.ajax({
            url: 'alertcomments/add/{alertcomment_id}',
            type : 'POST',
            dataType : 'json',
            data: {'alertcomment_id': alertcomment_id},
            headers : {
            　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function(json) {
            alert(json['responseData']);
        }).fail(function() {
            alert('通信に失敗しました。');
        });
    }
    </script>
    <div id="text"></div>
        
    @endif
        </div>
         <!--ボタン・リンククリック後に表示される画面の内容 -->
        <!--<div class="modal fade" id="alertcomment-comment-thread" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">-->
        <!--    <div class="modal-dialog">-->
        <!--        <div class="modal-content">-->
        <!--            <div class="modal-header">-->
        <!--                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>-->
        <!--            </div>-->
        <!--            <div class="modal-body">-->
        <!--                @if(count($alert->alertcomments)>0)-->
        <!--                        <div class="card card-body">-->
        <!--                            @foreach($alert->alertcomments->where('parent_id', null) as $alertcomment)-->
        <!--                                <table>-->
        <!--                                    <thread>-->
        <!--                                        <tr>-->
        <!--                                            <td>{{$alertcomment->user->name}}</td>-->
        <!--                                            <td>{{$alertcomment->comment}}</td>-->
        <!--                                            <td>{{$alertcomment->time}}</td>-->
        <!--                                        </tr>-->
        <!--                                    </thread>-->
        <!--                                </table>-->
                                        <!--@foreach($alert->alertcomments->where('parent_id', $alertcomment->id) as $alertcomment)-->
                                        <!--    <table>-->
                                        <!--        <thread>-->
                                        <!--            <tr>-->
                                        <!--                <td>{{$alertcomment->user->name}}</td>-->
                                        <!--                <td>{{$alertcomment->comment}}</td>-->
                                        <!--                <td>{{$alertcomment->time}}</td>-->
                                        <!--            </tr>-->
                                        <!--        </thread>-->
                                        <!--    </table>-->
                                        <!--@endforeach-->
        <!--                            @endforeach-->
        <!--                        </div>-->
        <!--                    @endif-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
                    </div>
                </div>
            </div>
        </div>
          
        </div>
        <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>


<style>
    
    .place-img{
        padding-bottom:30px;
        border-radius:5px;
    }
    
    .user-img{
        border-radius:50%;
        margin-right:10px;
        margin-bottom:10px;
    }
    .delete-button{
        float:left;
        font-size:25px;
    }
    .heart-button{
        font-size:25px;
        margin-left:10px;
    }
    .post-cards{
        float:left;
    }
    .map{
        margin-left:150px;
        margin-top:115px;
    }
    .heart-button{
        margin-left:5px;
    }
    .comment{
        font-size:35px;
    }
</style>


