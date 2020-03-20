<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alert;

class Searches2Controller extends Controller
{
    public function index(Request $request){
        //投稿を1ページにつき10件ずつ表示
        $query = Alert::query();
        $datas = $query->paginate(10);
        if (\Auth::check()) {
            $searches = $request->input('search');
            // 検索ワード入力フォームで入力した文字列を含むカラムを取得
            if ($request->has('search') && $searches != '') {
                $datas = $query->where('content', 'like', '%'.$searches.'%')->orWhere('area', 'like', '%'.$searches.'%')->orWhere('place', 'like', '%'.$searches.'%')->get();
            }   
            return view('searches2.index',[
                'datas' => $datas
            ]);
        }
    }
}

