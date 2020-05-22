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
                <span class="fa fa-file-image" style="cursor: pointer;"></span>
                <input type="file" style="display:none;" name="thefile">
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
<li class="dropdown-item"><a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#testModal">退会</a></li>
<!-- ボタン・リンククリック後に表示される画面の内容 -->
        <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">アカウント削除確認画面</h4></h4>
                    </div>
                    <div class="modal-body">
                        <label>本当に退会しますか？（この操作は取り消しできません。）</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        {!! Form::open(['route' => ['users.destroy', Auth::id()], 'method' => 'delete']) !!}
                        {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
<style>
    .fa-file-image{
           font-size:70px;
        }
    #error{
        color:red;
    }
</style>

