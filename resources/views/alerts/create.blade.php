@extends('layouts.app')

@section('content')
<body>
        <h1 class="text-center font-weight-bold font-family-Tahoma">NEW POST</h1>
        @include('commons.error_messages')
        {!! Form::model($alert, ['route' => 'alerts.store', 'files' => true, 'onsubmit' => "return false;"]) !!}
            {!! Form::label('thefile', '画像') !!}
            <label>
                <span class="fa fa-file-image" style="cursor: pointer"></span>
                <input type="file" style="display:none" name="thefile">
            </label>
        <div class='form-row'>
            <div class='col-md-7'>
                {!! Form::label('title', 'タイトル(15字以内):') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                {!! Form::label('content', 'メッセージ(140字以内):') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                <p class="submit">{!! Form::button('投稿', ['class' => 'btn btn-primary', 'onclick' => 'submit();']) !!}</p> 
            </div>
            <div class='col-md-5'>
                {!! Form::label('area', 'エリア') !!}
                @include('commons.area')
                {!! Form::label('location', '場所') !!}
                {!! Form::text('location', null, ['class' => 'form-control']) !!}
                <div class="search">
                    <input id="place" placeholder="検索">
                    <div id="myBtn" onclick="search()"></div>
                </div>
                <div id="map"></div>
                <input type="hidden" name='lat' id='lat' class="form-control">
                <input type="hidden" name='lng' id='lng' class="form-control">
            </div>
            <div>
                @if (\Session::has('error'))
                    <div class="alert alert-error" id="error">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
            </div>
        </div>
        {!! Form::close() !!}
@include('commons.alertcreate_script')
   
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoKnN8__KItXFDswfAfs_y3VHwfbX3_ms"></script>

@endsection

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
    .form-group {
        display:inline-block;
    }
    .submit{
        margin-top:25px;
    }
    .fa-file-image{
       font-size:100px;
    }
    #map { 
        height: 250px
    }
    .search{
        padding-top:20px;
    }
</style>