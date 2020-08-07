$(function() {
        $('input[type=file]');
        // アップロードするファイルを選択
        $('input[type=file]').change(function() {
            var file = $(this).prop('files')[0];
            
            // 画像以外は処理を停止
            if (! file.type.match('image.*')) {
                // クリア
                $(this).val('');
                $('#fileimg').html('');
                return;
            }
            // 画像表示
            var reader = new FileReader();
            reader.onload = function() {
                var img_src = $('<img class="file_image">').attr('src', reader.result);
                $('#fileimg').html(img_src);
            };
            reader.readAsDataURL(file);
        });
    });