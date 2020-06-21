@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
    <div class='form-row'>
        <div class="col-sm-2 offset-sm-10">
            <div class="submit-select">
                <form id="submit_form" method="get" action="area_searches">
                    @include('commons.area_search')
                </form>
            </div>
        </div>
    </div>
        
    <!--検索条件に一致した投稿を表示-->
    <div id="lists" class="row">
        @if(!empty($datas))
            <table class="table table-striped">
                @foreach ($datas as $data)
                    <div class="col-md-4">
                        <div class="card" style="border:solid; border-width:thin; margin-bottom:10px">
                        @if($data->user->image == null)
                            <div class="card-header" style="height: 70px; border-bottom:solid; border-width:thin;">
                                <a href="/users/{{$data->user->id}}"><img class="img-fluid float-left user-img" style="border-radius:50%; margin-bottom:10px; margin-right:10px;" src="{{ Gravatar::src($data->user->email, 500) }}" width="35" height="35" alt=""></a>
                                <div class="side">
                                    <a href="/users/{{$data->user->id}}" style="color:black; text-decoration: none;">{{$data->user->name}}</a>
                                    @if(Auth::id() == $data->user_id)
                                        <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fas fa-chevron-down"></span></a>
                                        <ul class="dropdown-menu" style="list-style: none;">
                                            <li class="dropdown-item">
                                                <a href="{{ route('alerts.edit', ['id' => $data->id]) }}"><span class="fa fa-edit" style="color:black;"></span></a>
                                                {!! link_to_route('alerts.edit', '編集', ['id' => $data->id], ['class' => 'btn btn-default']) !!}
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" type="button" data-toggle="modal" data-target="#data-delete"><span class="fa fa-trash delete-btn" style="color:black;"></span></a>
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#data-delete">削除</a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                                <small><p style="text-align:right">{{$data->time}}</p></small>
                            </div>
                        @else
                            <div class="card-header" style="height: 70px; border-bottom:solid; border-width:thin;">
                                <a href="/users/{{$data->user->id}}"><img src="{{$data->user->image}}" class="img-fluid float-left user-img" style="border-radius:50%; margin-bottom:10px; margin-right:10px;" width="35" height="35"></a>
                                <div class="side">
                                    <a href="/users/{{$data->user->id}}" style="color:black;">{{$data->user->name}}</a>
                                    @if(Auth::id() == $data->user_id)
                                        <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fas fa-chevron-down"></span></a>
                                        <ul class="dropdown-menu" style="list-style: none;">
                                            <li class="dropdown-item">
                                                <a href="{{ route('alerts.edit', ['id' => $data->id]) }}"><span class="fa fa-edit" style="color:black;"></span></a>
                                                {!! link_to_route('alerts.edit', '編集', ['id' => $data->id], ['class' => 'btn btn-default']) !!}
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" type="button" data-toggle="modal" data-target="#data-delete"><span class="fa fa-trash delete-btn" style="color:black;"></span></a>
                                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#data-delete">削除</a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                                <small><p style="text-align:right">{{$data->time}}</p></small>
                            </div>
                        @endif
                        <div class="card-body">
                            <a href="alerts/{{$data->id}}"><img src="{{$data->image}}" width="300" height="300"></a>
                        </div>
                        <div class="card-footer" style="border-top:solid; border-width:thin;">
                            <div class="title" style="font-size:1.3em;">{{$data->title}}</div>
                            <div class="side">
                                <p>地区：{{$data->area}}</p>
                                <ul class="icons">
                                    <li><span class="far fa-comment"></span>{{count($data->alertcomments)}}</li>
                                    @if (Auth::user()->is_favorite($data->id))
                                        <button onclick="toggleText(this, {{ $data->id }})" style="cursor:pointer;">いいね中</button>
                                    @else
                                        <button onclick="toggleText(this, {{ $data->id }})" style="cursor:pointer;">いいね</button>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
             
                    
                    <!--ボタン・リンククリック後に表示される画面の内容 -->
                    <div class="modal fade" id="data-delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4><class="modal-title" id="myModalLabel">投稿削除確認画面</h4>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                                </div>
                                <div class="modal-body">
                                    <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::model($data, ['route' => ['alerts.destroy', $data->id], 'method' => 'delete']) !!}
                                        <input class="btn btn-danger" type="submit" value="削除">
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        @endif
    </div>
         
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function toggleText(button,id) {
        if (button.innerHTML === "いいね") {
            button.innerHTML = "いいね中";
            console.log(id);
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/alerts/'+ id +'/favorite',
                dataType:'json',
                type: 'POST', 
                data: {'id': id, _token: '{{ csrf_token() }}',},
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
                console.log(results);
            }).fail(function(){
                alert('通信に失敗しました');
            });
        } else {
            button.innerHTML = "いいね";
            
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/alerts/'+ id +'/unfavorite',
                dataType:'json',
                type: 'POST', 
                data: {'id': id,'_method': 'DELETE'},  _token: '{{ csrf_token() }}',
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
                console.log(results);
            }).fail(function(){
                alert('通信に失敗しました');
            });
        }
    }
</script>    
<style>
    .user-img{
        border-radius:50%;
        margin-bottom:10px;
    }
    .submit-select{
        width:170px;
        text-align: right;
    }
    
    .side{
      display: flex;
      justify-content:space-between;
    }
    
    .icons li{
        display:inline-block;
    }
    
</style>
        
@endsection
