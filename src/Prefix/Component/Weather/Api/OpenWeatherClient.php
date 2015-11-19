<?php

	namespace Prefix\Component\Weather\Api;

	class OpenWeatherClient {

		private $buzz;
		private $url;
		private $json;
		private $watch;

		function __construct($buzz, $url, $watch) {
			
			$this->buzz = $buzz;
			$this->url = $url;
			$this->watch = $watch;

		}

		function getData() {

			$event = $this->watch->start('pomiar');
			$response = $this->buzz->get($this->url);
			$event = $this->watch->stop('pomiar');
			echo 'Czas trwania zapytania do API: ';
			echo $event->getDuration()/1000;
			echo 'sekund<br/>';
			$json = $response->getContent();
			$this->json = json_decode($json);

		}
		
		function getTemp() {
		
			echo 'Temperatua: '.($this->json->main->temp - 273.15).' stopni celcjusza';

		}

	}
