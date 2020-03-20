@extends('layouts.app')

@section('content')

    <h1>注意喚起情報の投稿</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($location, ['route' => 'locations.store','files' => true]) !!}
            <div>
                @if (\Session::has('error'))
                    <div class="alert alert-error" id="error">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
            </div>
            <style>
                #error {
                    color: red;
                }
            </style>
            <p>
                {!! Form::label('place', '場所') !!}
                {!! Form::text('place', null, ['class' => 'form-control']) !!}
            </p>
            
            <p>
            {!! Form::label('facility', '施設') !!}
            {!! Form::select('facility', [ '給水所'=>'給水所', 'ガソリンスタンド'=>'ガソリンスタンド', '避難所'=>'避難所'], '給水所') !!}
            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            </p>
        
            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection