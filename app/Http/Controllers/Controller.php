<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function counts($user) {
        $count_alerts = $user->alerts()->count();
        $count_rescues = $user->rescues()->count();
        $count_locations = $user->locations()->count();
        return [
            'count_alerts' => $count_alerts,
            'count_rescues' => $count_rescues,
            'count_locations' => $count_locations,
        ];
       
    }
    
    public function getLocation($jump_location){
        $jump_location = urlencode($jump_location);
        $myKey = "AIzaSyDb06pxNwF1MLlR0iAJUDjMCHxnPO4BsRY";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $jump_location . "+CA&key=" . $myKey ;
        $contents= file_get_contents($url);
        $jsonData = json_decode($contents,true);
        
        if(count($jsonData["results"])>0){
            return $jsonData["results"][0]["geometry"]["location"];
        }
        else{
            return null;
        }
    }
}
