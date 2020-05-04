@extends('layouts.app')

@section('content')
<div id="map"></div>
<style>
#map {
    width: 700px;
    height: 400px;
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
                content:　'<div class="map">' + markerData[i]['name'] + '</div>'  // 吹き出しに表示する内容
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

{!! link_to_route('alerts.index', '戻る', [], ['class' => 'btn btn-primary']) !!}
@endsection