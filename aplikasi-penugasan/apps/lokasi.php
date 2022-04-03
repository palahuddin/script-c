<?php

// require_once("lib/controller.php");
// $cmd = new lokasi();
// $arr = $cmd->current_location();

// echo var_export($arr);

// $a = $arr['city'];
// $b = $arr['province'];
// $c = $arr['lat'];
// $d = $arr['long'];
// $e = $arr['ip'];

// echo "$a,$b,$c,$d,$e";

// $geoIP = array('geoplugin_request' => '36.88.156.181', 'geoplugin_status' => 200, 'geoplugin_delay' => '1ms', 'geoplugin_credit' => 'Some of the returned data includes GeoLite data created by MaxMind, available from http://www.maxmind.com.', 'geoplugin_city' => 'Depok', 'geoplugin_region' => 'West Java', 'geoplugin_regionCode' => 'JB', 'geoplugin_regionName' => 'West Java', 'geoplugin_areaCode' => '', 'geoplugin_dmaCode' => '', 'geoplugin_countryCode' => 'ID', 'geoplugin_countryName' => 'Indonesia', 'geoplugin_inEU' => 0, 'geoplugin_euVATrate' => false, 'geoplugin_continentCode' => 'AS', 'geoplugin_continentName' => 'Asia', 'geoplugin_latitude' => '-6.3457', 'geoplugin_longitude' => '106.5011', 'geoplugin_locationAccuracyRadius' => '50', 'geoplugin_timezone' => 'Asia/Jakarta', 'geoplugin_currencyCode' => 'IDR', 'geoplugin_currencySymbol' => 'Rp', 'geoplugin_currencySymbol_UTF8' => 'Rp', 'geoplugin_currencyConverter' => '14352.3');

$geoIP = array ( 'city' => array ( 'geoname_id' => 1642911, 'names' => array ( 'de' => 'Jakarta', 'en' => 'Jakarta', 'es' => 'Yakarta', 'fr' => 'Jakarta', 'ja' => 'ジャカルタ', 'pt-BR' => 'Jakarta', 'ru' => 'Джакарта', 'zh-CN' => '雅加达', ), ), 'continent' => array ( 'code' => 'AS', 'geoname_id' => 6255147, 'names' => array ( 'de' => 'Asien', 'en' => 'Asia', 'es' => 'Asia', 'fr' => 'Asie', 'ja' => 'アジア', 'pt-BR' => 'Ásia', 'ru' => 'Азия', 'zh-CN' => '亚洲', ), ), 'country' => array ( 'geoname_id' => 1643084, 'iso_code' => 'ID', 'names' => array ( 'de' => 'Indonesien', 'en' => 'Indonesia', 'es' => 'Indonesia', 'fr' => 'Indonésie', 'ja' => 'インドネシア共和国', 'pt-BR' => 'Indonésia', 'ru' => 'Индонезия', 'zh-CN' => '印度尼西亚', ), ), 'location' => array ( 'accuracy_radius' => 50, 'latitude' => -6.1741, 'longitude' => 106.8296, 'time_zone' => 'Asia/Jakarta', ), 'registered_country' => array ( 'geoname_id' => 1643084, 'iso_code' => 'ID', 'names' => array ( 'de' => 'Indonesien', 'en' => 'Indonesia', 'es' => 'Indonesia', 'fr' => 'Indonésie', 'ja' => 'インドネシア共和国', 'pt-BR' => 'Indonésia', 'ru' => 'Индонезия', 'zh-CN' => '印度尼西亚', ), ), 'subdivisions' => array ( 0 => array ( 'geoname_id' => 1642907, 'iso_code' => 'JK', 'names' => array ( 'en' => 'Jakarta', ), ), ), );
$city = $geoIP['city']['names']['en'];
$region = $geoIP['subdivisions'][0]['names']['en'];
$lat = $geoIP['location']['latitude'];
$long = $geoIP['location']['longitude'];

echo "Your Check-In Location = $city, $region";?>
<br/>
<?php echo "Koordinat = $lat , $long"; ?>




