@extends('layouts.app')

@section('content')

    <h1>注意喚起掲示板</h1>

    @if (count($alerts) > 0)
        <table class="table table-striped">
            @foreach ($alerts as $alert)
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
                    <td>{{ $alert->user->name }}</td>
                    <td>{!! link_to_route('alerts.show', $alert->id, ['id' => $alert->id]) !!}</td>
                    <td>{{ $alert->content }}</td>
                    <td><img src="{{$alert->image}}" width="150" height="150"></td>
                    <td>{{ $alert->area }}</td>
                    <td>{{ $alert->place }}</td>
                    <td>{{ $alert->time }}</td>
                </tr>
            </thead>
                <tr>
                    <td columnspan='2'>コメント数：{{count($alert->alertcomments)}}</td>
                    <td align="left">
                        @if(count($alert->alertcomments)>0)
                            <font color="blue" data-toggle="collapse" data-target="#example-{{$alert->id}}" aria-expand="false" aria-controls="example-1">
                                スレッドを表示する
                            </font>
                            <div class="collapse" id="example-{{$alert->id}}">
                                <div class="card card-body">
                                    @foreach($alert->alertcomments->where('parent_id', null) as $alertcomment)
                                        <table>
                                            <thread>
                                                <tr>
                                                    <th>投稿者</th>
                                                    <th>No.</th>
                                                    <th>コメント</th>
                                                    <th>日時</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$alertcomment->user->name}}</td>
                                                    <td>{!! link_to_route('alertcomments.show', $alertcomment->id, ['id' => $alertcomment->id]) !!}</td>
                                                    <td>{{$alertcomment->comment}}</td>
                                                    <td>{{$alertcomment->time}}</td>
                                                </tr>
                                            </thread>
                                        </table>
                                        @foreach($alert->alertcomments->where('parent_id', $alertcomment->id) as $alertcomment)
                                        <font color="blue" data-toggle="collapse" data-target="#example-{{$alertcomment->id}}" aria-expand="false" aria-controls="example-2">
                                            スレッドを表示する
                                        </font>
                                        <div class="collapse" id="example-{{$alertcomment->id}}">
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
                                                    <td>{{$alertcomment->user->name}}</td>
                                                    <td>{!! link_to_route('alertcomments.show', $alertcomment->id, ['id' => $alertcomment->id]) !!}</td>
                                                    <td>{{$alertcomment->comment}}</td>
                                                    <td>{{$alertcomment->time}}</td>
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
        {!! link_to_route('alertmaps.index', '地図', [], ['class' => 'btn btn-primary']) !!}
   @endif
    {!! link_to_route('alerts.create', '注意喚起情報の投稿', [], ['class' => 'btn btn-primary']) !!}
@endsection