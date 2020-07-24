function postDeletedata(id){
    $.ajax({
        url: '/alertcomments/'+id,
        type: 'POST',
        headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
        data: {'id': id,'_method': 'DELETE'} 
    })
    .done(function() {
        $('.alertcomment-body-'+ id).remove();
    })
    .fail(function() {
    alert('通信に失敗しました。');
    });
}