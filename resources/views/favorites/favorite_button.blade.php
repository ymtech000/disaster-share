@if (Auth::id() != $alert->id)
    @if (Auth::user()->is_favorite($alert->id))
        {!! Form::open(['route' => ['alerts.unfavorite', $alert->id], 'method' => 'delete']) !!}
            <button name="button" type="submit" style="cursor:pointer;">
                <span class="fas fa-thumbs-up unfavorite-btn" style="cursor:pointer;"></span>
            </button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['alerts.favorite', $alert->id]]) !!}
            <button name="button" type="submit">
                <span class="far fa-thumbs-up favorite-btn" style="cursor:pointer;"></span>
            </button> 
        {!! Form::close() !!}
    @endif
@endif
<style>
    .favorite-btn{
        color:red;
    }
</style>

