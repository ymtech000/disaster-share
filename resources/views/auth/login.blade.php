@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    @include('commons.error_messages')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            <div class="side">
                <p class="mt-2">会員登録は {!! link_to_route('signup.get', 'こちら') !!}</p>
                <div>
                {!! link_to_route('login.guest', 'ゲストログイン', [], ['class' => 'btn btn-warning']) !!}
                </div>
             </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('/css/auth_login.css')}}">
@endsection