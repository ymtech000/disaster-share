@extends('layouts.app')

@section('content')

    <h1>No.{{ $alertcomment->id }} のコメント</h1>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <td>{{ $alertcomment->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $alertcomment->content }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td><img src ="{{asset('storage/'.$alertcomment->image)}}" width="150" height="150"</td>
        </tr>
    </table>
    
   {!! Form::open(['route' => 'alertcomments.store','files' => true]) !!}
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::hidden('alert_id', $alertcomment->alert_id) }}
        {{ Form::hidden('parent_id', $alertcomment->id) }}
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
    
     @if(Auth::user()->name == $alertcomment->user->name)
    {!! Form::model($alertcomment, ['route' => ['alertcomments.destroy', $alertcomment->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endif

@endsection