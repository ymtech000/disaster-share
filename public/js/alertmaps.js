var map;
var marker = [];
var markerData = [];
var infoWindow = [];
const datas = $('#js-getVariable').data();
console.log(datas['name']);
for (var i = 0; i < datas['name'].length; i++){
    markerData.push({
        id: Number(datas['name'][i].id),
        name: datas['name'][i].content,
        lat: Number(datas['name'][i].lat),
        lng: Number(datas['name'][i].lng),
    });
}

function initMap(){
    // 地図の作成
    var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
        map = new google.maps.Map(document.getElementById('map'), { // #mapに地図を埋め込む
            center: new google.maps.LatLng( 34.7024, 135.4959 ) , // 地図の中心を指定
            zoom: 10 // 地図のズームを指定
        });
         
    // マーカー毎の処理
    for (var i = 0; i < datas['name'].length; i++){
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