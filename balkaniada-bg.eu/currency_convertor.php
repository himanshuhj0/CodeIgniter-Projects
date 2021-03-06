<?php
/*
NOK - Норвежка крона
SEK - Шведски крони
*/
  function convertCurrency($amount, $from, $to){
    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return round($converted, 2);
  }

$valutes = array();
$valutes['NOK'] = convertCurrency($_POST['sum'], "EUR", "NOK");
$valutes['SEK'] = convertCurrency($_POST['sum'], "EUR", "SEK");

echo json_encode($valutes);
?>
