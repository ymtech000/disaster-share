<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationsController extends Controller
{
    // getでlocations/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $locations = Location::all();
        //dd($locations); //追加
        return view('locations.index', [
            'locations' => $locations,
        ]);
    }

   
   // getでlocations/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $location = new Location;

        return view('locations.create', [
            'location' => $location,
        ]);
    }
     
    // postでlocations/にアクセスされた場合の「新規登録処理」
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
        
        $location = new Location;
        $location->content = $request->content;
        $location->area = $request->area;
        $location->place = $request->place;
        $location->time = $now;
        $location->image = $filename;
        $location->save();
    
        
        return redirect('/');
    }
    
   
     
   // getでlocations/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $location = Location::find($id);

        return view('locations.show', [
            'location' => $location,
        ]);
    }

    
     // getでlocations/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $location = Location::find($id);

        return view('locations.edit', [
            'location' => $location,
        ]);
    }

  
     
   // putまたはpatchs/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
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
        
        //$location = new Location::find($id);
        $location = Location::find($id);
        $location->content = $request->content;
        $location->area = $request->area;
        $location->place = $request->place;
        $location->time = $now;
        $location->image = $filename;
        $location->save();
        
        return redirect('/');
    }
    
    
    // deleteでlocations/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return redirect('/');
    }
}
