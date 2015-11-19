<html>
<head>
	<meta charset="UTF-8"/>
</head>

<?php

	require_once 'vendor/autoload.php';

	use Buzz\Browser;
	use Symfony\Component\Stopwatch\Stopwatch;
	use Prefix\Component\Weather\Api\OpenWeatherClient;

	$watch = new Stopwatch();
	$browser = new Browser();
	$url = 'http://api.openweathermap.org/data/2.5/weather?q='.$_GET['miasto'].'&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
	//$url = 'http://api.openweathermap.org/data/2.5/weather?q=London&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
	$client = new OpenWeatherClient($browser,$url,$watch);
	$client->getData();
	$client->getTemp();
