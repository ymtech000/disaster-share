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
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $count_favorites = $user->favorites()->count();
        return [
            'count_alerts' => $count_alerts,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_favorites' => $count_favorites,
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
