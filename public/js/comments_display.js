function postData(id){
    var $upData =$('#upData'+id);
    var $underDatas =$('#underDatas'+id);
    var $vertical =$('#vertical'+id);
    var $blank =$('#blank'+id);
    $.ajax({
        headers : {
        　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url: '/alertcomments/'+ id +'/ajax',
        type : 'POST',
        data: {'id': id},
    }).done(function(json) {
        blank = '<div class="blank">'+'</div>';
         $blank.append(blank);
        
        $("#alertcomment-comment-thread"+id).modal("show");
        
        var $modalUser_Name = $('#modal-user_name'+id);
        var $modalUser_Email = $('#modal-user_email'+id);
        var $modalUser_Image = $('#modal-user_image'+id);
        var $modalComment = $('#modal-comment'+id);
        var $modalTime = $('#modal-time'+id);
        
        $modalUser_Name.text(json['userData'].name);
        $modalUser_Email.text(json['userData'].email);
        $modalUser_Image.text(json['userData'].image);
        $modalComment.text(json['responseData'].comment);
        $modalTime.text(json['responseData'].time);
        
        $upData.empty();
       
         if(json["upData"] ==null){
             var $deleted = $('#deleted'+id);
            $deleted.text("返信元のコメントが存在しません。");
            $upData.parent().remove();
        }else{
            var up_mail_hash = CybozuLabs.MD5.calc(json["upuserData"].email);
            upData =  
            '<div class="card" style="min-height:150px;">'+
                '<div class="side" style="margin-left:8px; margin-top:8px;">' +
                    '<a href="/users/'+json["upuserData"].id+'" style="cursor:pointer">';
                        if (json["upuserData"].image == null) {
                            upData += '<img class="img-fluid float-left user-img" src="https://www.gravatar.com/avatar/'+up_mail_hash+'?s=35&r=g&d=identicon'+'" alt="" style="margin-right:15px; border-radius:50%;">';
                        } else {
                            upData += '<img class="float-left user-img" src="'+json["upuserData"].image+'" width="35" height="35" style="margin-right:15px; border-radius:50%;">';
                        }
                        upData += '<span style="color:black;">' +
                                        json["upuserData"].name +
                                    '</span>' +
                    '</a>'+
                    '<small>' +
                        '<span style="text-align:right; list-style: none; margin-right:8px;">' +
                            json["upData"].time +
                        '</span>' +
                    '</small>' +
                '</div>' +
                '<p style="margin-top:10px; margin-left:60px;">' +
                    json["upData"].comment +
                '</p>'+
            '</div>'+
            '<div class="vertical_line" id="veprtical'+comment.id+'">'+'</div>';
            $upData.append(upData);
            }
        
        $underDatas.empty();
          // dataの中身をループをつかってunderDatasにいれていく
        if(json["underDatas"] ==''){
            $underDatas.parent().remove();
        }else{
            vertical_line = '<div class="vertical_line" id="vertical'+comment.id+'">'+'</div>';
            $vertical.append(vertical_line);
            json['underDatas'].forEach(function(comment) { 
                var under_mail_hash = CybozuLabs.MD5.calc(comment.email);
                underData =
                '<div class="card" style="min-height: 150px;">'+
                    '<div class="side" style="margin-left:8px; margin-top:8px;">' +
                        '<a href="/users/'+comment.id+'" style="cursor:pointer">';
                            if (comment.image == null) {
                                underData += '<img class="img-fluid float-left user-img" src="https://www.gravatar.com/avatar/'+under_mail_hash+'?s=35&r=g&d=identicon'+'" alt="" style="margin-right:15px; border-radius:50%;">';
                            } else {
                                underData += '<img class="float-left user-img" src="'+comment.image+'" width="35" height="35" style="margin-right:15px; border-radius:50%;">';
                            }
                            underData +='<span style="color:black;">' +
                                            comment.name +
                                        '</span>' +
                        '</a>'+
                        '<small>' +
                            '<span style="text-align:right; list-style: none; margin-right:8px;">' +
                                comment.time +
                            '</span>' +
                        '</small>' +
                    '</div>' +
                    '<p style="margin-top:10px; margin-left:60px;">' +
                        comment.comment +
                    '</p>'+
                '</div>';
            $underDatas.append(underData);
        });
    }
    }).fail(function() {
        alert('通信に失敗しました。');
    });
}