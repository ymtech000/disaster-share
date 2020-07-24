@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">USERS LIST</h1>
    @if (count($users) > 0)
        <div class='form-row'>
            @foreach ($users as $user)
                <div class="col-md-3">
                    <div class="card-body">
                        <p style="font-weight:bold;"><a href="/users/{{$user->id}}" style="color:black;">{{$user->name}}</a></p>
                        @if($user->image == null)
                            <a href="/users/{{$user->id}}"><img class=" user-img avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200"></a>
                        @else
                            <a href="/users/{{$user->id}}"><img class="user-img" src="{{$user->image}}" width="200" height="200"></a>
                        @endif
                        @include('user_follow.follow_button', ['user'=>$user])
                    </div>
                </div>
            @endforeach
        </div>
    {{ $users->links('pagination::bootstrap-4') }}
    @endif
@endsection
<style>
    h1{
        text-align:center;
    }
    .user-img{
        border-radius:10px;
        margin-bottom:3px;
    }
</style>