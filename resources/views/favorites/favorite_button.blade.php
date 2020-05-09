@if (Auth::id() != $alert->id)
    @if (Auth::user()->is_favorite($alert->id))
        {!! Form::open(['route' => ['alerts.unfavorite', $alert->id], 'method' => 'delete']) !!}
            <button name="button" type="submit" class="heart-button" style="cursor:pointer">
                <i class="fas fa-thumbs-up unfavorite-btn"></i>
            </button>
        
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['alerts.favorite', $alert->id]]) !!}
            <button name="button" type="submit" class="heart-button" style="cursor:pointer">
                <i class="far fa-thumbs-up favorite-btn"></i>
            </button> 
        {!! Form::close() !!}
    @endif
@endif
<style>
    .favorite-btn{
        color:red;
    }
</style>

