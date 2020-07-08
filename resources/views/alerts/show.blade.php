@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DETAILS</h1>
    <div class='form-row'>
        <div class="col-md-6">
            <div class="card-header" style="height: 70px; width:450px; border:solid; border-width:thin;">
                <a href="/users/{{$alert->user->id}}">
                    @if($alert->user->image == null)
                        <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alert->user->email, 500) }}" width="45" height="45" alt="" style="border-radius:50%; margin-right:10px; margin-bottom:10px;">
                    @else
                        <img class="float-left user-img" src="{{$alert->user->image}}" width="45" height="45" style="border-radius:50%; margin-right:10px; margin-bottom:10px;">
                    @endif
                </a>
                <div class="side">
                    <h4>
                        <a href="/users/{{$alert->user->id}}" style="color:black; text-decoration: none;">{{$alert->user->name}}</a>
                    </h4>
                    @if(Auth::id() == $alert->user_id)
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
                                <a href="#" type="button" data-toggle="modal" data-target="#alert-delete">
                                    <span class="fa fa-trash delete-btn" style="color:black;"></span>
                                </a>
                                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alert-delete">削除</a>
                            </li>
                        </ul>
                    @endif
                </div>
                <p style="text-align:right;">{{$alert->edit}}</p>
            </div>
            <div class="img">
                <img class="place-img" src="{{$alert->image}}" width="450" height="450" style="border-bottom:solid; border-right:solid; border-left:solid; border-width:thin;">
            </div>
            <div class="side" style="height: 70px; width:450px;">
                <h2>{{$alert->title}}</h2>
                <div>
                    @if (Auth::user()->is_favorite($alert->id))
                        <button onclick="toggleFavoriteText(this, {{ $alert->id }})" style="cursor:pointer;">いいね中</button>
                    @else
                        <button onclick="toggleFavoriteText(this, {{ $alert->id }})" style="cursor:pointer;">いいね</button>
                    @endif
                </div>
            </div>
        </div>
        @include('commons.map')
    </div>
    <p style="font-weight:bold;">メッセージ</p>
    <div class='form-row'>
        <div class='col-md-7'>
            <table class="table table-bordered">
                <tr>
                    <td height="147" style="font-size:1.3em;">{{ $alert->content }}</td>
                </tr>
            </table>
        </div>
        <div class='col-md-5'>
            <table class="table table-bordered">
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
    
    <form id="form" method="POST" action="/ajax">
        <div class="form-group">
            {{ csrf_field() }}
            <input type="hidden" name="alert_id" value="{{$alert->id}}">
            <label for="comment" class="comment">コメント</label>
            <textarea class="form-control" id="comment" name="comment" style="font-size:1.3em;"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="コメントする" style="float:right;">
    </form>
    <div id="results" ></div>
    <div align="left" style="margin-top:70px;">
        @if(count($alertcomments)>0)
            @foreach ($alertcomments as $alertcomment)
                <input type="hidden" id="jump-modal{{$alertcomment->id}}" class="card-body" data-toggle="modal" data-target="#alertcomment-comment-thread{{$alertcomment->id}}"></a>
                <div class="form-row">
                    <div class="col-sm-8 offset-sm-2">
                        <div id="{{$alertcomment->id}}" class="card alert-comment alertcomment-body-{{$alertcomment->id}}" style="height: 220px; cursor:pointer;" onclick="postData(this.id)">
                            <div class="side" style="margin-left:8px; margin-top:8px;">
                                <a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;" onclick="event.stopPropagation();">
                                    <div>
                                        @if($alertcomment->user->image == null)
                                                <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alertcomment->user->email, 500) }}" width="35" height="35" alt="" style="margin-right:15px;" onclick="location:href='/users/{{$alertcomment->user->id}}';">
                                        @else
                                                <img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35" style="margin-right:15px;" onclick="location:href='/users/{{$alertcomment->user->id}}';">
                                        @endif
                                        <span style="color:black;">{{$alertcomment->user->name}}</span>
                                    </div>
                                </a>
                                <small>
                                    <span style="text-align:right; list-style: none; margin-right:8px;">{{$alertcomment->time}}</span>
                                </small>
                            </div>
                            <p style="margin-top:10px; margin-left:60px;">{{$alertcomment->comment}}</p>
                            <ul class="icons" style="list-style: none;">
                                <li>
                                    <input type="hidden" id="jump-comment-{{$alertcomment->id}}" onclick="$('#alertcomment-comment{{$alertcomment->id}}').modal('hide'); event.stopPropagation();">
                                    <span class="far fa-comment icon" style="color:black;" onclick="$('#alertcomment-comment{{$alertcomment->id}}').modal('show'); event.stopPropagation();"></span> 
                                 </li>
                                <li>
                                    @if(Auth::id() == $alertcomment->user_id)
                                        <span class="fa fa-trash fa-lg icon" style="color:black;" onclick="$('#alertcomment-delete{{$alertcomment->id}}').modal('show'); event.stopPropagation();"></span> 
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!--ボタン・リンククリック後に表示される画面の内容 -->
                <div class="modal fade" id="alertcomment-comment-thread{{$alertcomment->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4></h4>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                            </div>
                             <div class="modal-body">
                                @if(count($alertcomments)>0)
                                    <div> 
                                    @if($alertcomment->parent_id !== null)
                                        @if($alertcomments->where('id', $alertcomment->parent_id)->first() !== null)
                                            <div class="card" style="height: 220px;">
                                                <div class="card-body">
                                                    <div class="side" style="margin-left:8px; margin-top:8px;">
                                                        @if($alertcomment->user->image == null)
                                                            <a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;">
                                                                <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alertcomment->user->email, 500) }}" width="35" height="35" alt="" style="margin-right:15px;">
                                                                <span style="color:black;">
                                                                    <span id="modal-upuser_name{{$alertcomment->id}}"></span>
                                                                </span>
                                                            </a>
                                                        @else
                                                            <a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;">
                                                                <img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35" style="margin-right:15px;">
                                                                <span style="color:black;">
                                                                    <span id="modal-upuser_name{{$alertcomment->id}}"></span>
                                                                </span>
                                                            </a>
                                                        @endif
                                                        <small>
                                                            <span style="text-align:right; list-style: none; margin-right:8px;">
                                                                <span id="modal-uptime{{$alertcomment->id}}"></span>
                                                            </span>
                                                        </small>
                                                    </div>
                                                    <p style="margin-top:10px; margin-left:60px;">
                                                        <span id="modal-upcomment{{$alertcomment->id}}"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        @else
                                            <p>返信元のコメントが存在しません。</p>
                                        @endif
                                    @endif
                                        <div class="card" style="height: 220px;">
                                            <div class="card-body">
                                                <div class="side" style="margin-left:8px; margin-top:8px;">
                                                    @if($alertcomment->user->image == null)
                                                        <a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;">
                                                            <img class="img-fluid float-left user-img" src="{{ Gravatar::src($alertcomment->user->email, 500) }}" width="35" height="35" alt="" style="margin-right:15px;">
                                                            <span style="color:black; text-decoration: none;">
                                                                <span id="modal-user_name{{$alertcomment->id}}"></span>
                                                            </span>
                                                        </a>
                                                    @else
                                                        <a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;">
                                                            <img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35" style="margin-right:15px;">
                                                            <span style="color:black; text-decoration: none;">
                                                                <span id="modal-user_name{{$alertcomment->id}}"></span>
                                                            </span>
                                                        </a>
                                                    @endif
                                                    <small>
                                                        <span style="text-align:right; list-style: none; margin-right:8px;">
                                                            <span id="modal-time{{$alertcomment->id}}"></span>
                                                        </span>
                                                    </small>
                                                </div>
                                                <p style="margin-top:10px; margin-left:60px;">
                                                    <span id="modal-comment{{$alertcomment->id}}"></span>
                                                </p>
                                            </div>
                                        </div>
                                        @if($alertcomments->where('parent_id', $alertcomment->id)->first() !== null)
                                            <div id="underDatas"></div>
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
                                <h4><class="modal-title" id="myModalLabel">コメント</h4>
                                <button id="delete-modal{{$alertcomment->id}}" type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                            </div>
                            <div class="modal-body">
                                @include('commons.error_messages')
                                <form id="comment-{{$alertcomment->id}}" method="POST" action="/ajax">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="alert_id" value="{{$alert->id}}">
                                        <input type="hidden" name="parent_id" value="{{$alertcomment->id}}">
                                        <textarea class="form-control" name="comment" style="font-size:1.3em;"></textarea>
                                    </div>
                                    <button type="submit" class="comment-button btn btn-primary" style="float:right;">コメントする</button>
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
                                <h4><class="modal-title" id="myModalLabel">投稿削除確認画面</h4>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                            </div>
                            <div class="modal-body">
                                <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" id="{{$alertcomment->id}}" onclick="postDeletedata(this.id)" data-dismiss="modal">削除</button>
                            </div>
                        </div>
                    </div>
                </div> 
            @endforeach
        @endif
    </div>
    
    <!--ボタン・���ンククリック後に表示される画面の内容 -->
    <div class="modal fade" id="alert-delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
                    {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                        <input class="btn btn-danger" type="submit" value="削除">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function postDeletedata(id){
      $.ajax({
        url: '/alertcomments/'+id,
        type: 'POST',
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
        data: {'id': id,
               '_method': 'DELETE'} 
      })
     .done(function() {
        $('.modal').hide();
        $('.alertcomment-body-'+ id).remove();
      })
     .fail(function() {
        alert('通信に失敗しました。');
      });
    }

    $('#form').submit(function(event) {
        event.preventDefault();
        let $form = $(this);
        let $button = $form.find('button');
        let $results = $('#results');
        $.ajax({
          url: $form.attr('action'),
          type: $form.attr('method'),
          dataType: 'json',
          data: $form.serialize(),
           // 送信前
          beforeSend: function(xhr, settings) {
            // ボタンを無効化し、二重送信を防止
          $button.attr('disabled', true);
        },
        }).then(function (data){
          // 成功したとき
          // inputの中身を空にする
          $('#form [name="comment"]').val("");
          // すでにあるresults���中身を空にする
          $results.empty();
          $('.alert-comment').hide();
          // dataの中身をループをつかってresultsにどんどんいれていく
          // comment.contentはご自身のデータベース構造、カラム名によって変わ���
          data['comments'].forEach(comment => $results.append('<p>' + comment.comment + '</p>'));
        }, function () {
          // 失敗したとき
          alert('通信に失敗しました');
        }).always(function(xhr, textStatus) {
            // ボタンを有効化し、再送信を許可
          $button.attr('disabled', false);
        });
    });
    
    
    $('.comment-button').on('click', function(){
        var form_id =  $(this).parent().attr("id");
        console.log(form_id);
        $('#'+form_id).submit(function(event) {
            event.preventDefault();
            let $form = $(this);
             // 送信ボタンを取得
            let $button = $form.find('button');
            let $results = $('#results');
            $.ajax({
              url: $form.attr('action'),
              type: $form.attr('method'),
              dataType: 'json',
              data: $form.serialize(),
              beforeSend: function(xhr, settings) {
            // ボタンを無効化し、二重送信を防止
              $button.attr('disabled', true);
            },
            // 応答後
              complete: function(xhr, textStatus) {
                // ボタンを有効化し、再送信を許可
              $button.attr('disabled', false);
            }
            }).then(function (data){
                console.log(data);
              // 成功したとき
              // inputの中身を空にする
              $('#'+form_id+' [name="comment"]').val("");
              // すでにあるresultsの中身を空にする
              $results.empty();
              $('.alert-comment').hide();
            document.getElementById("jump-"+form_id).click();
              // dataの中身をループをつかってresultsにどんどんいれていく
              // comment.contentはご自身のデータベース構造、カラム名によって変わる
              data['comments'].forEach(comment => $results.append('<p>' + comment.comment + '</p>'));
            }, function () {
              // 失敗したとき
              alert('通信に失敗しました');
            }).always(function(xhr, textStatus) {
                // ボタンを有効化し、再送信を許可
              $button.attr('disabled', false);
            });
        });
    });
    
    function postData(id){
        var $underDatas =$('#underDatas');
        $.ajax({
            url: '/alertcomments/'+ id +'/ajax',
            type : 'POST',
            data: {'id': id},
            headers : {
            　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function(json) {
            console.log(json['underDatas']);
            document.getElementById("jump-modal"+id).click();
            
            var $modalUser_Name = $('#modal-user_name'+id);
            var $modalUser_Email = $('#modal-user_email'+id);
            var $modalUser_Image = $('#modal-user_image'+id);
            var $modalComment = $('#modal-comment'+id);
            var $modalTime = $('#modal-time'+id);
            var $modalUpcomment = $('#modal-upcomment'+id);
            var $modalUptime = $('#modal-uptime'+id);
            var $modalUpuser_Name = $('#modal-upuser_name'+id);
            var $modalId = $('#modal-id'+id);
            var $modalParent_id = $('#modal-parent_id'+id);
            var $modalUpId = $('#modal-upid'+id);
            
            $modalUser_Name.text(json['userData'].name);
            $modalUser_Email.text(json['userData'].email);
            $modalUser_Image.text(json['userData'].image);
            $modalComment.text(json['responseData'].comment);
            $modalTime.text(json['responseData'].time);
            $modalUpcomment.text(json['upData'].comment);
            $modalUptime.text(json['upData'].time);
            $modalUpuser_Name.text(json['upuserData'].name); 
            $modalId.text(json['responseData'].id);
            $modalParent_id.text(json['responseData'].parent_id);
            $modalUpId.text(json['upData'].parent_id); 
            
            $underDatas.empty();
              // dataの中身をループをつかってunderDatasにどんどんいれていく
              // comment.contentはご自身のデータベース構造、カラム名によって変わる
              json['underDatas'].forEach(comment => 
                $underDatas.append('<div class="card" style="height: 220px;">' + 
                    '<div class="card-body">' +
                        '<div class="side" style="margin-left:8px; margin-top:8px;">' +
                            '@if($alertcomment->user->image == null)' +
                                '<a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;">' +
                                   '<img class="img-fluid float-left user-img" src="{{ Gravatar::src($alertcomment->user->email, 500) }}" width="35" height="35" alt="" style="margin-right:15px;">' +
                                    '<span style="color:black; text-decoration: none;">' +
                                        comment.name +
                                    '</span>' +
                                '</a>'+
                            '@else' +
                                '<a href="/users/{{$alertcomment->user->id}}" style="text-decoration: none;">' +
                                   '<img class="float-left user-img" src="{{$alertcomment->user->image}}" width="35" height="35" style="margin-right:15px;">' +
                                    '<span style="color:black; text-decoration: none;">' +
                                        comment.name +
                                    '</span>' +
                                '</a>'+
                            '@endif' +
                            '<small>' +
                                '<span style="text-align:right; list-style: none; margin-right:8px;">' +
                                    comment.time +
                                '</span>' +
                            '</small>' +
                        '</div>' +
                        '<p style="margin-top:10px; margin-left:60px;">' +
                            comment.comment +
                        '</p>' +
                    '</div>' +
                '</div>'
                ));
        }).fail(function() {
            alert('通信に失敗しました。');
        });
    }
    
    
    function toggleFavoriteText(button,id) {
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
            // Ajaxリクエストが成功した���合
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
                alert('通信に失敗し��した');
            });
        }
    }
 
</script>
<style>
    .comment{
        font-size:35px;
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
    
</style>
@endsection