<div id="lists" class="row">
    @if (count($alerts) > 0)
        <table class="table table-striped">
            @foreach ($alerts as $alert)
                <div id="alert_card{{$alert->id}}" class="col-sm-4 alert_card">
                    <div class="card" style="border:solid; border-width:thin; margin-bottom:10px">
                        <div class="card-header" style="max-height:70px; border-bottom:solid; border-width:thin;">
                            @if($alert->user->image == null)
                                <a href="/users/{{$alert->user->id}}"><img class="img-fluid float-left user-img" style="border-radius:50%; margin-bottom:10px; margin-right:10px;" src="{{ Gravatar::src($alert->user->email) }}" width="35" height="35" alt=""></a>
                            @else
                                <a href="/users/{{$alert->user->id}}"><img src="{{$alert->user->image}}" class="img-fluid float-left user-img" style="border-radius:50%; margin-bottom:10px; margin-right:10px;" width="35" height="35"></a>
                            @endif
                            <div class="side">
                                <a href="/users/{{$alert->user->id}}" class="user_name" style="color:black;">{{$alert->user->name}}</a>
                                @if(Auth::id() == $alert->user_id)
                                    <a href="#" class="nav-link" data-toggle="dropdown" style="color:black"><span class="fas fa-chevron-down"></span></a>
                                    <ul class="dropdown-menu" style="list-style: none;">
                                        <li class="dropdown-item">
                                            <a href="{{ route('alerts.edit', [$alert->id]) }}"><span class="fa fa-edit" style="color:black;"></span></a>
                                            {!! link_to_route('alerts.edit', '編集', [$alert->id], ['class' => 'btn btn-default']) !!}
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="#" type="button" data-toggle="modal" data-target="#alert-delete{{$alert->id}}"><span class="fa fa-trash delete-btn" style="color:black;"></span></a>
                                            <a href="#" type="button" class="btn btn-default" data-toggle="modal" data-target="#alert-delete{{$alert->id}}">削除</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <small>
                                <ul class="edit" style="text-align:right; list-style:none;">
                                    <li>{{$alert->time}}</li>
                                    <li>{{$alert->edit}}</li>
                                </ul>
                            </small>
                        </div>
                        <div class="card-body">
                            <a href="alerts/{{$alert->id}}"><img src="{{$alert->image}}" style="width:100%;"></a>
                        </div>
                        <div class="card-footer" style="border-top:solid; border-width:thin;">
                            <div class="title" style="font-size:1.3em;　text-align:left;">{{$alert->title}}</div>
                            <div class="side">
                                <p>地区：{{$alert->area}}</p>
                                <ul class="icons">
                                    <li><span class="far fa-comment"></span></li>
                                    <li>{{count($alert->alertcomments)}}</li>
                                    <li>
                                        @include('favorites.favorite_button', ['alert'=>$alert])
                                    </li>
                                    <li id="favorite_count{{$alert->id}}">{{count($alert->favorited)}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
         
                <!--ボタン・リンククリック後に表示される画面の内容 -->
                <div class="modal fade" id="alert-delete{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">投稿削除確認画面</h4>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>
                            </div>
                            <div class="modal-body">
                                <label>本当に削除しますか？（この操作は取り消しできません。）</label>
                            </div>
                            <div class="modal-footer">
                                {!! Form::model($alert, ['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) !!}
                                    <input class="btn btn-danger" type="submit" value="削除">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </table>
    @endif
    {{ $alerts->links('pagination::bootstrap-4') }}
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{asset('/js/alerts_response.js')}}"></script>
<script src="{{ asset('/js/area_searches.js') }}"></script>
<link rel="stylesheet" href="{{asset('/css/alerts_posts.css')}}">