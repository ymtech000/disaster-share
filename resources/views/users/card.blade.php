<div class="card">
    <!--<div class="card-header">-->
    <!--    <h4 class="card-title head">{{ $user->name }}</h4>-->
    <!--</div>-->
    <div class="card-body">
        @if($user->image == null)
            <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" width="150" height="150" alt="">
        @else
            <img class="rounded img-fluid" src="{{$user->image}}" width="150" height="150">
        @endif
    </div>
    @include('user_follow.follow_button', ['user' => $user])
</div>
<style>
    .card{
        height:250px;
        width:250px;
        
    }
</style>
    
        