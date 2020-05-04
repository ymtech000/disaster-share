@extends('layouts.app')

@section('content')
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) !!}
     {{ csrf_field() }}
     @include('commons.error_messages')
    <div>
        @if (\Session::has('error'))
            <div class="alert alert-error" id="error">
                {!! \Session::get('error') !!}
            </div>
        @endif
    </div>
        <div class="form-group">
            {!! Form::label('name', '氏名') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('email', 'メールアドレス') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('thefile', '画像（任意）') !!}
            <label>
                <span class="fa fa-file-image"></span>
                <input type="file" style="display:none" name="thefile">
            </label>
        </div>
    
        <div class="form-group">
            {!! Form::label('introduction', '自己紹介（任意）') !!}
            {!! Form::textarea('introduction', old('introduction'), ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('password', '新しいパスワード（任意）') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('password_confirmation', '新しいパスワード（確認）') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('current_password', '現在のパスワード（パスワードを変更する場合のみ必須）') !!}
            {!! Form::password('current_password', ['class' => 'form-control']) !!}
        </div>
        
        
        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        {!! link_to_route('users.show', '戻る',['id' => Auth::id()], ['class' => 'btn btn-primary'])!!}
        
    {!! Form::close() !!}
    
    {!! Form::open(['route' => ['users.destroy', Auth::id()], 'method' => 'delete']) !!}
    {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
    {!! Form::open(['route' => ['users.image_destroy', Auth::user()->image], 'method' => 'delete']) !!}
            <button name="button" type="submit" class="delete-button">
                <i class="fa fa-trash delete-btn"></i>
            </button>
{!! Form::close() !!}
@endsection
<style>
    .fa-file-image{
           font-size:70px;
        }
    #error{
        color:red;
    }
</style>

