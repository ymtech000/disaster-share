@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>会員登録</h1>
    </div>
    @include('commons.error_messages')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'signup.post', 'files' => true]) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('name', '氏名') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('introduction', '自己紹介(任意)') !!}
                    {!! Form::textarea('introduction', null, ['class' => 'form-control']) !!}
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
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <style>
        .fa-file-image{
               font-size:70px;
            }
        .inline-block{
            display: inline-block;
            vertical-align: top;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/file_upload.js') }}"></script>
@endsection

