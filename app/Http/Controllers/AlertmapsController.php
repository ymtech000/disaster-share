<?php

namespace App\Http\Controllers;
use App\Alert;

use Illuminate\Http\Request;

class AlertmapsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
                $alerts = Alert::orderBy('created_at', 'desc')->get();
                
                $data = [
                    'user' => $user,
                    'maps' => $alerts,
                ];
                
                return view('alerts.alertmaps', $data);
        }
    }
}