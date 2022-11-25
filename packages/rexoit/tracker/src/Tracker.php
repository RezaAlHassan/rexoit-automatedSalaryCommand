<?php

namespace Rexoit\Tracker;
use App\Models\Activity;

class Tracker
{
   /* public function greet(String $sName)
    {
        return 'Hi ' . $sName . '! How are you doing today?';
    } 
    */
    public function geoLocate(){
        
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $latitude = $geo["geoplugin_latitude"];
        $longitude = $geo["geoplugin_longitude"];
        $activity_data = new Activity;
        $activity_data->latitude=$latitude;
        $activity_data->longitude=$longitude;
        $activity_data->save();
        
        //return 'Loc ' . $latitude . " " .$longitude;

        
}}