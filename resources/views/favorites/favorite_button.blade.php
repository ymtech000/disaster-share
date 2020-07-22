@if (Auth::user()->is_favorite($alert->id))
    <div id="favorite_parent{{$alert->id}}" class="unfavorite">
        <span id="favorite{{$alert->id}}" class="fas fa-thumbs-up unfavorite" onclick="postFavorite({{ $alert->id }})"></span>
    </div>
@else
    <div id="favorite_parent{{$alert->id}}" class="favorite">
        <span id="favorite{{$alert->id}}" class="far fa-thumbs-up favorite" onclick="postFavorite({{ $alert->id }})"></span>
    </div>
@endif
