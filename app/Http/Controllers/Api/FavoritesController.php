<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Request $request)
    {
        \Auth::user()->favorite($request->id);
        return back();
    }

    public function destroy(Request $request)
    {
        \Auth::user()->unfavorite($request->id);
        return back();
    }
}