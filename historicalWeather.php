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
        <h1><i>Get Historical Weather(Daily)</i></h1>
        <form action="" method="get" name="histWeather">
            <p>City  : <input type="text" name="city" /></p>
            <p>Start date: <input type="date" name="sDate" /></p>
            <p>Start date: <input type="date" name="eDate" /></p>
            <input type="submit" value="Get Weather" name="submit"/>            
        </form>
        <form action="index.html">
            <input type="submit" value="Go to the home page">
        </form>
        
    </body>
<?php
$city = $_GET['city'];
$sDate = $_GET['sDate'];
$eDate = $_GET['eDate'];
if($city != ""){
    $hWUrl = "http://api.weatherbit.io/v2.0/history/daily?key=d9f09b241a024009ad5e5feb7ae297e0"."&city=".$city.
    "&start_date=".$sDate."&end_date=".$eDate;
    $hwjson = file_get_contents($hWUrl);
    $hwResult = json_decode($hwjson, true);
    $heUrl = "http://api.weatherbit.io/v2.0/history/energy?key=d9f09b241a024009ad5e5feb7ae297e0"."&city=".$city.
    "&start_date=".$sDate."&end_date=".$eDate;
    $hejson = file_get_contents($heUrl);
    $heResult = json_decode($hejson, true);
    //echo $heUrl;
    //print_r($heResult);
    echo"
    <p>
        Temperature: <label name='temp'>".$hwResult["data"][0]["temp"]."</label><br>
        Min. temp.: <label name='minTemp'>".$hwResult["data"][0]["min_temp"]."</label><br>
        Max. temp.: <label name=maxTemp'>".$hwResult["data"][0]["max_temp"]."</label><br>
        Wind speed: <label name='wsd'>".$hwResult["data"][0]["wind_spd"]."m/s</label><br>
        Pressure: <label name='pres'>".$hwResult["data"][0]["pres"]."mb</label><br>
        Average sea level pressure: <label name='slp'>".$hwResult["data"][0]["slp"]."mb</label><br>
        Average sun hours/day: <label name='sh'>".$heResult["data"][0]["sun_hours"]."mb</label>
    </p>
    ";
    
}
?>
</html>