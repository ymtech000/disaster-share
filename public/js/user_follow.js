function toggleFollowText(button,id) {
        var element_follow = document.getElementById("follow_"+id);
        console.log(element_follow.className);
        if (button.innerHTML === "フォローする") {
            button.innerHTML = "フォロー中";
            element_follow.className = "btn btn-danger";
            
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/'+ id +'/follow',
                dataType:'json',
                type: 'POST', 
                data: {'id': id, _token: '{{ csrf_token() }}',},
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
               
            }).fail(function(){
                alert('通信に失敗しました');
            });
        } else {
            button.innerHTML = "フォローする";
            element_follow.className = "btn btn-primary";
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/'+ id +'/unfollow',
                dataType:'json',
                type: 'POST', 
                data: {'id': id,'_method': 'DELETE'},  _token: '{{ csrf_token() }}',
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
               
            }).fail(function(){
                alert('通信に失敗しました');
            });
        }
    }