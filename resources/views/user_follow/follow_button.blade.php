@if (Auth::id() !== $user->id)
    @if (Auth::user()->is_following($user->id))
        <button id="follow-red" class="btn btn-danger btn-black btn-follow" onclick="toggleFollowText(this, {{ $user->id }})" style=" width:200px; height:38px; margin-top:3px;">フォロー中</button>
    @else
        <button id="follow-blue" class="btn btn-primary btn-black btn-follow" onclick="toggleFollowText(this, {{ $user->id }})" style=" width:200px; height:38px; margin-top:3px;">フォローする</button>
    @endif
@endif