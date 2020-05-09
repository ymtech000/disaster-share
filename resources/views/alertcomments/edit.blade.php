@extends('layouts.app')

@section('content')
    @include('commons.error_messages')
    {!! Form::model($alertcomment, ['route' => ['alertcomments.update', $alertcomment->id], 'method' => 'put']) !!}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::hidden('alert_id', $alertcomment->alert_id) }}
        {{ Form::hidden('parent_id', $alertcomment->id) }}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        @if ($errors->has('comment'))
            <div class="invalid-feedback">
                {{ $errors->first('comment') }}
            </div>
        @endif
    </div>
    {!! Form::submit('更新する', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection