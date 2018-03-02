<html>
	<head>
		<style>
			h1{
				text-align: center;
				margin: 50px;
				color: rgba(0, 195, 255, 0.986);
				font-size: 70px;
			}
			p{
					font-size: 25px;
			}
			form{
				text-align: center;
				font-size: 20px;
			}
		</style>
	</head>
<body>
<h1 size=20 color="blue"><i>Forecast Weather</i></h1>
<form action= "" method= "get">
Country:  <input type= "text" name= "country" id= "country" /><br><br>
City:     <input type= "text" name= "city" id="city" /><br><br>
<input type="submit" name= "forecast" value= "48 hour/hour forecast"/>
<input type="submit" name= "forecast" value= "5 day/3hour forecast"/>
</form>
<form action="index.html">
	<input type="submit" value="Go to the home page">
</form>
</body>
</html>

<?php
$submit = $_GET['forecast'];
$country= $_GET['country'];
$city= $_GET['city'];
$key= "d9f09b241a024009ad5e5feb7ae297e0";
if($forecast == "48 hour/hour forecast"){
	$url48= "http://api.weatherbit.io/v2.0/forecast/hourly?key=".$key."&country=".$country."&city=".$city;
	$json48= file_get_contents($url48);
	$result48= json_decode($json48, true);
	echo"<p>";
	echo "Temperature: ".($result48["data"][0]["temp"])."<br>";
	echo "Wind direction: ".($result48["data"][0]["wind_cdir"])."<br>";
	echo "rh: ".($result48["data"][0]["rh"])."<br>";
	echo "Wind Speed: ".($result48["data"][0]["wind_spd"])."<br>";
	echo "wind_cdir_full: ".($result48["data"][0]["wind_cdir_full"])."<br>";
	echo "Pressure: ".($result48["data"][0]["pres"])."<br>";
	echo "Clouds: ".($result48["data"][0]["clouds"])."<br>";
	echo "App_temp: ".($result48["data"][0]["app_temp"])."<br>";
	echo "Datetime: ".($result48["data"][0]["datetime"])."<br>";
	echo "Weather description: ".($result48["data"][0]["weather"]["description"])."<br>";
	echo "City_name: ".($result48["city_name"])."<br>";
	echo "Timezone: ".($result48["timezone"])."<br>";
	echo"</p>";
}
else if($forecast == "5 day/3hour forecast"){
	$url5day= "http://api.weatherbit.io/v2.0/forecast/3hourly?key=".$key."&country=".$country."&city=".$city;
	$json5day= file_get_contents($url5day);
	$result5day= json_decode($json5day, true);

	echo"<p>";
	echo "Temperature: ".($result5day["data"][0]["temp"])."<br>";
	echo "Wind direction: ".($result5day["data"][0]["wind_cdir"])."<br>";
	echo "rh: ".($result5day["data"][0]["rh"])."<br>";
	echo "Wind speed: ".($result5day["data"][0]["wind_spd"])."<br>";
	echo "wind_cdir_full : ".($result5day["data"][0]["wind_cdir_full"])."<br>";
	echo "Pressure: ".($result5day["data"][0]["pres"])."<br>";
	echo "Clouds: ".($result5day["data"][0]["clouds"])."<br>";
	echo "App_temp : ".($result5day["data"][0]["app_temp"])."<br>";
	echo "Datetime : ".($result5day["data"][0]["datetime"])."<br>";
	echo "Weather description : ".($result5day["data"][0]["weather"]["description"])."<br>";
	echo "City_name : ".($result5day["city_name"])."<br>";
	echo "Timezone : ".($result5day["timezone"])."<br>";
	echo"<p>";
}
?>