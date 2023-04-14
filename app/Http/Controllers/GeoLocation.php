<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoLocation extends Controller
{
    public function index()
    {
        $host = request()->getHttpHost();
        $ip = ($host == "localhost") ? "103.117.154.18" : $this->getIp();
        $location_data = \Location::get($ip);
        return view('location', compact('location_data'));
    }

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }

    public function IpLookUp(Request $request){
        $host = request()->getHttpHost();
        $ip = ($host == "localhost") ? "103.117.154.18" : $this->getIp();
        $location_data = \Location::get($ip);
        return view('location-lookup', compact('location_data'));
    }
}
