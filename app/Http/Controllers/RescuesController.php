<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rescue;
use App\Rescuecomment;
use Storage;


class RescuesController extends Controller
{
    // getでrescues/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
                $rescues = Rescue::orderBy('created_at', 'desc')->paginate(10);
                $data = [
                    'user' => $user,
                    'rescues' => $rescues,
                ];
            }
        return view('rescues.index', $data);
    }

   
   // getでrescues/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $rescue = new Rescue;

        return view('rescues.create', [
            'rescue' => $rescue,
        ]);
    }
     
    // postでrescues/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140',
            'place' => 'required|max:50',
            'area' => 'required',
            'thefile' => [
               'required',
               'file',
               'image',
               'mimes:jpeg,png',
            ]
        ]);
    
        $filename='';
        if ($request->file('thefile')->isValid([])) {
            $filename = $request->file('thefile')->store('img');
            
            //s3アップロード開始
            $image = $request->file('thefile');
            // バケットの`pogtor528`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('pogtor528', $image, 'public');
            // アップロードした画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        }
            
        
        //時間のセット
        date_default_timezone_set('Asia/Tokyo');
        $now = date("Y/m/d H:i");
        
        $location = $this->getLocation($request->place);
        
        if($location == null){
            return back()->with('error', '指定された場所が存在しません。');
        }
        else{
        $lat = $location['lat']; // latを取得
        $lng = $location['lng']; // lngを取得
        
        $request->user()->rescues()->create([
            'content' => $request->content,
            'area' => $request->area,
            'place' => $request->place,
            'time' => $now,
            'image' => $url,
            'lat' => $lat,
            'lng' => $lng,
        ]);
        
        return redirect('/rescues');
        }
    }
    
   
     
   // getでrescues/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $rescue = Rescue::find($id);

        return view('rescues.show', [
            'rescue' => $rescue,
        ]);
    }
    
    // deleteでrescues/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $rescue = \App\Rescue::find($id);
        if (\Auth::id() === $rescue->user_id) {
            $rescue->delete();
        }
        
            return redirect('/rescues');
    }
}
