@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid mb-0">

  
      <div class="text-center">
          <h1>DISASTER SHARE</h1>
          <h3>災害時に位置情報を共有することのできるアプリです。</h3>
          <p>{!! link_to_route('signup.get', '新規登録はこちら', [], ['class' => 'btn btn-lg btn-primary']) !!}</p>
      </div>
</div>
@endsection
 
<style>
    img {
        border-radius: 50%;  /* 角丸半径を50%にする(=円形にする) */
        width:  180px;       /* ※縦横を同値に */
        height: 180px;       /* ※縦横を同値に */
    }
    .jumbotron{
        background:url("{{asset('assets/dawn.jpg')}}");
        background-size: cover;
    }
    .text-center h1{
        font-size:65px;
        opacity: 0.7;
        letter-spacing: 5px;
        padding-top:40px;
    }
    .text-center h3{
        padding-top:100px;
    }
    .text-center p{
        margin-top:60px;
    }
    .lesson {
      float: left;
      width: 33.3%;
      text-align:center;
    }
    .lesson{
      padding-right:15px;
      padding-left:15px;
    }
</style>