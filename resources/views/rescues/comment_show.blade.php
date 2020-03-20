@extends('layouts.app')

@section('content')

    <h1>No.{{ $rescuecomment->id }} のコメント</h1>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <td>{{ $rescuecomment->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th> 
            <td>{{ $rescuecomment->comment }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td><img src ="{{asset('storage/'.$rescuecomment->image)}}" width="150" height="150"</td>
        </tr>
    </table>

   
    {!! Form::open(['route' => 'rescuecomments.store','files' => true]) !!}
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::hidden('rescue_id', $rescuecomment->rescue_id) }}
        {{ Form::hidden('parent_id', $rescuecomment->id) }}
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
    
     @if(Auth::user()->name == $rescuecomment->user->name)
    {!! Form::model($rescuecomment, ['route' => ['rescuecomments.destroy', $rescuecomment->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endif

@endsection