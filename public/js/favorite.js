function postFavorite(id, favorite_count) {
    let favorite_class = $('#favorite'+id).parent().attr('class');
    console.log(favorite_class);
    let favorite_button = document.getElementById("favorite_count"+id);
    let favorite_parent = document.getElementById("favorite_parent"+id);
    let csrf = document.getElementsByName('csrf-token').content;
    
    if (favorite_class === 'favorite') {
        favorite_parent.className = 'unfavorite';
        favorite_button.innerHTML = Number(favorite_button.innerHTML)+1;
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },     
            url: '/alerts/'+ id +'/favorite',
            dataType:'json',
            type: 'POST', 
            data: {'id': id, _token: csrf,},
        })
        // Ajaxリクエストが成功した場合
        .done(function (results){
            console.log(results);
        }).fail(function(){
            alert('通信に失敗しました');
        });
    } else {
        favorite_parent.className = 'favorite';
        favorite_button.innerHTML = Number(favorite_button.innerHTML)-1;
        
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },    
            url: '/alerts/'+ id +'/unfavorite',
            dataType:'json',
            type: 'POST', 
            data: {'id': id,'_method': 'DELETE'},  _token: csrf,
        })
        // Ajaxリクエストが成功した場合
        .done(function (results){
            console.log(results);
        }).fail(function(){
            alert('通信に失敗しました');
        });
    }
}