@extends('layouts.app')

@section('content')

    <h1>重要施設の投稿</h1>

    @if (count($locations) > 0)
        
            <section>
                <h2>給水所</h2>
                <table class="table table-striped">
                @foreach ($locations as $location)
                    @if($location->facility == '給水所')
                    <thead>
                        <tr>
                            <th>投稿者</th>
                            <th>No.</th>
                            <th>場所の詳細</th>
                        </tr>
                        <tr>
                            <td>{{ $location->user->name }}</td>
                            <td>{!! link_to_route('locations.show', $location->id, ['id' => $location->id]) !!}</td>
                            <td>{{ $location->place }}</td>
                        </tr>
                    </thead>
                @endif
                @endforeach
                </table>
            </section>
            <section>
                <h2>ガソリンスタンド</h2>
                <table class="table table-striped">
                @foreach ($locations as $location)
                    @if($location->facility == 'ガソリンスタンド')
                        <thead>
                            <tr>
                                <th>投稿者</th>
                                <th>No.</th>
                                <th>場所の詳細</th>
                            </tr>
                            <tr>
                                <td>{{ $location->user->name }}</td>
                                <td>{!! link_to_route('locations.show', $location->id, ['id' => $location->id]) !!}</td>
                                <td>{{ $location->place }}</td>
                            </tr>
                        </thead>
                    @endif
                @endforeach
                </table>
            </section>
            <section>
                <h2>避難所</h2>
                <table class="table table-striped">
                @foreach ($locations as $location)
                    @if($location->facility == '避難所')
                        <thead>
                            <tr>
                                <th>投稿者</th>
                                <th>No.</th>
                                <th>場所の詳細</th>
                            </tr>
                            <tr>
                                <td>{{ $location->user->name }}</td>
                                <td>{!! link_to_route('locations.show', $location->id, ['id' => $location->id]) !!}</td>
                                <td>{{ $location->place }}</td>
                            </tr>
                        </thead>
                    @endif
                @endforeach
                </table>
            </section>
        {!! link_to_route('locationmaps.index', '地図', [], ['class' => 'btn btn-primary']) !!}
    @endif
    
    {!! link_to_route('locations.create', '重要施設の共有の投稿', [], ['class' => 'btn btn-primary']) !!}
    
@endsection