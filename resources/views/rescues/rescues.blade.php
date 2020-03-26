<ul class="media-list">
    @foreach ($rescues as $rescue)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($rescue->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $rescue->user->name, ['id' => $rescue->user->id]) !!} <span class="text-muted">posted at {{ $rescue->created_at }}</span>
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
                            <td>{{ $rescue->content }}</td>
                            <td><img src="{{$rescue->image}}" width="150" height="150"></td>
                            <td>{{ $rescue->area }}</td>
                            <td>{{ $rescue->place }}</td>
                        </tr>
                    
                </table>
                </div>
                <div>
                    @if (Auth::id() == $rescue->user_id)
                        {!! Form::open(['route' => ['rescues.destroy', $rescue->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $rescues->links('pagination::bootstrap-4') }}