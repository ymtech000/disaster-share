@extends('layouts.app')

@section('content')
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) !!}
     {{ csrf_field() }}
    <div class="form-row">
        <div class="col-sm-6 offset-sm-3">
            <div class="error_messages">
                @include('commons.error_messages')
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
                    <span class="fa fa-file-image inline-block" style="cursor: pointer;"></span>
                    <input type="file" style="display:none;" name="thefile">
                </label>
                <span id="fileimg" class="inline-block"></span>
            </div>
        
            <div class="form-group">
                {!! Form::label('introduction', '自己紹介（任意）') !!}
                <!--{!! Form::textarea('introduction', old('introduction'), ['class' => 'form-control']) !!}-->
                <textarea class="form-control" name="introduction" id="introduction" value = "{{ old('introduction') }}"></textarea>
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
            <div class="side">
                <div>
                    <p>退会は<a href="#" type="button" data-toggle="modal" data-target="#testModal" style="font-size:1.3em;">こちら</a></p>
                </div>
                <div>
                    {!! link_to_route('users.show', '戻る',['id' => Auth::id()], ['class' => 'btn btn-outline-dark'])!!}
                    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
        
    {!! Form::close() !!}

<!-- ボタン・リンククリック後に表示さ���る画面の内容 -->
        <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">アカウント削除確認画面</h4>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                    </div>
                    <div class="modal-body">
                        <label>本当に退会しますか？（この操作は取り消しできません。）</label>
                    </div>
                    <div class="modal-footer">
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
    .side{
      display: flex;
      justify-content:space-between;
    }
    .inline-block{
        display: inline-block;
        vertical-align: top;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('input[type=file]');
        // アップロードするファイルを選択
        $('input[type=file]').change(function() {
            var file = $(this).prop('files')[0];
            
            // 画像以外は処理を停止
            if (! file.type.match('image.*')) {
                // クリア
                $(this).val('');
                $('#fileimg').html('');
                return;
            }
            // 画像表示
            var reader = new FileReader();
            reader.onload = function() {
                var img_src = $('<img width="100" height="100">').attr('src', reader.result);
                $('#fileimg').html(img_src);
            };
            reader.readAsDataURL(file);
        });
    });
</script>
