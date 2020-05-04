<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $user->name }}</h4>
        @if(Auth::user()->id == $user->id)
        <a href="#" class="nav-link" data-toggle="dropdown"><span class="fa fa-ellipsis-h"></span></a>
        <ul class="dropdown-menu" style="list-style: none;">
            <li class="dropdown-item">{!! link_to_route('users.edit', '設定', ['id' => Auth::id()]) !!}</li>
            <li class="dropdown-item">{!! link_to_route('users.destroy', '退会', ['id' => Auth::id()]) !!}</li>
            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
        </ul>
        @endif
        
    </div>
    
    <div class="card-body">
        @if($user->image == null)
            <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
        @else
            <img class="rounded img-fluid" src="{{$user->image}}">
        @endif
    </div>
    @include('user_follow.follow_button', ['user' => $user])
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
    a{
        color:black;
    }
</style>
    
        