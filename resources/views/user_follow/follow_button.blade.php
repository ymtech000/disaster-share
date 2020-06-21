@if (Auth::id() !== $user->id)
    @if (Auth::user()->is_following($user->id))
        <button id="follow" class="btn btn-primary btn-black btn-follow" onclick="toggleText(this, {{ $user->id }})">フォロー中</button>
    @else
        <button id="follow" class="btn btn-primary btn-black btn-follow" onclick="toggleText(this, {{ $user->id }})">フォローする</button>
    @endif
@endif

