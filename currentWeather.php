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
<h1><i>Get Current Weather</i></h1>
<form action= "" method= "get">
Country:  <input type= "text" name= "country" id= "country" /><br><br>
City:     <input type= "text" name= "city" id="city" /><br><br>
<input style="height:20px;width:130px" type="submit" name= " Current weather? " value= " Current weather "/>
</form>
<form action="index.html">
	<input type="submit" value="Go to the home page">
</form>

<?php
$country= $_GET['country'];
$city= $_GET['city'];
$key= "d9f09b241a024009ad5e5feb7ae297e0";
$url= "http://api.weatherbit.io/v2.0/current?key=".$key."&country=".$country."&city=".$city;
if($city != ""){
	$json= file_get_contents($url);
	$result= json_decode($json, true);

	echo"<p><br><br>";
	echo "Temperature: ".($result["data"][0]["app_temp"])."<br>";
	echo "Weather description: ".($result["data"][0]["weather"]["description"])." <br>";
	echo "Clouds: ".($result["data"][0]["clouds"])."<br>";
	echo "Pressure: ".($result["data"][0]["pres"])."<br>";
	echo "Wind speed: ".($result["data"][0]["wind_spd"])."<br>";
	echo "Wind_cdir: ".($result["data"][0]["wind_cdir"])."<br>";
	echo "rh: ".($result["data"][0]["rh"])."<br>";
	echo "pod: ".($result["data"][0]["pod"])."<br>";
	echo "lon: ".($result["data"][0]["lon"])."<br>";
	echo "Timezone: ".($result["data"][0]["timezone"])."<br>";
	echo "Wind_cdir_full: ".($result["data"][0]["wind_cdir_full"])."<br>";
	echo"</p>";
}

?>
</body>
</html>