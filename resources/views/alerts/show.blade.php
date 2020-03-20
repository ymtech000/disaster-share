@extends('layouts.app')

@section('content')

    <h1>No.{{ $alert->id }} の注意喚起情報</h1>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <td>{{ $alert->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $alert->content }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td><img src="{{asset('storage/'.$alert->image)}}" width="150" height="150"></td>
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
    
    @if(Auth::user()->name == $alert->user->name)
    {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endif

@endsection