var map;
var marker = [];
var map = @json($alert);
var markerData = [
      {  name: map.content,
        lat: Number(map.lat),
        lng: Number(map.lng)
      }
    ];
var infoWindow = [];

function initMap(){
 // 地図の作成
        var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
            map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
                center: mapLatLng, // 地図の中心を指定
                zoom: 10 // 地図のズームを指定
            });
         
    // マーカー毎の処理
        for (var i = 0; i < markerData.length; i++) {
            markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
            marker[i] = new google.maps.Marker({ // マーカーの追加
            position: markerLatLng, // マーカーを立てる位置を指定
                map: map // マーカーを立てる地図を指定
            });
            infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
                content: '<div class="map">' + markerData[i]['name'] + '</div>' // 吹き出しに表示する内容
            });
        }
}