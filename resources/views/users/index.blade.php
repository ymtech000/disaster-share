@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">USERS LIST</h1>
    @if (count($users) > 0)
        <div class='form-row'>
            @foreach ($users as $user)
                <div class="col-md-3">
                    <div class="card-body">
                        <p style="font-weight:bold;"><a href="/users/{{$user->id}}" style="color:black; text-decoration: none;">{{$user->name}}</a></p>
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function toggleFollowText(button,id) {
        var element_follow = document.getElementById("follow_"+id);
        console.log(element_follow.className);
        if (button.innerHTML === "フォローする") {
            button.innerHTML = "フォロー中";
            element_follow.className = "btn btn-danger";
            
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/'+ id +'/follow',
                dataType:'json',
                type: 'POST', 
                data: {'id': id, _token: '{{ csrf_token() }}',},
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
               
            }).fail(function(){
                alert('通信に失敗しました');
            });
        } else {
            button.innerHTML = "フォローする";
            element_follow.className = "btn btn-primary";
            $.ajax({
                headers : {
                　'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/'+ id +'/unfollow',
                dataType:'json',
                type: 'POST', 
                data: {'id': id,'_method': 'DELETE'},  _token: '{{ csrf_token() }}',
            })
            // Ajaxリクエストが成功した場合
            .done(function (results){
               
            }).fail(function(){
                alert('通信に失敗しました');
            });
        }
    }
</script>    
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