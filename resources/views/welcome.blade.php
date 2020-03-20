@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1>機能一覧</h1>
        {!! link_to_route('rescues.index', '救助要請掲示板', [], ['class' => 'btn btn-primary']) !!}
        {!! link_to_route('alerts.index', '注意喚起掲示板', [], ['class' => 'btn btn-primary']) !!}
        {!! link_to_route('locations.index', '重要施設の共有掲示板', [], ['class' => 'btn btn-primary']) !!}
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ようこそ災害掲示板へ</h1>
                {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                <!--{!! link_to_route('admin.register', '管理者会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}-->
                
            </div>
        </div>
    @endif
    
@endsection