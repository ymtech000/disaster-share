<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationmapsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
                $locations = Location::orderBy('created_at', 'desc')->get();
                $data = [
                    'user' => $user,
                    'maps' => $locations,
                ];
                return view('locations.locationmaps', $data);
        }
    }
}
