@extends('layouts.app')

@section('content')
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', '氏名') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('email', 'メールアドレス') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('password', 'パスワード') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('current_password', '現在のパスワード') !!}
            {!! Form::password('current_password', ['class' => 'form-control']) !!}
        </div>
        <p class="submit">{!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}</p> 
        
    {!! Form::close() !!}
@endsection