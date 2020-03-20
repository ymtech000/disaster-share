@extends('layouts.app')

@section('content')
<h3>この操作は取り消しできません。退会しますか？</h3>
{!! Form::open(['route' => ['users.destroy', Auth::user()->id], 'method' => 'delete']) !!}
    {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
{!! link_to_route('top', '戻る', [], ['class' => 'btn btn-primary']) !!}
@endsection 