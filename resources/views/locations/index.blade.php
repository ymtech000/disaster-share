@extends('layouts.app')

@section('content')

    <h1>注意喚起掲示板</h1>

    @if (count($locations) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>メッセージ</th>
                    <th>画像</th>
                    <th>エリア</th>
                    <th>場所の詳細</th>
                    <th>時間</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td>{!! link_to_route('locations.show', $location->id, ['id' => $location->id]) !!}</td>
                    <td>{{ $location->content }}</td>
                    <td><img src="{{asset('storage/'.$location->image)}}" width="150" height="150"></td>
                    <td>{{ $location->area }}</td>
                    <td>{{ $location->place }}</td>
                    <td>{{ $location->time }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
   @endif
   
    {!! link_to_route('locations.create', '注意喚起情報の投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection



