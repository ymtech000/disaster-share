@if (Auth::id() != $alert->id)
    @if (Auth::user()->is_favorite($alert->id))
        {!! Form::open(['route' => ['alerts.unfavorite', $alert->id], 'method' => 'delete']) !!}
            <!--{!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}-->
            <button name="button" type="submit" class="unlike-button">
                <i class="fas fa-heart unfavorite-btn"></i>
            </button>
        
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['alerts.favorite', $alert->id]]) !!}
            <!--{!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}-->
            <button name="button" type="submit" class="like-button">
                <i class="far fa-heart favorite-btn"></i>
            </button> 
        {!! Form::close() !!}
    @endif
@endif
<style>
    .favorite-btn{
        color:red;
    }
</style>

