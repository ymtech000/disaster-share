@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DETAILS</h1>
    <div class="prof">
        <div class="card border-0 col-md-4 post-cards">
            <div class="profile">
                <a href="users/{{$alert->user->id}}"><img class="avatar-type-circle float-left mr-sm-2 ml-1 d-none d-sm-block" src="/assets/default-a877b525b8bae5a97946d44b91113c09ec0c0b98e34c356205bd37cd299430cb.jpg" width="30" height="30" /></a>
                <p>{{$alert->user->name}}</p>
            </div>
            <div class="img">
                <img src="{{$alert->image}}" width="450" height="450">
            </div>
        </div>
    </div>
    <div class="buttons">
        <div class="delete-button">
            @if(Auth::user()->name == $alert->user->name)
                {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                    <button name="button" type="submit" class="delete-button">
                        <i class="fa fa-trash delete-btn"></i>
                    </button>
                {!! Form::close() !!}
            @endif
        </div>
        <div class="heart-button">
            @include('favorites.favorite_button', ['alert' => $alert])
        </div>
    </div>
    <p>{{$alert->title}}</p>
    {!! link_to_route('alerts.edit', 'このメッセージを編集', ['id' => $alert->id], ['class' => 'btn btn-light']) !!}
   <div class='form-row'>
        <div class='col-md-7'>
            <table class="table table-bordered">
                <tr>
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
                    <td>{{ $alert->place }}</td>
                </tr>
                <tr>
                    <th>時間</th>
                    <td>{{ $alert->time }}</td>
                </tr>
            </table>
        </div>
    </div>
    {!! Form::open(['route' => 'alertcomments.store','files' => true]) !!}
        {{ csrf_field() }}
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
                <font color="blue" data-toggle="collapse" data-target="#example-{{$alert->id}}" aria-expand="false" aria-controls="example-1">
                    スレッドを表示する
                </font>
                <div class="collapse" id="example-{{$alert->id}}">
                    <div class="card card-body">
                        @foreach($alert->alertcomments->where('parent_id', null) as $alertcomment)
                            <table>
                                <thread>
                                    <tr>
                                        <th>投稿者</th>
                                        <th>No.</th>
                                        <th>コメント</th>
                                        <th>日時</th>
                                    </tr>
                                <tr>
                                    <td>{{$alertcomment->user->name}}</td>
                                    <td>{!! link_to_route('alertcomments.show', $alertcomment->id, ['id' => $alertcomment->id]) !!}</td>
                                    <td>{{$alertcomment->comment}}</td>
                                    <td>{{$alertcomment->time}}</td>
                                </tr>
                                </thread>
                            </table>
                            @foreach($alert->alertcomments->where('parent_id', $alertcomment->id) as $alertcomment)
                                <font color="blue" data-toggle="collapse" data-target="#example-{{$alertcomment->id}}" aria-expand="false" aria-controls="example-2">
                                    スレッドを表示する
                                </font>
                                <div class="collapse" id="example-{{$alertcomment->id}}">
                                    <div class="card card-body">
                                        <table>
                                            <thread>
                                                <tr>
                                                <th>投稿者</th>
                                                <th>No.</th>
                                                <th>コメント</th>
                                                <th>日時</th>
                                                </tr>
                                                <tr>
                                                <td>{{$alertcomment->user->name}}</td>
                                                <td>{!! link_to_route('alertcomments.show', $alertcomment->id, ['id' => $alertcomment->id]) !!}</td>
                                                <td>{{$alertcomment->comment}}</td>
                                                <td>{{$alertcomment->time}}</td>
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
    img{
        border-radius:10px;
    }
    .img{
        /*text-align:center;*/
        padding-bottom:30px;
    }
    .delete-button{
        float:left;
        font-size:25px;
    }
    .heart-button{
        font-size:25px;
        margin-left:10px;
    }
    
</style>
