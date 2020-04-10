<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/alerts">DISASTER SHARE</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--{!! link_to_route('alertmaps.index', '地図') !!}-->
        <button name="button" type="submit" class="map-button">
          <a href="/alertmaps"><i class="fa fa-map-marker-alt"></i></a>
        </button>
        
        <a href="/post_searches"><span class="fas fa-search"></span></a>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('alerts.index', '投稿一覧',[], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('alerts.create', '新規投稿',[], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'プロフィール', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('unsubscribe.index', '退会' )!!}</li>
                    </ul>
                        </li>
                @else
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    <!--<li class="nav-item">{!! link_to_route('login', 'かんたんログインログイン', [], ['class' => 'nav-link']) !!}</li>-->
                @endif
            </ul>
        </div>
    </nav>
</header>
<style>
    .fa-search{
        color:white;
    }
</style>