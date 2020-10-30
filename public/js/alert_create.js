var map;
var marker;
function initialize() {
    // 地図を表示する際のオプションを設定
    var mapOptions = {
        center: new google.maps.LatLng( 35.6809591, 139.7673068 ),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
  // Mapオブジェクトに地図表示要素情報とオプション情報を渡し、インスタンス生成
  　map = new google.maps.Map(document.getElementById("map"), mapOptions);
      
    // クリックイベントを追加
    map.addListener('click', function(e) {
        getClickLatLng(e.latLng, map);
    });
}

function getClickLatLng(mark, map) {
    if(marker){
        doClose();
    }
    
    // 座標を表示
    document.getElementById('lat').value = mark.lat();
    document.getElementById('lng').value = mark.lng();
    
    // マーカーを設置
    marker = new google.maps.Marker({
        position: mark,
        map: map
    });
   
    // 座標の中心をずらす
    map.panTo(mark);
}

function doClose() {
    marker.setMap(null);
}

place.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("myBtn").click();
    }
    return false;
});

function search(){
    if(marker){
        doClose();
    }

    var place = document.getElementById('place').value;
    
    var geocoder = new google.maps.Geocoder();
    // ジオコーディング　検索実行
    geocoder.geocode({"address" : place}, function(results, status) {
        
        if (status == google.maps.GeocoderStatus.OK) {
            var lat = results[0].geometry.location.lat();//緯度を取得
            var lng = results[0].geometry.location.lng();//経度を取得
            var mark = {
                lat: lat, // 緯度
                lng: lng // 経度
            };
        
             // 座標を表示
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        
           marker = new google.maps.Marker({ // マーカーの追加
                position: mark, // マーカーを立てる位置を指定
                map: map // マーカーを立てる地図を指定
            });
            
            map.setCenter(results[0].geometry.location); // 地図の中心を移動
            cnt = 0;
        }
        
    });
}
window.onload = initialize; 
