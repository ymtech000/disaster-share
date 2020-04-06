@extends('layouts.app')

@section('content')
<h1 class="text-center font-weight-bold font-family-Tahoma">USERS LIST</h1>
    <body class="d-flex flex-column" style="min-height: 100vh">
        <ul class="list-unstyled">
            <div class="conteiner">
                <div class="card-group　mx-auto">
                    <div id="user_list" class="row">
                        @foreach ($users as $user)
                            <div class="card border-0 col-sm-6 col-md-4 col-xl-3 d-none d-sm-block post-cards" style="width: 100px">
                                <div class="card-body">
                                    <a href="/users/{{$user->id}}"><img class="avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="200" height="200" /></a>
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="card border-0 col-12 d-block d-sm-none">
                                <div class="card-body">
                                    <div class="card">
                                        <img class="avatar-type-circle" src="{{ Gravatar::src($user->email, 50) }}" alt="" width="30" height="30" />
                                    </div>
                                    <a class="text-dark" href="/users/9">guest</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </ul>
    </body>
    {{ $users->links('pagination::bootstrap-4') }}
@endsection
<style>
    h1{
        text-align:center;
    }
    .avatar-type-circle{
        border-radius:10px;
    }
</style>