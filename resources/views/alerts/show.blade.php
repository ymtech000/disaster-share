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
                    <li class="dropdown-item">{!! link_to_route('alerts.edit', '編集', ['id' => $alert->id]) !!}</li>
                    <li class="dropdown-item"><span class="fa fa-trash delete-btn"></span>{!! link_to_route('alerts.destroy', '削除', ['id' => $alert->id]) !!}</li>
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
            {!! Form::label('comment', 'コメント') !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    {{ $errors->first('comment') }}
                </div>
            @endif
        </div>
        {!! Form::submit('コメントする', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <tr>
        <td columnspan='2'>コメント数：{{count($alert->alertcomments)}}</td>
        <td align="left">
            @if(count($alert->alertcomments)>0)
                <!--<font color="blue" data-toggle="collapse" data-target="#example-{{$alert->id}}" aria-expand="false" aria-controls="example-1">-->
                <!--    スレッドを表示する-->
                <!--</font>-->
                <!--<div class="collapse" id="example-{{$alert->id}}">-->
                    <div class="card card-body">
                        @foreach($alert->alertcomments->where('parent_id', null) as $alertcomment)
                            <table>
                                <thread>
                                    <tr>
                                        @if($alertcomment->user->image == null)
                                            <td><a href="{{route('users.show',['id' => $alertcomment->user->id])}}"><img class="img-fluid float-left user-img" src="{{ Gravatar::src($user->email, 500) }}" width="35" height="35" alt=""></a></td>
                                        @else
                                            <td><a href="{{route('users.show',['id' => $alertcomment->user->id])}}"><img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35"></a></td>
                                        @endif
                                        <td>{{$alertcomment->user->name}}</td>
                                        <td>{{$alertcomment->comment}}</td>
                                        <td>{{$alertcomment->time}}</td>
                                        <td>
                                            @if(Auth::id() == $alertcomment->user_id)
                                                <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                                                <ul class="dropdown-menu" style="list-style: none;">
                                                    <li class="dropdown-item">{!! link_to_route('alertcomments.show', 'コメント', ['id' => $alertcomment->id]) !!}</li>
                                                    <li class="dropdown-item"><span class="fa fa-trash delete-btn"></span>{!! link_to_route('alertcomments.destroy', '削除', ['id' => $alertcomment->id]) !!}</li>
                                                </ul>
                                            @else
                                                <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                                                <ul class="dropdown-menu" style="list-style: none;">
                                                    <li class="dropdown-item">{!! link_to_route('alertcomments.show', 'コメント', ['id' => $alertcomment->id]) !!}</li>
                                                </ul>
                                            @endif
                                        </td>
                                    </tr>
                                </thread>
                            </table>
                            @foreach($alert->alertcomments->where('parent_id', $alertcomment->id) as $alertcomment)
                                <!--<font color="blue" data-toggle="collapse" data-target="#example-{{$alertcomment->id}}" aria-expand="false" aria-controls="example-2">-->
                                <!--    スレッドを表示する-->
                                <!--</font>-->
                                <!--<div class="collapse" id="example-{{$alertcomment->id}}">-->
                                    <div class="card card-body">
                                        <table>
                                            <thread>
                                                <tr>
                                                    @if($alertcomment->user->image == null)
                                                        <td><a href="{{route('users.show',['id' => $alertcomment->user->id])}}"><img class="img-fluid float-left user-img" src="{{ Gravatar::src($user->email, 500) }}" width="35" height="35" alt=""></a></td>
                                                    @else
                                                        <td><a href="{{route('users.show',['id' => $alertcomment->user->id])}}"><img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35"></a></td>
                                                    @endif
                                                    <td>{{$alertcomment->user->name}}</td>
                                                    <td>{{$alertcomment->comment}}</td>
                                                    <td>{{$alertcomment->time}}</td>
                                                    <td>
                                                        @if(Auth::id() == $alertcomment->user_id)
                                                            <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                                                            <ul class="dropdown-menu" style="list-style: none;">
                                                                <li class="dropdown-item">{!! link_to_route('alertcomments.show', 'コメント', ['id' => $alertcomment->id]) !!}</li>
                                                                <li class="dropdown-item"><span class="fa fa-trash delete-btn"></span>{!! link_to_route('alertcomments.destroy', '削除', ['id' => $alertcomment->id]) !!}</li>
                                                            </ul>
                                                        @else
                                                            <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fa fa-ellipsis-h"></span></a>
                                                            <ul class="dropdown-menu" style="list-style: none;">
                                                                <li class="dropdown-item">{!! link_to_route('alertcomments.show', 'コメント', ['id' => $alertcomment->id]) !!}</li>
                                                            </ul>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </thread>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                   </div>
               </div>
            @endif
        </td>
    </tr>
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
    
</style>
