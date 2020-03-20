@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <h2>注意喚起掲示板</h2>
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::
                is('users/' . $user->id) ? 'active' : '' }}"> TimeLine <span class="badge badge-secondary">{{ $count_alerts }}</span></a></li>
            </ul>
            @if (count($alerts) > 0)
                @include('alerts.alerts', ['alerts' => $alerts])
            @endif
            <h2>救助要請掲示板</h2>
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::
                is('users/' . $user->id) ? 'active' : '' }}">TimeLine <span class="badge badge-secondary">{{ $count_rescues }}</span></a></li>
            </ul>
            @if (count($rescues) > 0)
                @include('rescues.rescues', ['rescues' => $rescues])
            @endif
            <h2>重要施設の共有掲示板</h2>
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::
                is('users/' . $user->id) ? 'active' : '' }}">TimeLine <span class="badge badge-secondary">{{ $count_locations }}</span></a></li>
            </ul>
            @if (count($locations) > 0)
                @include('locations.locations', ['locations' => $locations])
            @endif
        </div>
    </div>
@endsection