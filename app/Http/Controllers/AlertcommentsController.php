<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alertcomment;
use App\Alert;
use App\User;

class AlertcommentsController extends Controller
{
    public function store(Request $request)
    {
        if($request->parent_id == null){
            $params = $request->validate([
                'alert_id' => 'required|exists:alerts,id',
                'comment' => 'required|max:140',
            ]);
        }
        else{
             $params = $request->validate([
                'alert_id' => 'required|exists:alerts,id',
                'parent_id' => 'required|exists:alertcomments,id',
                'comment' => 'required|max:140',
            ]);
        }
        
        //時間のセット
        date_default_timezone_set('Asia/Tokyo');
        $now = date("Y/m/d H:i");
        
        $request->user()->alertcomments()->create([
            'comment' => $request->comment,
            'alert_id' => $request->alert_id,
            'parent_id' => $request->parent_id,
            'time' => $now,
        ]);
        
        return redirect('/alerts');
    }
    
     public function show($id)
    {
        $alertcomment = Alertcomment::find($id);

        return view('alerts.comment_show', [
            'alertcomment' => $alertcomment,
            
        ]);
    }
    
    // deleteでalerts/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $alert = Alertcomment::find($id);
        $alert->delete();

        return redirect('/alerts');
    }
}

