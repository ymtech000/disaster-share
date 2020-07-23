@if (Auth::user()->is_favorite($alert->id))
    <div id="favorite_parent{{$alert->id}}" class="unfavorite">
        <span id="favorite{{$alert->id}}" class="far fa-thumbs-up" onclick="postFavorite({{ $alert->id }}, {{ count($alert->favorited)}})"></span>
    </div>
@else
    <div id="favorite_parent{{$alert->id}}" class="favorite">
        <span id="favorite{{$alert->id}}" class="far fa-thumbs-up" onclick="postFavorite({{ $alert->id }}, {{ count($alert->favorited)}})"></span>
    </div>
@endif
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
