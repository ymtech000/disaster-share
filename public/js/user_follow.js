function toggleFollowText(button,id) {
        var element_follow = document.getElementById("follow_"+id);
        let csrf = document.getElementById('csrf-token').content;
        if (button.innerHTML === "フォローする") {
            button.innerHTML = "フォロー中";
            element_follow.className = "btn btn-danger follow_button";
            
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/'+ id +'/follow',
                dataType:'json',
                type: 'POST', 
                data: {'id': id, _token: csrf,},
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
               
            }).fail(function(){
                alert('通信に失敗しました');
            });
        } else {
            button.innerHTML = "フォローする";
            element_follow.className = "btn btn-primary follow_button";
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/'+ id +'/unfollow',
                dataType:'json',
                type: 'POST', 
                data: {'id': id,'_method': 'DELETE'},  _token: csrf,
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
               
            }).fail(function(){
                alert('通信に失敗しました');
            });
        }
    }