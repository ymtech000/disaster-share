@extends('layouts.app')

@section('content')

<h1 class="text-center font-weight-bold font-family-Tahoma">NEW POST</h1>
{!! Form::model($alert, ['route' => 'alerts.store', 'files' => true]) !!}

    <p>画像</p>
    <label>
        <span class="fa fa-file-image"></span>
        <input type="file" style="display:none" name="thefile">
    </label>
    
    <div class='form-row'>
    <div class='col-md-7'>
        {!! Form::label('title', 'タイトル(15字以内):') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! Form::label('content', 'メッセージ(140字以内):') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class='col-md-5'>
        {!! Form::label('area', 'エリア') !!}
        @include('commons.area')
        {!! Form::label('place', '場所') !!}
        {!! Form::text('place', null, ['class' => 'form-control']) !!}
    </div>
    <div>
        @if (\Session::has('error'))
            <div class="alert alert-error" id="error">
                {!! \Session::get('error') !!}
            </div>
        @endif
    </div>
       <p class="submit">{!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}</p> 
{!! Form::close() !!}
</div>
</div>
<style>
        #error {
            color: red;
        }
        
        .file_upload {
            border: 3px solid;
            display: inline-block;
            padding: 2px 1em;
            position: relative;
           
        }
        .file_upload input[type="file"] {
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
           
        }
        .form-group {
            display:inline-block;
        }
        .submit{
            margin-top:15px;
        }
        .fa-file-image{
           font-size:100px;
        }
        
</style>
    
@endsection
