@extends('layouts.app')

@section('content')
<h1 class="text-center font-weight-bold font-family-Tahoma">USERS LIST</h1>
    <body class="d-flex flex-column" style="min-height: 100vh">
        <ul class="list-unstyled">
            <div class="conteiner">
                <div class="card-group　mx-auto">
                    @include('users.users' , ['users' => $users])
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
    .user-img{
        border-radius:10px;
    }
</style>