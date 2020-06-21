<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Disaster-Share</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
            <a class="navbar-brand" href="/alerts">DISASTER SHARE</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item"><a href="{{route('users.index') }}" class ="nav-link"><span class="fa fa-users"></span>ユーザー</a></li>
                        <li class="nav-item"><a href="{{route('alertmaps.index') }}" class ="nav-link"><span class="fa fa-map-marker-alt"></span>場所一覧</a></li>
                        <li class="nav-item"><a href="{{route('alerts.create') }}" class ="nav-link"><span class="fa fa-edit"></span>新規投稿</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item">
                                         <a href="{{route('users.show', ['id' => Auth::id()]) }}" style="color:black;"><span class="fa fa-user"></span></a>
                                        {!! link_to_route('users.show', 'プロフィール', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="{{route('users.edit', ['id' => Auth::id()]) }}" style="color:black;"><span class="fa fa-tools"></span></a>
                                        {!! link_to_route('users.edit', '設定', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="{{route('logout.get') }}" style="color:black;"><span class="fa fa-sign-out-alt"></span></a>
                                        {!! link_to_route('logout.get', 'ログアウト', '',['class' => 'btn btn-default']) !!}
                                    </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link"><span class="fa fa-sign-in-alt"></span>ログイン</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="full-image">
            <div class="text-center">
                <h1>DISASTER SHARE</h1>
                <h3>災害時に情報とその場所を共有することのできるアプリです。</h3>
                <p>{!! link_to_route('signup.get', '新規登録はこちら', [], ['class' => 'btn btn-lg btn-primary']) !!}</p>
            </div>
        </div>
        <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
<style>
    .full-image{
        background:url("{{asset('assets/dawn.jpg')}}");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
    }
</style>