<ul class="nav nav-tabs nav-justified mb-3 col-12">
    <li class="nav-item"><a href="{{ route('users.show', [$user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">タイムライン <span class="badge badge-secondary">{{ $count_alerts }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.followings', [$user->id]) }}" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}">フォロー中<span class="badge badge-secondary">{{ $count_followings }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.followers', [$user->id]) }}" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}">フォロワー<span class="badge badge-secondary">{{ $count_followers }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', [$user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">いいね中<span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
</ul>