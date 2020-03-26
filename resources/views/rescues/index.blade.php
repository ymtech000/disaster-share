@extends('layouts.app')

@section('content')

    <h1>救助要請掲示板</h1>

    @if (count($rescues) > 0)
        <table class="table table-striped">
            @foreach ($rescues as $rescue)
            <thead>
                <tr>
                    <th>投稿者</th>
                    <th>No.</th>
                    <th>メッセージ</th>
                    <th>画像</th>
                    <th>エリア</th>
                    <th>場所の詳細</th>
                    <th>日時</th>
                </tr>
                <tr>
                    <td>{{ $rescue->user->name }}</td>
                    <td>{!! link_to_route('rescues.show', $rescue->id, ['id' => $rescue->id]) !!}</td>
                    <td>{{ $rescue->content }}</td>
                    <td><img src="{{$rescue->image}}" width="150" height="150"></td>
                    <td>{{ $rescue->area }}</td>
                    <td>{{ $rescue->place }}</td>
                    <td>{{ $rescue->time }}</td>
                </tr>
            </thead>
                <tr>
                    <td columnspan='2'>コメント数：{{count($rescue->rescuecomments)}}</td>
                    <td align="left">
                        @if(count($rescue->rescuecomments)>0)
                            <font color="blue" data-toggle="collapse" data-target="#example-{{$rescue->id}}" aria-expand="false" aria-controls="example-1">
                                スレッドを表示する
                            </font>
                            <div class="collapse" id="example-{{$rescue->id}}">
                                <div class="card card-body">
                                    @foreach($rescue->rescuecomments->where('parent_id', null) as $rescuecomment)
                                        <table>
                                            <thread>
                                                <tr>
                                                    <th>投稿者</th>
                                                    <th>No.</th>
                                                    <th>コメント</th>
                                                    <th>日時</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$rescuecomment->user->name}}</td>
                                                    <td>{!! link_to_route('rescuecomments.show', $rescuecomment->id, ['id' => $rescuecomment->id]) !!}</td>
                                                    <td>{{$rescuecomment->comment}}</td>
                                                    <td>{{$rescuecomment->time}}</td>
                                                </tr>
                                            </thread>
                                        </table>
                                        @foreach($rescue->rescuecomments->where('parent_id', $rescuecomment->id) as $rescuecomment)
                                        <font color="blue" data-toggle="collapse" data-target="#example-{{$rescuecomment->id}}" aria-expand="false" aria-controls="example-2">
                                            スレッドを表示する
                                        </font>
                                        <div class="collapse" id="example-{{$rescuecomment->id}}">
                                        <div class="card card-body">
                                        <table>
                                            <thread>
                                                <tr>
                                                    <th>投稿者</th>
                                                    <th>No.</th>
                                                    <th>コメント</th>
                                                    <th>日時</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$rescuecomment->user->name}}</td>
                                                    <td>{!! link_to_route('rescuecomments.show', $rescuecomment->id, ['id' => $rescuecomment->id]) !!}</td>
                                                    <td>{{$rescuecomment->comment}}</td>
                                                    <td>{{$rescuecomment->time}}</td>
                                                </tr>
                                            </thread>
                                        </table>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {!! link_to_route('rescuemaps.index', '地図', [], ['class' => 'btn btn-primary']) !!}
   @endif
    {!! link_to_route('rescues.create', '救助要請の投稿', [], ['class' => 'btn btn-primary']) !!}
    
@endsection