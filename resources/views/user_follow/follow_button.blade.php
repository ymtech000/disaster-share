@if (Auth::id() !== $user->id)
    @if (Auth::user()->is_following($user->id))
        <button class="btn btn-danger" id="follow_{{ $user->id }}" onclick="toggleFollowText(this, {{ $user->id }})" style=" width:200px; height:38px;">フォロー中</button>
    @else
        <button class="btn btn-primary" id="follow_{{ $user->id }}" onclick="toggleFollowText(this, {{ $user->id }})" style=" width:200px; height:38px;">フォローする</button>
    @endif
@endif
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/user_follow.js') }}"></script>
