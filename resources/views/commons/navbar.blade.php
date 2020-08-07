<header class="mb-4">
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
                    <li class="nav-item"><a href="/post_searches" class ="nav-link"><span class="fa fa-search"></span>検索</a></li>
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
</header>
