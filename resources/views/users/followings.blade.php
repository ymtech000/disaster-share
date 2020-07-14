@extends('layouts.app')

@section('content')
    <div class="error">
        @if (\Session::has('error'))
            <div class="alert alert-error" id="error">
                {!! \Session::get('error') !!}
            </div>
        @endif
    </div>
   <div class='form-row'>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            @include('users.card', ['user'=>$user])
        </div>
        <div class="col-md-3">
            <div class="name">
                <p style="font-weight:bold;">{{$user->name}}</p>
                <p>{{$user->introduction}}</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
  
        <div class="navtabs">
            @include('users.navtabs', ['user' => $user])
        </div>
        @include('users.users', ['users' => $users])
        

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function toggleFollowText(button,id) {
        var element_follow = document.getElementById("follow_"+id);
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
<style>
    .name{
        margin-top:30px;
    }
</style>
        
@endsection