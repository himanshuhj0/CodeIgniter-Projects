<?php
$url="http://autos.souq.com/8-cars-for-sale/price_low-$Price_from/price_high-$Price_to/order-id/country-United+Arab+Emirates/make-$mark/model-$model/year_low-$Year_from/year_high-$Year_to/mileage_low-$mileage_low/mileage_high-$mileage_high/bodystyle-$bodystyle/region-$region/$page/listings.html";

$ch = curl_init(); 
$userAgent='Mozilla/5.0 (Windows NT 6.1; rv:10.0.2) Gecko/20100101 Firefox/10.0.2'; 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$as=curl_exec($ch); 
curl_close($ch); 
set_time_limit(0);

preg_match_all('/<div class="ad_content">(.+?)<\/div>(.+?)<\/div>(.+?)<\/div>(.+?)<\/div>(.+?)<\/div>(.+?)<\/div>/is', $as, $k);

foreach($k[0] as $b) {
	$b=preg_replace('/style="(.+?)"/', "", $b);
	$b=preg_replace('/href/', 'target="_blank" href', $b);
	echo $b;
}
?>