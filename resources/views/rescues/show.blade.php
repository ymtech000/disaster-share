@extends('layouts.app')

@section('content')

    <h1>No.{{ $rescue->id }} の救助要請</h1>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <td>{{ $rescue->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $rescue->content }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td><img src="{{asset('storage/'.$rescue->image)}}" width="150" height="150"></td>
        </tr>
        <tr>
            <th>場所</th>
            <td>{{ $rescue->place }}</td>
        </tr>
        <tr>
            <th>時間</th>
            <td>{{ $rescue->time }}</td>
        </tr>
    </table>
    
    {!! Form::open(['route' => 'rescuecomments.store','files' => true]) !!}
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::hidden('rescue_id', $rescue->id) }}
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
    
    @if(Auth::user()->name == $rescue->user->name)
    {!! Form::model($rescue, ['route' => ['rescues.destroy', $rescue->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endif

@endsection