@if (Auth::id() !== $user->id)
    @if (Auth::user()->is_following($user->id))
        <button class="btn btn-danger follow_button" id="follow_{{ $user->id }}" onclick="toggleFollowText(this, {{ $user->id }})">フォロー中</button>
    @else
        <button class="btn btn-primary follow_button" id="follow_{{ $user->id }}" onclick="toggleFollowText(this, {{ $user->id }})">フォローする</button>
    @endif
@endif
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/user_follow.js') }}"></script>
