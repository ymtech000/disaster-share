@extends('layouts.app')

@section('content')

    <h1>No.{{ $location->id }} の注意喚起情報</h1>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <td>{{ $location->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $location->content }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td><img src="{{asset('storage/'.$location->image)}}" width="150" height="150"></td>
        </tr>
        <tr>
            <th>場所</th>
            <td>{{ $location->place }}</td>
        </tr>
        <tr>
            <th>時間</th>
            <td>{{ $location->time }}</td>
        </tr>
    </table>
    
    {!! link_to_route('locations.edit', '注意喚起情報の編集', ['id' => $location->id], ['class' => 'btn btn-light']) !!}

    {!! Form::model($location, ['route' => ['locations.destroy', $location->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection