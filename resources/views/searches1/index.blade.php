@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="text-center my-4">
            <h3 class="brown border p-2">救助要請検索</h3>
        </div>
        {!! Form::open(['route' => 'searches1.index', 'method' => 'get']) !!}
            <div class="form-group">
                {!! Form::label('text', '検索ワード') !!}
                {!! Form::text('search' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
            </div>
            {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-8">
        <div class="text-center my-4">
            <h3 class="brown p-2">投稿一覧</h3>
        </div>
        <div class="container">
            <!--検索ボタンが押された時に表示される-->
            @if(!empty($datas))
                <div class="my-2 p-0">
                    <div class="row  border-bottom text-center">
                        <div class="col-sm-4">
                            <p>投稿</p>
                        </div>
                    </div>
　　　　　　　　　　　　　　<!--検索条件に一致した投稿を表示-->
                    @foreach($datas as $data)
                            <div class="row py-2 border-bottom text-center">
                                <div class="col-sm-4">
                                    <table class="table table-striped">
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
                                        </thead>
                                            <tr>
                                                <td>{{$data->user->name}}</td>
                                                <td>
                                                    @if(Auth::user()->name == $data->user->name)
                                                        {!! link_to_route('rescues.show', $data->id, ['id' => $data->id]) !!}
                                                    @else
                                                        {{$data->id}}
                                                    @endif
                                                </td>
                                                <td>{{ $data->content }}</td>
                                                <td><img src="{{$data->image}}" width="150" height="150"></td>
                                                <td>{{ $data->area }}</td>
                                                <td>{{ $data->place }}</td>
                                                <td>{{ $data->time }}</td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                    @endforeach
                </div>
                
            @endif
        </div>
    </div>
</div>
@endsection