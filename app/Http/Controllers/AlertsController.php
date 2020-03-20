<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert;

class AlertsController extends Controller
{
    // getでalerts/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $alerts = Alert::orderBy('created_at', 'desc')->paginate(10);
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
    
        //画像ファイル受け取り処理
        $filename='';
        if ($request->file('thefile')->isValid([])) {
            $filename = $request->file('thefile')->store('img');
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
            $request->user()->alerts()->create([
                'content' => $request->content,
                'area' => $request->area,
                'place' => $request->place,
                'time' => $now,
                'image' => $filename,
                'lat' => $lat,
                'lng' => $lng,
            ]);
            return redirect('/alerts');
        }
        
    }
    
   // getでalerts/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $alert = Alert::find($id);

        return view('alerts.show', [
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
        if(url()->previous() == "/users/{user}"){
            return redirect('/alerts');
        }
        else{
            return back();
        }
    }
}
