<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $locations = Location::orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'locations' => $locations,
            ];
        }
        return view('locations.index', $data);
      
    }
    
    public function create()
    {
        $location = new Location;

        return view('locations.create', [
            'location' => $location,
        ]);
    }
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'place' => 'required|max:50',
            'facility' => 'required',
        ]);
        
        $location = $this->getLocation($request->place);
        
        if($location == null){
            return back()->with('error', '指定された場所が存在しません。');
        }
        else{
            $lat = $location['lat']; // latを取得
            $lng = $location['lng']; // lngを取得
            $request->user()->locations()->create([
                'facility'=> $request->facility,
                'place' => $request->place,
                'lat' => $lat,
                'lng' => $lng,
            ]);
            
            return redirect('/locations');
        }
    }
    
     public function show($id)
    {
        $location = Location::find($id);

        return view('locations.show', [
            'location' => $location,
        ]);
    }
    
    public function destroy($id)
    {
        $location = \App\Location::find($id);
        if (\Auth::id() === $location->user_id) {
            $location->delete();
        }
        if(url()->previous() == "/users/{user}"){
            return redirect('/locations');
        }
        else{
            return back();
        }
    }
}
