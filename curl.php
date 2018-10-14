#!/usr/bin/php
<?php

/*
This script is wroted for CLI apps.	You can easily rewrite it for CGI.
*/

$url = "http://whatsmyos.com/";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);

if(!empty($params)) {
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt ($ch, CURLOPT_POST, false); 
}
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
$headers=array();
$headers[]='Content-Type: application/x-www-form-urlencoded; charset=utf-8';
$headers[]='X-Requested-With: XMLHttpRequest';
curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);    
curl_setopt ($ch, CURLOPT_HEADER, true);

$response = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

print_r($info);

echo "HTTP CODE:\n".$info["http_code"]."\n";

echo "HTTP RESPONSE:\n".$response."\n";
