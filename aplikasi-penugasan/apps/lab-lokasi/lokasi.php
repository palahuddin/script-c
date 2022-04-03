<?php

require_once("lib/controller.php");
$cmd = new lokasi();
$arr = $cmd->current_location();

$a = $arr['city'];
$b = $arr['province'];
$c = $arr['lat'];
$d = $arr['long'];

echo "$a,$b,$c,$d";

// $geo = array('geoplugin_request' => '36.88.156.181', 'geoplugin_status' => 200, 'geoplugin_delay' => '1ms', 'geoplugin_credit' => 'Some of the returned data includes GeoLite data created by MaxMind, available from http://www.maxmind.com.', 'geoplugin_city' => 'Depok', 'geoplugin_region' => 'West Java', 'geoplugin_regionCode' => 'JB', 'geoplugin_regionName' => 'West Java', 'geoplugin_areaCode' => '', 'geoplugin_dmaCode' => '', 'geoplugin_countryCode' => 'ID', 'geoplugin_countryName' => 'Indonesia', 'geoplugin_inEU' => 0, 'geoplugin_euVATrate' => false, 'geoplugin_continentCode' => 'AS', 'geoplugin_continentName' => 'Asia', 'geoplugin_latitude' => '-6.3457', 'geoplugin_longitude' => '106.5011', 'geoplugin_locationAccuracyRadius' => '50', 'geoplugin_timezone' => 'Asia/Jakarta', 'geoplugin_currencyCode' => 'IDR', 'geoplugin_currencySymbol' => 'Rp', 'geoplugin_currencySymbol_UTF8' => 'Rp', 'geoplugin_currencyConverter' => '14352.3');

?>



