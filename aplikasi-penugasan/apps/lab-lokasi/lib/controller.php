<?php

class lokasi {
    public function current_location(){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://ifconfig.io/ip"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 

        $uri = "http://www.geoplugin.net/php.gp?ip=$output" ;
        $geoIp = unserialize(file_get_contents($uri));

        $city = $geoIp['geoplugin_city'];
        $province = $geoIp['geoplugin_region'];
        $lat =  $geoIp['geoplugin_latitude'];
        $long = $geoIp['geoplugin_longitude'];
        return compact('city','province','lat','long');
    }
}

?>