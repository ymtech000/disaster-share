@extends('layouts.app')

@section('content')
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
                        {!! link_to_route('alerts.edit', '編集', ['id' => $alert->id]) !!}
                    </li>
                    <li class="dropdown-item">
                        {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                            <span class="fa fa-trash delete-btn" style="cursor:pointer"></span>
                            <input class="btn btn-default" type="submit" value="削除">
                        {!! Form::close() !!}
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
    <div class="back">{!! link_to_route('alerts.index', '戻る', ['id' => $alert->id], ['class' => 'btn btn-primary']) !!}</div>
    
    {!! Form::open(['route' => 'alertcomments.store']) !!}
        <div class="form-group">
            {{ Form::hidden('alert_id', $alert->id) }}
            {!! Form::label('comment', 'コメント', ['class' => 'comment']) !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('コメントする', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    
    <div><span class="far fa-comment"></span>{{count($alert->alertcomments)}}</div>
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
                                    <td>
                                        <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                                        <ul class="dropdown-menu" style="list-style: none;">
                                            <li class="dropdown-item">
                                                <span class="far fa-comment"></span>
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alertcomment-comment">コメント</a>
                                            </li>
                                            <li class="dropdown-item">
                                                {!! Form::model($alertcomment, ['route' => ['alertcomments.destroy', $alertcomment->id], 'method' => 'delete']) !!}
                                                    <span class="fa fa-trash delete-btn"></span>
                                                    <input class="btn btn-default" type="submit" value="削除">
                                                {!! Form::close() !!}
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
    @if($alertcomment !== null)
        <div class="modal fade" id="alertcomment-comment" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">コメント</h4>
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
    @endif
        </div>
         <!--ボタン・リンククリック後に表示される画面の内容 -->
        <div class="modal fade" id="alertcomment-comment-thread" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        @if(count($alert->alertcomments)>0)
                                <div class="card card-body">
                                    @foreach($alert->alertcomments->where('parent_id', null) as $alertcomment)
                                        <table>
                                            <thread>
                                                <tr>
                                                    <td>{{$alertcomment->user->name}}</td>
                                                    <td>{{$alertcomment->comment}}</td>
                                                    <td>{{$alertcomment->time}}</td>
                                                </tr>
                                            </thread>
                                        </table>
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
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
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
    .edit{
        float:right;
        padding-bottom:5px
    }
    .back{
        float:right;
    }
    .comment{
        font-weight:bold;
    }
</style>


