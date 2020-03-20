<ul class="media-list">
    @foreach ($locations as $location)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($location->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $location->user->name, ['id' => $location->user->id]) !!} <span class="text-muted">posted at {{ $location->created_at }}</span>
                </div>
                <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>施設</th>
                            <th>場所の詳細</th>
                        </tr>
                    </thead>
                        <tr>
                            <td>{{ $location->facility}}</td>
                            <td>{{ $location->place }}</td>
                        </tr>
                </table>
                </div>
                <div>
                    @if (Auth::id() == $location->user_id)
                        {!! Form::open(['route' => ['locations.destroy', $location->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $locations->links('pagination::bootstrap-4') }}