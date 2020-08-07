var map;
const markerData = $('#js-getVariable').data();

function initMap(){
// 地図の作成
var mapLatLng = new google.maps.LatLng({lat: Number(markerData['name'].lat), lng: Number(markerData['name'].lng)}); // 緯度経度のデータ作成
    map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: 10 // 地図のズームを指定
    });
     
// マーカー毎の処理
    markerLatLng = new google.maps.LatLng({lat: Number(markerData['name'].lat), lng: Number(markerData['name'].lng)}); // 緯度経度のデータ作成
    marker = new google.maps.Marker({ // マーカーの追加
    position: markerLatLng, // マーカーを立てる位置を指定
        map: map // マーカーを立てる地図を指定
    });
}