<?php 
/* David Hobbs H00251314
 Portal Aggregator website. 
 F28WP Web programming


*/
ini_set('display_errors', 1); //this code block displays php errors such as incorrect syntax, functions that have not worked correctly etc.
error_reporting(E_ALL);

include('includes/head.html'); //include html head MVC technique


// openweather map APIs

//curent weather
$url="http://api.openweathermap.org/data/2.5/weather?id=2650225&lang=en&units=metric&APPID=85ba47ce17ec775d10fa327e78ffa804";
		$json=file_get_contents($url); //this function uses the url to query the API endpoint for specfific JSON data


		$data=json_decode($json,true);// JSON data is converted into an array so data can be accessed using array indexes.

//forecast 
$urlForecast="http://api.openweathermap.org/data/2.5/forecast?id=2650225&lang=en&units=metric&APPID=85ba47ce17ec775d10fa327e78ffa804";
		$jsonForecast=file_get_contents($urlForecast);


		$dataForecast=json_decode($jsonForecast,true);

		$k = 7; // number for indexing weather forecasts from openweathermap.com this ensures the forecasts are at least 24 hours apart
		$l = 15;
		$m = 23;
		$n = 31;
		$o = 38;
		$day1 = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));//this php code is not part of the requirements but adds a day to unix timestamp
		$day2 = mktime(0, 0, 0, date("m")  , date("d")+2, date("Y"));//for the weather forecast feature, adds days relative to today.
		$day3 = mktime(0, 0, 0, date("m")  , date("d")+3, date("Y"));
		$day4 = mktime(0, 0, 0, date("m")  , date("d")+4, date("Y"));
		$day5 = mktime(0, 0, 0, date("m")  , date("d")+5, date("Y"));

//****************************************

//Tech news From newsAPI.org

$techurl = "https://newsapi.org/v1/articles?source=techcrunch&apiKey=2a8f4bf4cf994986a677d1cbc81295dd";

		$techjson=file_get_contents($techurl);

		$techData=json_decode($techjson, true);


//******************************************

// Guardian API in XML parsed into JSON. 

$guardianURL = fopen("https://content.guardianapis.com/search?q=news&order-by=newest&&format=xml&api-key=63d7ad2f-aa26-421d-a39a-0df542dbaf2b","rb");

		$stream = stream_get_contents($guardianURL); //using php functions to get XML data form guardianapis.com

		fclose($guardianURL); 

		$fromXML = simplexml_load_string($stream); //convert XML into an XML object with a key value structure.



		$json = json_encode($fromXML); //convert XML object into JSON object notation

		$guardianData=json_decode($json, true);// convert JSON into array with key value structure.




include('includes/layout.html'); //include layout.html MVC technique.






 ?>