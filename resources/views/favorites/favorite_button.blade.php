@if (Auth::id() != $alert->id)
    @if (Auth::user()->is_favorite($alert->id))
        {!! Form::open(['route' => ['alerts.unfavorite', $alert->id], 'method' => 'delete']) !!}
            <button name="button" type="submit" class="heart-button">
                <i class="fas fa-heart unfavorite-btn"></i>
            </button>
        
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['alerts.favorite', $alert->id]]) !!}
            <button name="button" type="submit" class="heart-button">
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

