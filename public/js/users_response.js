$(window).resize(function(){
    var users = document.getElementsByClassName('user_card');
    //windowの幅をxに代入
    var winsize = $(window).width();
    for (var i = 0; i<users.length; i++) {
        if (991 < winsize){
            $('#'+users[i].id).addClass('col-sm-3').removeClass('col-sm-4');
        }else if(768< winsize <= 991){
            $('#'+users[i].id).addClass('col-sm-4').removeClass('col-sm-3');
        }else{
            $('#'+users[i].id).addClass('col-sm-3').removeClass('col-sm-4');
        }
    }
});
