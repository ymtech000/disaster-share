<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Alert;
use App\Alertcomment;
use Storage;
use App\Http\Requests\StoreAlert;
use App\User;

class AlertsController extends Controller
{
    // getでalerts/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $alerts = Alert::orderBy('created_at', 'desc')->paginate(9);
            
            $data = [
                'user' => $user,
                'alerts' => $alerts,
            ];
        }
        return view('alerts.index', $data);
      
    }
   
   // getでalerts/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $alert = new Alert;

        return view('alerts.create', [
            'alert' => $alert,
        ]);
    }
     
    // postでalerts/にアクセスされた場合の「新規登録処理」
    public function store(StoreAlert $request)
    {
        //画像ファイル受け取り処理
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
       
            $request->user()->alerts()->create([
                'content' => $request->content,
                'title' => $request->title,
                'area' => $request->area,
                'location' => $request->location,
                'time' => $now,
                'image' => $url,
                'lat' => $request->lat,
                'lng' => $request->lng,
            ]);
            return redirect('/alerts');
    }
    
    
   // getでalerts/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $alert = Alert::find($id);
        $user = \Auth::user();
        $alertcomments = Alertcomment::where('alert_id', $id)->orderBy('created_at', 'desc')->get();
        
        $data = [
            'alert' => $alert,
            'user' => $user,
            'alertcomments' => $alertcomments,
        ];

        return view('alerts.show', $data);
    }
    
    public function update(StoreAlert $request, $id)
    {
        //画像ファイル受け取り処理
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

        $alert = Alert::find($id);
        
        $alert->content = $request->content;
        $alert->title = $request->title;
        $alert->area = $request->area;
        $alert->location = $request->location;
        $alert->time = $now;
        $alert->image = $url;
        $alert->lat = $request->lat;
        $alert->lng = $request->lng;
        $alert->edit = $request->edit;
        
        $alert->save();
        
        return redirect('/alerts');
    }
    
    // getでalerts/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $alert = Alert::find($id);

        return view('alerts.edit', [
            'alert' => $alert,
        ]);
    }
    
    // deleteでalerts/idにアクセスされた場合の「削除処理」
     public function destroy($id)
    {
        $alert = \App\Alert::find($id);
        if (\Auth::id() === $alert->user_id) {
            $alert->delete();
        }
        
            return back();
        
    }
}
