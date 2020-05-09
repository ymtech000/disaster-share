<div class="card">
    <div class="card-header">
        <h4 class="card-title head">{{ $user->name }}</h4>
        @if(Auth::user()->id == $user->id)
        <a href="#" class="nav-link" data-toggle="dropdown"><span class="fa fa-ellipsis-h"></span></a>
        <ul class="dropdown-menu" style="list-style: none;">
            <li class="dropdown-item">
                <span class="fa fa-tools" style="cursor:pointer"></span>
                {!! link_to_route('users.edit', '設定', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
            </li>
            <li class="dropdown-item">
                <span class="fa fa-sign-out-alt" style="cursor:pointer"></span>
                {!! link_to_route('logout.get', 'ログアウト', '',['class' => 'btn btn-default']) !!}
            </li>
            <li class="dropdown-item">
                <span class="fa fa-hand-paper" style="cursor:pointer"></span>
                <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#withdrawal">退会</a>
            </li>
        </ul>
        
        <!-- ボタン・リンククリック後に表示される画面の内容 -->
        <div class="modal fade" id="withdrawal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><class="modal-title" id="myModalLabel">アカウント削除確認画面</h4></h4>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                    </div>
                    <div class="modal-body">
                        <label>本当に退会しますか？（この操作は取り消しできません。）</label>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => ['users.destroy', Auth::id()], 'method' => 'delete']) !!}
                        {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    <div class="card-body">
        @if($user->image == null)
            <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
        @else
            <img class="rounded img-fluid" src="{{$user->image}}">
        @endif
    </div>
    @include('user_follow.follow_button', ['user' => $user])
</div>
<style>
    .head{
        display:inline;
    }
    .card{
        height:250px;
        width:250px;
        
    }
    .img-fluid{
        height:150px;
        width:150px;
    }
    a{
        color:black;
    }
    li{
        display:inline-block;
    }
</style>
    
        