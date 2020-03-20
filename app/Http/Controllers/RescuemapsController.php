<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rescue;

class RescuemapsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
                $rescues = Rescue::orderBy('created_at', 'desc')->get();
                $data = [
                    'user' => $user,
                    'maps' => $rescues,
                ];
                return view('rescues.rescuemaps', $data);
        }
    }
}
