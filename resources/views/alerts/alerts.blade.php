<div class="conteiner">
    <div class="card-group　mx-auto">
        <div id="lists" class="row">
            @if (count($alerts) > 0)
                <table class="table table-striped">
                    @foreach ($alerts as $alert)
                        <div class="card border-0 col-8 col-sm-6 col-md-4 post-cards">
                            @if($alert->user->image == null)
                                <div class="profile">
                                    <a href="/users/{{$alert->user->id}}"><img class="img-fluid float-left user-img" src="{{ Gravatar::src($alert->user->email, 500) }}" width="35" height="35" alt=""></a>
                                    <p>{{$alert->user->name}}</p>
                                </div>
                            @else
                                <div class="profile">
                                    <a href="/users/{{$alert->user->id}}"><img class="float-left user-img" src="{{$alert->user->image}}" width="35" height="35"></a>
                                    <p>{{$alert->user->name}}</p>
                                </div>
                            @endif
                            <a href="/alerts/{{$alert->id}}"><img src="{{$alert->image}}" width="270" height="270" class="img"></a>
                            <div>
                                <div class="col-md-4 title">{{$alert->title}}</div>
                                <div class="col-md-6 heart-button">
                                    @include('favorites.favorite_button', ['alert' => $alert])
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>
                {{ $alerts->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
</div>

<style>
    .media{
        float:left;
        padding-right:15px;
        padding-left:15px;
    }
    .user-img{
        border-radius:50%;
        margin-right:10px;
        margin-bottom:10px;
    }
</style>
            
            
      