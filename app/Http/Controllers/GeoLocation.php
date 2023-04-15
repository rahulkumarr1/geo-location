<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class GeoLocation extends Controller
{
    public function index()
    {
        $host = request()->getHttpHost();
        $ip = ($host == "localhost") ? "122.176.197.95" : $this->getIp();
        $location_data = Location::get($ip);
        dd($location_data);
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

    public function IpLookUp(Request $request)
    {

        if ($request->ajax()) {
            $request->validate([
                'ip_addr' => 'required|ip',
              ]);
            $host = request()->getHttpHost();
            $ip = $request->ip_addr;
            $location_data = \Location::get($ip);
            return view('location-lookup-result', compact('location_data'));
        }
        return view('location-lookup');
    }
}
