 $(window).resize(function(){
    var alerts = document.getElementsByClassName('alert_card');
    //windowの幅をxに代入
    var winsize = $(window).width();
    for (var i = 0; i<alerts.length; i++) {
        if (991 < winsize){
            $('#'+alerts[i].id).addClass('col-sm-4').removeClass('col-sm-3 col-sm-6');
        }else if(768 < winsize && winsize <= 991){
            $('#'+alerts[i].id).addClass('col-sm-6').removeClass('col-sm-3 col-sm-4');
        }else if(575< winsize && winsize <= 768){
            $('#'+alerts[i].id).addClass('col-sm-6').removeClass('col-sm-4 col-sm-3');
        }else{
            $('#'+alerts[i].id).addClass('col-sm-3').removeClass('col-sm-6 col-sm-4');
        }
    }
});