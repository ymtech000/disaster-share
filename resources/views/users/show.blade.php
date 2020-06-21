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
            <div class="card-body"> 
                @if($user->image == null)
                    <img src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200" style="border-radius:10px; margin-bottom:3px;">
                @else
                    <img src="{{$user->image}}" width="200" height="200" style="border-radius:10px;margin-bottom:3px;">
                @endif
                @if (Auth::id() !== $user->id)
                    @if (Auth::user()->is_following($user->id))
                        <button id="follow" class="btn btn-primary btn-black btn-follow" onclick="toggleText(this, {{ $user->id }})" style=" width:200px; height:38px;">フォロー中</button>
                    @else
                        <button id="follow" class="btn btn-primary btn-black btn-follow" onclick="toggleText(this, {{ $user->id }})" style=" width:200px; height:38px;">フォローする</button>
                    @endif
                @endif
            </div>
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
        @if (count($alerts) > 0)
            @include('alerts.alerts', ['alerts' => $alerts])
        @endif



<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function toggleText(button,id) {
        if (button.innerHTML === "フォローする") {
            button.innerHTML = "フォロー中";
            console.log(id);
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
                console.log(results);
            }).fail(function(){
                alert('通信に失敗しました');
            });
        } else {
            button.innerHTML = "フォローする";
            
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
                console.log(results);
            }).fail(function(){
                alert('通信に失敗しました');
            });
        }
    }
</script>    
@endsection
<style>
    .card{
        margin-bottom:70px;
    }
    .follow{
        width:200px;
    }
    .name{
        margin-top:30px;
    }
</style>