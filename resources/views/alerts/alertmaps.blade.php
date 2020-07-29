<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Disaster-Share</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
            <a class="navbar-brand" href="/alerts">DISASTER SHARE</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item"><a href="{{route('users.index') }}" class ="nav-link"><span class="fa fa-users"></span>ユーザー</a></li>
                        <li class="nav-item"><a href="/post_searches" class ="nav-link"><span class="fa fa-search"></span>検索</a></li>
                        <li class="nav-item"><a href="{{route('alertmaps.index') }}" class ="nav-link"><span class="fa fa-map-marker-alt"></span>場所一覧</a></li>
                        <li class="nav-item"><a href="{{route('alerts.create') }}" class ="nav-link"><span class="fa fa-edit"></span>新規投稿</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">
                                     <a href="{{route('users.show', ['id' => Auth::id()]) }}" style="color:black;"><span class="fa fa-user"></span></a>
                                    {!! link_to_route('users.show', 'プロフィール', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">
                                    <a href="{{route('users.edit', ['id' => Auth::id()]) }}" style="color:black;"><span class="fa fa-tools"></span></a>
                                    {!! link_to_route('users.edit', '設定', ['id' => Auth::id()], ['class' => 'btn btn-default']) !!}
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">
                                    <a href="{{route('logout.get') }}" style="color:black;"><span class="fa fa-sign-out-alt"></span></a>
                                    {!! link_to_route('logout.get', 'ログアウト', '',['class' => 'btn btn-default']) !!}
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link"><span class="fa fa-sign-in-alt"></span>ログイン</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div id="map"></div>
        <style>
            #map {
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh;
            }
        </style>
        <script>
            var map;
            var marker = [];
            var markerData = [];
            var infoWindow = [];
            var maps = @json($maps);
            
            for (var i = 0; i < maps.length; i++){
                markerData.push({
                    id: Number(maps[i].id),
                    name: maps[i].content,
                    lat: Number(maps[i].lat),
                    lng: Number(maps[i].lng),
                });
            }
            
            function initMap(){
                // 地図の作成
                var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
                    map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
                        center: new google.maps.LatLng( 34.851732, 135.617728 ) , // 地図の中心を指定
                        zoom: 11 // 地図のズームを指定
                    });
                     
                // マーカー毎の処理
                for (var i = 0; i < maps.length; i++){
                    for (var i = 0; i < markerData.length; i++) {
                        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
                        marker[i] = new google.maps.Marker({ // マーカーの追加
                        position: markerLatLng, // マーカーを立てる位置を指定
                            map: map // マーカーを立てる地図を指定
                        });
                        infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
                            content:'<div class="map">'+'<a style="color:black;" href="/alerts/'+markerData[i]["id"]+'">' + markerData[i]['name'] +'</a>'+'</div>'  // 吹き出しに表示する内容
                        });
                        markerEvent(i); // マーカーにクリックイベントを追加
                    }
                }
            }
              
            // マーカーにクリックイベントを追加
            function markerEvent(i) {
                marker[i].addListener('click', function() { // マーカーをクリックしたとき
                  infoWindow[i].open(map, marker[i]); // 吹き出しの表示
              });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoKnN8__KItXFDswfAfs_y3VHwfbX3_ms&callback=initMap"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
