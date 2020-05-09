<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/alerts">DISASTER SHARE</a>
        <a href="/post_searches"><span class="fas fa-search"></span></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('alertmaps.index', '場所一覧', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('alerts.create', '新規投稿',[], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">
                                    <span class="fa fa-user" style="cursor:pointer"></span>
                                    {!! link_to_route('users.show', 'プロフィール', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">
                                    <span class="fa fa-tools" style="cursor:pointer"></span>
                                    {!! link_to_route('users.edit', '設定', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">
                                    <span class="fa fa-sign-out-alt" style="cursor:pointer"></span>
                                    {!! link_to_route('logout.get', 'ログアウト', '',['class' => 'btn btn-default']) !!}
                                </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
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