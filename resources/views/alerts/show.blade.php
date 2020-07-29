@extends('layouts.app')

@section('content')
    <div class="text-center font-weight-bold font-family-Tahoma" style="font-size:3.5rem;">DETAILS</div>
    <div class='form-row'>
        <div class="col-md-6" style="text-align:center; margin-top:30px;">
            <div class="card-header" style="height:70px; width:80%; border:solid; border-width:thin; display:inline-block;">
                <a href="/users/{{$alert->user->id}}">
                    @if($alert->user->image == null)
                        <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alert->user->email, 45) }}" alt="" style="border-radius:50%; margin-right:10px; margin-bottom:10px;">
                    @else
                        <img class="float-left user-img" src="{{$alert->user->image}}" width="45" height="45" style="border-radius:50%; margin-right:10px; margin-bottom:10px;">
                    @endif
                </a>
                <div class="side">
                    <a href="/users/{{$alert->user->id}}" style="color:black; font-size:1.2em;">{{$alert->user->name}}</a>
                    @if(Auth::id() === $alert->user_id)
                        <a href="#" class="nav-link" data-toggle="dropdown" style="color:black">
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" style="list-style: none;">
                            <li class="dropdown-item">
                                <a href="{{ route('alerts.edit', ['id' => $alert->id]) }}">
                                    <span class="fa fa-edit" style="color:black;"></span>
                                </a>
                                {!! link_to_route('alerts.edit', '編集', ['id' => $alert->id], ['class' => 'btn btn-default']) !!}
                            </li>
                            <li class="dropdown-item">
                                <a href="#" type="button" data-toggle="modal" data-target="#alert-delete{{$alert->id}}">
                                    <span class="fa fa-trash delete-btn" style="color:black;"></span>
                                </a>
                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alert-delete{{$alert->id}}">削除</a>
                            </li>
                        </ul>
                    @endif
                </div>
                <p style="text-align:right;">{{$alert->edit}}</p>
            </div>
            <div class="img">
                <img class="place-img" src="{{$alert->image}}" width="80%" height="auto" style="border-bottom:solid; border-right:solid; border-left:solid; border-width:thin;">
            </div>
            <div style="width:80%; display:inline-block;">
                <div class="side">
                    <div style="font-size:3rem;">{{$alert->title}}</div>
                    <div class="fav-btn" style="font-size:x-large;">
                        <span>
                            @include('favorites.favorite_button', ['alert'=>$alert])
                        </span>
                        <span id="favorite_count{{$alert->id}}">{{count($alert->favorited)}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <span style="vertical-align:middle;">
                <div class="row map">
                    <div id="map" style="border:solid; border-width:thin; width:80%; height:350px;"></div>
                </div>
            </span>
            @include('commons.map')
        </div>
    </div>
    <p style="font-weight:bold; margin-top:8px;">メッセージ</p>
    <div class='form-row'>
        <div class='col-md-7'>
            <table style="display:flex; margin-top:5px;">
                <tr class="message_parent">
                    <td class="table-bordered" id="message" style="font-size:1.2em;  text-align:center; min-height:147px;">
                        <span style="margin-left:10px;">
                            {{ $alert->content }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <div class='col-md-5'>
            <table class="table table-bordered" height="147" style="margin-top:5px;">
                <tr>
                    <th>エリア</th>
                    <td>{{ $alert->area }}</td>
                </tr>
                <tr>
                    <th>場所</th>
                    <td>{{ $alert->location }}</td>
                </tr>
                <tr>
                    <th>時間</th>
                    <td>{{ $alert->time }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class='form-row'>
        <div class="col-sm-8 offset-sm-2">
            <form id="form" method="POST" action="/ajax">
                <div class="form-group">
                    {{ csrf_field() }}
                    <input type="hidden" name="alert_id" value="{{$alert->id}}">
                    <label for="comment" class="comment"style="font-weight:bold;">コメント</label>
                    <textarea class="form-control" id="comment" name="comment" style="font-size:1.3em;"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="コメントする" style="float:right;">
            </form>
        </div>
    </div>
    <div id="results"></div>
    <div align="left">
        @if(count($alertcomments)>0)
            @foreach ($alertcomments as $alertcomment)
                <div class="form-row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card alert-comment alertcomment-body-{{$alertcomment->id}}" style="min-height: 150px; cursor:pointer; margin-top:10px;" onclick="postData({{$alertcomment->id}})">
                            <div class="side" style="margin-left:8px; margin-top:8px;">
                                <a href="/users/{{$alertcomment->user->id}}" onclick="event.stopPropagation();">
                                    <div>
                                        @if($alertcomment->user->image == null)
                                            <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alertcomment->user->email, 35) }}" alt="" style="margin-right:15px; border-radius:50%;" onclick="location:href='/users/{{$alertcomment->user->id}}';">
                                        @else
                                            <img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35" style="margin-right:15px; border-radius:50%;" onclick="location:href='/users/{{$alertcomment->user->id}}';">
                                        @endif
                                        <span style="color:black;">{{$alertcomment->user->name}}</span>
                                    </div>
                                </a>
                                <small>
                                    <span style="text-align:right; list-style: none; margin-right:8px;">{{$alertcomment->time}}</span>
                                </small>
                            </div>
                            <p style="margin-top:10px; margin-left:60px; margin-right:10px;">{{$alertcomment->comment}}</p>
                            <p style="margin-top:8px;">
                                <ul class="icons" style="list-style: none;">
                                    <li>
                                        <span class="far fa-comment icon" style="color:black;" onclick="openCommentModal({{$alertcomment->id}}); event.stopPropagation();"></span> 
                                     </li>
                                    <li>
                                        @if(Auth::id() === $alertcomment->user_id)
                                            <span class="fa fa-trash fa-lg icon" style="color:black;" onclick="openDeleteModal({{$alertcomment->id}}); event.stopPropagation();"></span> 
                                        @endif
                                    </li>
                                </ul>
                            </p>
                        </div>
                        
                        <!--ボタン・リンククリック後に表示される画面の内容 -->
                        <div class="modal fade" id="alertcomment-comment-thread{{$alertcomment->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4></h4>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="cursor:pointer;"></span></button>
                                    </div>
                                     <div class="modal-body">
                                        @if(count($alertcomments)>0)
                                            <p>
                                                <div id="deleted{{$alertcomment->id}}"></div>
                                            </p>
                                            <div> 
                                                @if($alertcomment->parent_id !== null)
                                                    @if($alertcomments->where('id', $alertcomment->parent_id)->first() !== null)
                                                        <div class="card card-body" style="min-height: 150px; margin-bottom:10px;">
                                                            <div id="upData{{$alertcomment->id}}"></div>
                                                        </div>
                                                    @endif
                                                @endif
                                                <div class="card" style="min-height:150px; margin-bottom:10px;">
                                                    <div class="card-body">
                                                        <div class="side" style="margin-left:8px; margin-top:8px;">
                                                            <a href="/users/{{$alertcomment->user->id}}">
                                                                @if($alertcomment->user->image == null)
                                                                    <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alertcomment->user->email, 35) }}" alt="" style="margin-right:15px; border-radius:50%;">
                                                                @else
                                                                    <img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35" style="margin-right:15px; border-radius:50%;">
                                                                @endif
                                                                <span id="modal-user_name{{$alertcomment->id}}" style="color:black;"></span>
                                                            </a>
                                                            <small>
                                                                <span id="modal-time{{$alertcomment->id}}" style="text-align:right; list-style: none; margin-right:8px;"></span>
                                                            </small>
                                                        </div>
                                                        <p style="margin-top:10px; margin-left:60px;">
                                                            <span id="modal-comment{{$alertcomment->id}}"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                @if($alertcomments->where('parent_id', $alertcomment->id)->first() !== null)
                                                    <div class="card card-body" style="min-height: 150px;">
                                                        <div id="underDatas{{$alertcomment->id}}"></div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--ボタン・リンククリック後に表示される画面の内容 -->
                        <div class="modal fade" id="alertcomment-comment{{$alertcomment->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">コメント</h4>
                                        <button id="delete-modal{{$alertcomment->id}}" type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('commons.error_messages')
                                        <form id="comment{{$alertcomment->id}}" method="POST" action="/ajax">
                                            <div class="form-group">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="alert_id" value="{{$alert->id}}">
                                                <input type="hidden" name="parent_id" value="{{$alertcomment->id}}">
                                                <textarea class="form-control" name="comment" style="font-size:1.3em;"></textarea>
                                            </div>
                                            <button type="button" class="comment-button btn btn-primary" style="float:right;">コメントする</button>
                                        </form>
                                    </div>
                                </div>
                                @if ($errors->has('comment'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('comment') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!--ボタン・リンククリック後に表示される画面の内容 -->
                        <div class="modal fade" id="alertcomment-delete{{$alertcomment->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">投稿削除確認画面</h4>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" onclick="postDeletedata({{$alertcomment->id}})" data-dismiss="modal">削除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    
    <!--ボタン・リンククリック後に表示される画面の内容 -->
    <div class="modal fade" id="alert-delete{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">投稿削除確認画面</h4>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                </div>
                <div class="modal-body">
                    <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                </div>
                <div class="modal-footer">
                    {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                        <input class="btn btn-danger" type="submit" value="削除">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/md5.js') }}"></script>
    <script src="{{ asset('/js/comments_display.js') }}"></script>
    <script src="{{asset('/js/comment_delete.js')}}"></script>
    <script src="{{asset('/js/comment_modal.js')}}"></script>
    <script src="{{asset('/js/delete_modal.js')}}"></script>
    <script src="{{asset('/js/favorite.js')}}"></script>
    <script src="{{asset('/js/comment_ajax.js')}}"></script>
    <style>
        #message{
            word-wrap:break-word;
        }

        @media screen and (max-width: 319px){
             #message{
               width:250px;
            }
        }
        
        @media screen and (min-width: 320px) and (max-width: 559px) {
            #message{
               width:345px;
            }
        }
        
        @media screen and (min-width: 560px) and (max-width: 959px) {
            #message{
               width:398.33px;
            }
            .map{
                margin-top:40px;
            }
        }
        
        @media screen and (min-width: 960px) and (max-width: 1279px) {
            #message{
               width:535px;
            }
            .map{
                margin-top:90px;
            }
        }
    
        @media screen and (min-width:1280px) {
            #message{
               width:642px;
            }
            .map{
                margin-top:120px;
            }
        }
        .side{
          display: flex;
          justify-content:space-between;
        }
        
        .name li{
            display:inline-block;
        }
        
        .inline-block{
            display: inline-block;
           
        }
        
        .icons li{
            display: inline-block;
        }
        .fav-btn span{
            display: inline-block;
        }
        
        .icon{
            font-size:1.5em;
        }
        .alert-comment{
            position: relative;
        }
        .icons{
            position: absolute;
              right: 0;
              bottom: 0;
              margin-right:8px;
        }
        
        .fa-comment:hover {
          border-bottom-color: transparent;
          transform: translateY(0.1875em);
        }
        .fa-trash:hover {
          border-bottom-color: transparent;
          transform: translateY(0.1875em);
        }
        #map {
          margin: auto;
        }
        .map {
          display: flex;
        }
       .message_parent{
           display:flex;
       }
        html {
             /*ルートのフォントサイズを10pxに設定しておく */
        	font-size: 62.5%;
        }
        body {
        	 /*ルートのフォントサイズを1.6em（16pxと同等のサイズ）に設定 */
        	font-size: 1.6em;
        }
        </style>
@endsection