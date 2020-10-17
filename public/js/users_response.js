$(window).resize(function(){
    var users = document.getElementsByClassName('user_card');
    //windowの幅をxに代入
    var winsize = $(window).width();
    for (var i = 0; i<users.length; i++) {
        if (768 < winsize){
            $('#'+users[i].id).addClass('col-sm-4').removeClass('col-sm-3 col-sm-6');
        }else if(574< winsize && winsize <= 768){
            $('#'+users[i].id).addClass('col-sm-6').removeClass('col-sm-4 col-sm-3');
        }else{
            $('#'+users[i].id).addClass('col-sm-3').removeClass('col-sm-6 col-sm-4');
        }
    }
});