<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    public function store(Request $request)
    {
        \Auth::user()->follow($request->id);
        return response()->json([
          'status' => 'success'
        ]);
    }

    public function destroy(Request $request)
    {
        \Auth::user()->unfollow($request->id);
        return response()->json([
          'status' => 'success'
        ]);
    }
}
