<ul class="media-list">
    @foreach ($alerts as $alert)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($alert->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $alert->user->name, ['id' => $alert->user->id]) !!} <span class="text-muted">posted at {{ $alert->created_at }}</span>
                </div>
                <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>メッセージ</th>
                            <th>画像</th>
                            <th>エリア</th>
                            <th>場所の詳細</th>
                        </tr>
                    </thead>
                        <tr>
                            <td>{{ $alert->content }}</td>
                            <td><img src="{{$alert->image}}" width="150" height="150"></td>
                            <td>{{ $alert->area }}</td>
                            <td>{{ $alert->place }}</td>
                        </tr>
                </table>
                </div>
                <div>
                    @if (Auth::id() == $alert->user_id)
                        {!! Form::open(['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $alerts->links('pagination::bootstrap-4') }}

