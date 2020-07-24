<div class="card-body"> 
    @if($user->image == null)
        <img src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200" style="border-radius:10px; margin-bottom:3px;">
    @else
        <img src="{{$user->image}}" width="200" height="200" style="border-radius:10px;margin-bottom:3px;">
    @endif
    @include('user_follow.follow_button', ['user'=>$user])
</div>
<style>
    .user-img{
        border-radius:10px;
        margin-bottom:3px;
    }
</style>