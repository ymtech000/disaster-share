<?php
namespace App\Http\Controllers;

use Storage; 

class FlySystemS3Controller extends Controller
{
  public function index()
  {
    $disk = Storage::disk('s3'); 

    $public_path = '/path/to/project_root/public/';
    $img_path = sprintf('%s%s', $public_path, 'test.jpg');
    $contents = file_get_contents($img_path);

    // S3 にファイルをアップロード（パスはバケットディレクトリを起点として相対パスで記述）
    $disk->put('test/test.jpg', $contents, 'public'); 

    // S3の完全URLを得る
    $url = $disk->url('test/test.jpg'); 
    // $url → https://s3-REGION.amazonaws.com/BUCKET_NAME/test/test.jpg みたいな完全URLが返る

    // S3上に指定ファイルが存在するか確認
    if($disk->exists('test/test.jpg')) { 
      echo'<pre>'; echo 'exists'; echo'</pre>';
    } 
    else {
      echo'<pre>'; echo 'NONE'; echo'</pre>';
    }

    // ファイル取得はget()
    $contents = $disk->get('test/test.jpg'); 

   $put_path = sprintf('%s%s', $public_path, 'test_put.jpg');
 // サーバに保存（ダウンロード）
   file_put_contents($put_path, $contents);

  }
}