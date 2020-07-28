<div class="card-body"> 
    @if($user->image == null)
        <img src="{{ Gravatar::src($user->email) }}" alt="" style="border-radius:10px; margin-bottom:3px; width:100%;">
    @else
        <img src="{{$user->image}}" style="border-radius:10px;margin-bottom:3px; width:100%;">
    @endif
    @include('user_follow.follow_button', ['user'=>$user])
</div>
<style>
    .user-img{
        border-radius:10px;
        margin-bottom:3px;
    }
</style>