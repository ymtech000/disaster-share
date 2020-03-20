@extends('layouts.app')

@section('content')
<div id="map"></div>
<style>
#map {
    width: 700px;
    height: 400px;
}
#markers {
    float:right;
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
        name: maps[i].content,
        lat: Number(maps[i].lat),
        lng: Number(maps[i].lng)
    });
}

console.log(markerData);


function initMap(){
 // 地図の作成
    var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
    map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: 10 // 地図のズームを指定
    });
    
    // マーカー毎の処理
    for (var i = 0; i < maps.length; i++){
        for (var i = 0; i < markerData.length; i++) {
            markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
            if (maps[i].facility == "ガソリンスタンド") {
              iconUrl = 'https://maps.google.com/mapfiles/ms/icons/green-dot.png';
            } else if(maps[i].facility == "給水所"){ 
              iconUrl = 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png';
            }
            else{
                iconUrl = "https://maps.google.com/mapfiles/ms/icons/red-dot.png";
            }
            marker[i] = new google.maps.Marker({ // マーカーの追加
            position: markerLatLng, // マーカーを立てる位置を指定
                map: map, // マーカーを立てる地図を指定
                icon: {
                    url: iconUrl,
                    scaledSize: new google.maps.Size(40, 40)
                },
            });
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
<ul style="list-style: none;" id="markers">
    <li>
        <p>ガソリンスタンド</p>
        <img src="https://maps.google.com/mapfiles/ms/icons/green-dot.png" width="45" height="45">
    </li>
    <li>
        <p>給水所</p>
        <img src="https://maps.google.com/mapfiles/ms/icons/blue-dot.png" width="45" height="45">
    </li>
    <li>
        <p>避難所</p>
        <img src="https://maps.google.com/mapfiles/ms/icons/red-dot.png" width="45" height="45">
    </li>
</ul>

{!! link_to_route('locations.index', '戻る', [], ['class' => 'btn btn-primary']) !!}
@endsection


