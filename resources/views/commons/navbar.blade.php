<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">災害掲示板</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">検索</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item">{!! link_to_route('searches1.index', '救助要請掲示板') !!}</li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">{!! link_to_route('searches2.index', '注意喚起掲示板') !!}</li>
                        
                            </ul>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">機能一覧</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item">{!! link_to_route('alerts.index', '注意喚起掲示板') !!}</li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">{!! link_to_route('rescues.index', '救助要請掲示板') !!}</li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">{!! link_to_route('locations.index', '重要施設の共有掲示板') !!}</li>
                            </ul>
                        </li>
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
                        
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>