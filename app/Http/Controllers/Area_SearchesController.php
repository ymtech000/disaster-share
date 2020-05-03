<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alert;

class Area_SearchesController extends Controller
{
    public function index(Request $request){
        //投稿を1ページにつき10件ずつ表示
        $query = Alert::query();
        $datas = $query->paginate(10);
        if (\Auth::check()) {
            $searches = $request->input('search');
            // 検索ワード入力フォームで入力した文字列を含むカラムを取得
            if ($request->has('search') && $searches != '') {
                $datas = $query->where('area', 'like', '%'.$searches.'%')->get();
            }   
            return view('area_searches.index',[
                'datas' => $datas
            ]);
        }
    }
}