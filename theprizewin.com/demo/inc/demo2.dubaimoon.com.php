<?php
if($bodystyle=='Hatchback')$bodystyle1='441';
elseif($bodystyle=='Coupe')$bodystyle1='444';
elseif($bodystyle=='Van Minibus')$bodystyle1='449';
else $bodystyle1='';

if($region=='Dubai')$region1='20';
elseif($region=='Abu Dhabi')$region1='19';
elseif($region=='Sharjah')$region1='21';
elseif($region=='Ras Al Khaimah')$region1='24';
elseif($region=='Ajman')$region1='22';
elseif($region=='Al Ain')$region1='157';
elseif($region=='Fujairah')$region1='25';
elseif($region=='Umm al-Quwain')$region1='23';
else $region1='';


$url="http://www.demo2.dubaimoon.com/cars-parts/cars-for-sale/$mark/$model/page/$page/?country=205&city=$region1&body_type=$bodystyle1&pricex=$Price_from&pricey=$Price_to&kilometers=$mileage_high";

$ch = curl_init(); 
$userAgent='Mozilla/5.0 (Windows NT 6.1; rv:10.0.2) Gecko/20100101 Firefox/10.0.2'; 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$as=curl_exec($ch); 
curl_close($ch); 
set_time_limit(0);

preg_match_all('/<div class="car_listing marginbottom10 normal_bg pos-rel">(.+?)<div class="car_listing marginbottom10 normal_bg pos-rel">/is', $as, $k);

foreach($k[0] as $b) {
	//$b=preg_replace('/style="(.+?)"/', "", $b);
	$b=preg_replace('/href/', 'target="_blank" href', $b);
	echo $b;
}
?>