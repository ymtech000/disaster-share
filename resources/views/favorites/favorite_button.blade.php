@if (Auth::user()->is_favorite($alert->id))
    <div id="favorite_parent{{$alert->id}}" class="unfavorite">
        <span id="favorite{{$alert->id}}" class="far fa-thumbs-up" onclick="postFavorite({{ $alert->id }}, {{ count($alert->favorited)}})"></span>
    </div>
@else
    <div id="favorite_parent{{$alert->id}}" class="favorite">
        <span id="favorite{{$alert->id}}" class="far fa-thumbs-up" onclick="postFavorite({{ $alert->id }}, {{ count($alert->favorited)}})"></span>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function postFavorite(id, favorite_count) {
        let favorite_class = $('#favorite'+id).parent().attr('class');
        console.log(favorite_class);
        let favorite_button = document.getElementById("favorite_count"+id);
        let favorite_parent = document.getElementById("favorite_parent"+id);
        
        if (favorite_class === 'favorite') {
            favorite_parent.className = 'unfavorite';
            favorite_button.innerHTML = Number(favorite_button.innerHTML)+1;
            
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/alerts/'+ id +'/favorite',
                dataType:'json',
                type: 'POST', 
                data: {'id': id, _token: '{{ csrf_token() }}',},
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
                alert('通信に失敗しました');
            });
        }
    }
</script>
<style>
    .fa-thumbs-up{
        cursor:pointer;
    }
    .favorite:hover {
      border-bottom-color: transparent;
      transform: translateY(0.1875em);
    }
    .unfavorite:hover{
        border-bottom-color: transparent;
      transform: translateY(0.1875em);
    }
    .unfavorite{
        color:red;
    }
</style>
