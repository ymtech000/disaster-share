<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rescuecomment;
use App\Rescue;
use App\User;

class RescuecommentsController extends Controller
{
    public function store(Request $request)
    {
        if($request->parent_id == null){
            $params = $request->validate([
                'rescue_id' => 'required|exists:rescues,id',
                'comment' => 'required|max:140',
            ]);
        }
        else{
             $params = $request->validate([
                'rescue_id' => 'required|exists:rescues,id',
                'parent_id' => 'required|exists:rescuecomments,id',
                'comment' => 'required|max:140',
            ]);
        }
        
        //時間のセット
        date_default_timezone_set('Asia/Tokyo');
        $now = date("Y/m/d H:i");
        
        $request->user()->rescuecomments()->create([
            'comment' => $request->comment,
            'rescue_id' => $request->rescue_id,
            'parent_id' => $request->parent_id,
            'time' => $now,
        ]);

        // return redirect(route('rescues.index'));
        return redirect('/rescues');
    }
    
     public function show($id)
    {
        $rescuecomment = Rescuecomment::find($id);
        // $childcomment = new Rescuecomment;

        return view('rescues.comment_show', [
            'rescuecomment' => $rescuecomment,
            
        ]);
    }
    
    // deleteでrescues/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $rescue = Rescuecomment::find($id);
        $rescue->delete();

        return redirect('/rescues');
    }
}

