@extends('layouts.app')

@section('content')

    <h1 class="text-center font-weight-bold font-family-Tahoma">EDIT</h1>
    @include('commons.error_messages')
    {!! Form::model($alert, ['route' => ['alerts.update', $alert->id], 'method' => 'put', 'files' => true]) !!}
                {!! Form::label('thefile', '画像') !!}
            <label>
                <span class="fa fa-file-image" style="cursor: pointer"></span>
                <input type="file" style="display:none" name="thefile">
            </label>
        <div class='form-row'>
            <div class='col-md-7'>
                {!! Form::label('title', 'タイトル(15字以内):') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                {!! Form::label('content', 'メッセージ(140字以内):') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                <p class="submit">{!! Form::button('投稿', ['class' => 'btn btn-primary', 'onclick' => 'submit();']) !!}</p> 
            </div>
            <div class='col-md-5'>
                {!! Form::label('area', 'エリア') !!}
                @include('commons.area')
                {!! Form::label('location', '場所') !!}
                {!! Form::text('location', null, ['class' => 'form-control']) !!}
                <div class="search">
                    <input id="place" placeholder="検索">
                    <div id="myBtn" onclick="search()"></div>
                </div>
                <div id="map"></div>
                <input type="hidden" name='lat' id='lat' class="form-control">
                <input type="hidden" name='lng' id='lng' class="form-control">
            </div>
            <div>
                @if (\Session::has('error'))
                    <div class="alert alert-error" id="error">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
            </div>
        </div>
        {!! Form::close() !!}

    <script type="text/javascript">
        var map;
        var marker;
        
        function initialize() {
            // 地図を表示する際のオプションを設定
            var mapOptions = {
                center: new google.maps.LatLng( 34.851732, 135.617728 ),
                zoom: 16,
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
        
    </script>
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoKnN8__KItXFDswfAfs_y3VHwfbX3_ms"></script>

@endsection

<style>
    #error {
        color: red;
    }
    
    .file_upload {
        border: 3px solid;
        display: inline-block;
        padding: 2px 1em;
        position: relative;
       
    }
    .form-group {
        display:inline-block;
    }
    .submit{
        margin-top:25px;
    }
    .fa-file-image{
       font-size:100px;
    }
    #map { 
        height: 250px
    }
    .search{
        padding-top:20px;
    }
</style>