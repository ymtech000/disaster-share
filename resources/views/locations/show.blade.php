@extends('layouts.app')

@section('content')

    <h1>No.{{ $location->id }} の重要施設</h1>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <td>{{ $location->id }}</td>
        </tr>
         <tr>
            <th>施設</th>
            <td>{{ $location->facility }}</td>
        </tr>
        <tr>
            <th>場所</th>
            <td>{{ $location->place }}</td>
        </tr>
    </table>
    
    @if(Auth::user()->name == $location->user->name)
    {!! Form::model($location, ['route' => ['locations.destroy', $location->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endif

@endsection