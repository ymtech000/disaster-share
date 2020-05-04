<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        @if($user->image == null)
            <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
        @else
            <img class="rounded img-fluid" src="{{$user->image}}">
        @endif
    </div>
    @include('user_follow.follow_button', ['user' => $user])
    @if(Auth::user()->id == $user->id)
        <div class="profile_edit">{!! link_to_route('users.edit', 'プロフィール編集',['id' => $user->id], ['class' => 'btn btn-light']) !!}</div>
    @endif
</div>
<style>
    .card{
        height:250px;
        width:250px;
    }
    .img-fluid{
        height:150px;
        width:150px;
    }
</style>