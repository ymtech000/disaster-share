@if (count($users) > 0)
    <ul class="list-unstyled">
       <div id="user_list" class="row">
            @foreach ($users as $user)
                <div class="card border-0 col-6 col-sm-6 col-md-4 col-xl-3 d-none d-sm-block post-cards" style="width: 100px">
                    @if($user->image == null)
                        <div class="card-body">
                            <a href="/users/{{$user->id}}"><img class=" user-img avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200"></a>
                            <p>{{$user->name}}</p>
                        </div>
                    @else
                        <div class="card-body">
                            <a href="/users/{{$user->id}}"><img class="user-img" src="{{$user->image}}" width="200" height="200"></a>
                            <p>{{ $user->name}}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif
