<?php
if($region=='Dubai')$region1='dubai';
elseif($region=='Abu Dhabi')$region1='abudhabi';
elseif($region=='Sharjah')$region1='sharjah';
elseif($region=='Ras Al Khaimah')$region1='rak';
elseif($region=='Ajman')$region1='ajman';
elseif($region=='Al Ain')$region1='alain';
elseif($region=='Fujairah')$region1='fujairah';
elseif($region=='Umm al-Quwain')$region1='uaq';
else $region1='uae';

$mark = strtolower($mark);
$model = strtolower($model);

$url="http://$region1.dubizzle.com/motors/used-cars/$mark/$model/?page=$page&price__gte=$Price_from&price__lte=$Price_to&year__gte=$Year_from&year__lte=$Year_to&kilometers__gte=$mileage_low&kilometers__lte=$mileage_high&seller_type=&keywords=&is_basic_search_widget=0&is_search=1&added__gte=&auto_agent=";
 
$ch = curl_init(); 
$userAgent='Mozilla/5.0 (Windows NT 6.1; rv:10.0.2) Gecko/20100101 Firefox/10.0.2'; 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$as=curl_exec($ch); 
curl_close($ch); 
set_time_limit(0);

preg_match_all('/<div class="listing-item">(.+?)<div class="listing-item">/is', $as, $k);

foreach($k[0] as $b) {
	//$b=preg_replace('/style="(.+?)"/', "", $b);
	$b=preg_replace('/href/', 'target="_blank" href', $b);
	$b=preg_replace('/<div style="background/', '<div style="width:200px; height:150px; background', $b);
	echo $b;
}
?>