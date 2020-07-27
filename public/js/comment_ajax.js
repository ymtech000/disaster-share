 $('#form').submit(function(event) {
    event.preventDefault();
    var $form = $(this);
    var $button = $form.find('button');
    var $results = $('#results');
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
      // すでにあるresultsの中身を空にする
      $results.empty();
      $('.alert-comment').hide();
      // dataの中身をループをつかってresultsにどんどんいれていく
      // comment.contentは自身のデータベース構造、カラム名によって変わる
      data['comments'].forEach(function(comment){ 
        var mail_hash = CybozuLabs.MD5.calc(comment.email);
        let csrf = document.getElementById('csrf-token').content;
          // dataの中身をループをつかってresultsにどんどんいれていく
        commentData = 
            '<div class="modal fade" id="alertcomment-comment'+comment.id+'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h4 class="modal-title">'+
                                'コメント'+
                            '</h4>'+
                            '<button id="delete-modal'+comment.id+'" type="button" class="btn btn-default" data-dismiss="modal">'+
                                '<span class="fa fa-times">'+
                                '</span>'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<form id="comment'+comment.id+'" method="POST" action="/ajax">'+
                                '<div class="form-group">'+
                                    '<input type="hidden" name="_token" value="'+csrf+'">'+
                                    '<input type="hidden" name="alert_id" value="'+comment.alert_id+'">'+
                                    '<input type="hidden" name="parent_id" value="'+comment.id+'">'+
                                    '<textarea class="form-control" name="comment" style="font-size:1.3em;">'+
                                    '</textarea>'+
                                '</div>'+
                                '<button type="button" class="comment-button btn btn-primary" style="float:right;">'+
                                    'コメントする'+
                                '</button>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            
            '<div class="modal fade" id="alertcomment-delete'+comment.id+'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h4>'+
                                '<class="modal-title">'+
                                    '投稿削除確認画面'
                                +'</h4>'+
                            '<button type="button" class="btn btn-default" data-dismiss="modal">'+
                                '<span class="fa fa-times">'+'</span>'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<label>'+
                                '本当に削除しますか？（この操作は取り消しできません。）'
                            +'</label>'+
                        '</div>'+
                        '<div class="modal-footer">'+
                            '<button class="btn btn-danger" onclick="postDeletedata('+comment.id+')" data-dismiss="modal">'+
                                '削除'
                            +'</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+

           '<div class="modal fade" id="alertcomment-comment-thread'+comment.id+'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'+
                        '<div class="modal-dialog">'+
                            '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                    '<h4>'+'</h4>'+
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">'+
                                        '<span class="fa fa-times" style="cursor:pointer;">'+'</span>'+
                                    '</button>'+
                                '</div>'+
                                '<div class="modal-body">';
                                    if(data['comments'].length>0){
                                        commentData += '<p>' +
                                                            '<div id="deleted'+comment.id+'">'+'</div>'+
                                                        '</p>'+
                                        '<div>';
                                            if(comment.parent_id !== null){
                                                commentData += '<div class="card card-body" style="min-height:150px; margin-bottom:10px;">'+
                                                        '<div id="upData'+comment.id+'">'+'</div>'+
                                                '</div>';
                                        }
                                        commentData +=    '<div class="card" style="min-height:150px; margin-bottom:10px;">'+
                                                '<div class="card-body">'+
                                                    '<div class="side" style="margin-left:8px; margin-top:8px;">' +
                                                        '<a href="/users/'+comment.userId+'">';
                                                            if(comment.image == null){
                                                                commentData += '<img class="img-fluid float-left user-img" src="https://www.gravatar.com/avatar/'+mail_hash+'?s=35&r=g&d=identicon'+'" alt="" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                            }else{
                                                                commentData += '<img class="float-left user-img" src="'+comment.image+'" width="35" height="35" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                            }
                                                            commentData += '<span id="modal-user_name'+comment.id+'" style="color:black;">'+'</span>'+
                                                        '</a>'+
                                                        '<small>'+
                                                            '<span id="modal-time'+comment.id+'" style="text-align:right; list-style: none; margin-right:8px;">'+'</span>'+
                                                        '</small>'+
                                                    '</div>'+
                                                    '<p style="margin-top:10px; margin-left:60px;">'+
                                                        '<span id="modal-comment'+comment.id+'">'+'</span>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="card card-body" style="min-height:150px;">'+
                                                '<div id="underDatas'+comment.id+'">'+'</div>'+
                                            '</div>'+
                                        '</div>';
                                    }
                                commentData += '</div>'+
                            '</div>'+
                        '</div>'+
                         '</div>'+
                            '<div class="form-row">'+
                                '<div class="col-sm-8 offset-sm-2">'+
                                    '<div class="card alert-comment alertcomment-body-'+comment.id+'" style="min-height:150px; cursor:pointer; margin-top:10px;" onclick="postData('+comment.id+')">'+
                                        '<div class="side" style="margin-left:8px; margin-top:8px;">'+
                                            '<a href="/users/'+comment.user_id+'" onclick="event.stopPropagation();">'+
                                                '<div>';
                                                    if(comment.image == null){
                                                        commentData += '<img class="img-fluid float-left user-img" src="https://www.gravatar.com/avatar/'+mail_hash+'?s=35&r=g&d=identicon'+'" alt="" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                    }else{
                                                        commentData += '<img class="float-left user-img" src="'+comment.image+'" width="35" height="35" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                    }
                                                    commentData += '<span style="color:black;">'+
                                                                        comment.name+
                                                                    '</span>'+
                                                '</div>'+
                                            '</a>'+
                                            '<small>'+
                                                '<span style="text-align:right; list-style: none; margin-right:8px;">'+
                                                    comment.time+
                                                '</span>'+
                                            '</small>'+
                                        '</div>'+
                                        '<p style="margin-top:10px; margin-left:60px; margin-right:10px;">'+
                                            comment.comment+
                                        '</p>'+
                                        '<p style="margin-top:8px;">'+
                                            '<ul class="icons" style="list-style: none;">'+
                                                '<li>'+
                                                    '<span class="far fa-comment icon" style="color:black;" onclick="openCommentModal('+comment.id+'); event.stopPropagation();">'+
                                                    '</span>'+
                                                '<li>';
                                                
                                                if(data['AuthId'] === comment.user_id){
                                                            commentData += '<li>'+
                                                            '<span class="fa fa-trash fa-lg icon" style="color:black; margin-left:5px;" onclick="openDeleteModal('+comment.id+'); event.stopPropagation();">'+
                                                            '</span>';
                                                }
                                                commentData += '</li>'+
                                            '</ul>'+
                                        '</p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
            $results.append(commentData);
            });
    }, function(){
      // 失敗したとき
      alert('通信に失敗しました');
    }).always(function(xhr, textStatus) {
        // ボタンを有効化し、再送信を許可
      $button.attr('disabled', false);
    });
});
    
    $(document).on('click', '.comment-button', function(){ 
        var form_id =  $(this).parent().attr("id");
        var $form = $(this).parent();
         // 送信ボタンを取得
        var $button = $form.find('button');
        var $results = $('#results');
        
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
            // 成功したとき
            $("#alertcomment-"+form_id).modal("hide");
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
            
            // inputの中身を空にする
            $('#'+form_id+'[name="comment"]').val("");
            // すでにあるresultsの中身を空にする
            $results.empty();
            $('.alert-comment').hide();
            
            data['comments'].forEach(function(comment){ 
            var mail_hash = CybozuLabs.MD5.calc(comment.email);
            let csrf = document.getElementById('csrf-token').content;
            console.log(csrf);
            // dataの中身をループをつかってresultsにどんどんいれていく
            commentData = 
            '<div class="modal fade" id="alertcomment-comment'+comment.id+'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h4 class="modal-title">'+
                                'コメント'+
                            '</h4>'+
                            '<button id="delete-modal'+comment.id+'" type="button" class="btn btn-default" data-dismiss="modal">'+
                                '<span class="fa fa-times">'+
                                '</span>'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<form id="comment'+comment.id+'" method="POST" action="/ajax">'+
                                '<div class="form-group">'+
                                    '<input type="hidden" name="_token" value="'+csrf+'">'+
                                    '<input type="hidden" name="alert_id" value="'+comment.alert_id+'">'+
                                    '<input type="hidden" name="parent_id" value="'+comment.id+'">'+
                                    '<textarea class="form-control" name="comment" style="font-size:1.3em;">'+
                                    '</textarea>'+
                                '</div>'+
                                '<button type="button" class="comment-button btn btn-primary" style="float:right;">'+
                                    'コメントする'+
                                '</button>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            
            '<div class="modal fade" id="alertcomment-delete'+comment.id+'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h4>'+
                                '<class="modal-title">'+
                                    '投稿削除確認画面'
                                +'</h4>'+
                            '<button type="button" class="btn btn-default" data-dismiss="modal">'+
                                '<span class="fa fa-times">'+'</span>'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<label>'+
                                '本当に削除しますか？（この操作は取り消しできません。）'
                            +'</label>'+
                        '</div>'+
                        '<div class="modal-footer">'+
                            '<button class="btn btn-danger" onclick="postDeletedata('+comment.id+')" data-dismiss="modal">'+
                                '削除'
                            +'</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            
            '<div class="modal fade" id="alertcomment-comment-thread'+comment.id+'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'+
                        '<div class="modal-dialog">'+
                            '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                    '<h4>'+'</h4>'+
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">'+
                                        '<span class="fa fa-times" style="cursor:pointer;">'+'</span>'+
                                    '</button>'+
                                '</div>'+
                                '<div class="modal-body">';
                                    if(data['comments'].length>0){
                                        commentData += '<p>' +
                                                            '<div id="deleted'+comment.id+'">'+'</div>'+
                                                        '</p>'+
                                        '<div>';
                                            if(comment.parent_id !== null){
                                                commentData += '<div class="card card-body" style="min-height:150px; margin-bottom:10px;">'+
                                                        '<div id="upData'+comment.id+'">'+'</div>'+
                                                '</div>';
                                            }
                                        commentData +=    '<div class="card" style="min-height:150px; margin-bottom:10px;">'+
                                                '<div class="card-body">'+
                                                    '<div class="side" style="margin-left:8px; margin-top:8px;">' +
                                                        '<a href="/users/'+comment.userId+'">';
                                                            if(comment.image === null){
                                                                commentData += '<img class="img-fluid float-left user-img" src="https://www.gravatar.com/avatar/'+mail_hash+'?s=35&r=g&d=identicon'+'" alt="" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                            }else{
                                                                commentData += '<img class="float-left user-img" src="'+comment.image+'" width="35" height="35" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                            }
                                                            commentData += '<span id="modal-user_name'+comment.id+'" style="color:black;">'+'</span>'+
                                                        '</a>'+
                                                        '<small>'+
                                                            '<span id="modal-time'+comment.id+'" style="text-align:right; list-style: none; margin-right:8px;">'+'</span>'+
                                                        '</small>'+
                                                    '</div>'+
                                                    '<p style="margin-top:10px; margin-left:60px;">'+
                                                        '<span id="modal-comment'+comment.id+'">'+'</span>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="card card-body" style="min-height:150px;">'+
                                                '<div id="underDatas'+comment.id+'">'+'</div>'+
                                            '</div>'+
                                        '</div>';
                                    }
                                commentData += '</div>'+
                            '</div>'+
                        '</div>'+
                         '</div>'+
                                '<div class="form-row">'+
                                    '<div class="col-sm-8 offset-sm-2">'+
                                        '<div class="card alert-comment alertcomment-body-'+comment.id+'" style="min-height:150px; cursor:pointer; margin-top:10px;" onclick="postData('+comment.id+')">'+
                                            '<div class="side" style="margin-left:8px; margin-top:8px;">'+
                                                '<a href="/users/'+comment.user_id+'" onclick="event.stopPropagation();">'+
                                                    '<div>';
                                                        if(comment.image === null){
                                                            commentData += '<img class="img-fluid float-left user-img" src="https://www.gravatar.com/avatar/'+mail_hash+'?s=35&r=g&d=identicon'+'" alt="" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                        }else{
                                                            commentData += '<img class="float-left user-img" src="'+comment.image+'" width="35" height="35" style="margin-right:15px; border-radius:50%;" onclick="location:href="/users/'+comment.id+'";">';
                                                        }
                                                        commentData += '<span style="color:black;">'+
                                                                            comment.name+
                                                                        '</span>'+
                                                    '</div>'+
                                                '</a>'+
                                                '<small>'+
                                                    '<span style="text-align:right; list-style: none; margin-right:8px;">'+
                                                        comment.time+
                                                    '</span>'+
                                                '</small>'+
                                            '</div>'+
                                            '<p style="margin-top:10px; margin-left:60px; margin-right:10px;">'+
                                                comment.comment+
                                            '</p>'+
                                            '<p style="margin-top:8px;">'+
                                                '<ul class="icons" style="list-style: none;">'+
                                                    '<li>'+
                                                        '<span class="far fa-comment icon" style="color:black;" onclick="openCommentModal('+comment.id+'); event.stopPropagation();">'+
                                                        '</span>'+
                                                    '<li>';
                                                
                                                    if(data['AuthId'] === comment.user_id){
                                                            commentData += '<li>'+
                                                            '<span class="fa fa-trash fa-lg icon" style="color:black; margin-left:5px;" onclick="openDeleteModal('+comment.id+'); event.stopPropagation();">'+
                                                            '</span>';
                                                    }
                                                    commentData += '</li>'+
                                                '</ul>'+
                                            '</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
        $results.append(commentData);
        });
    }, function () {
      // 失敗したとき
      alert('通信に失敗しました');
    }).always(function(xhr, textStatus) {
        // ボタンを有効化し、再送信を許可
      $button.attr('disabled', false);
    });
});