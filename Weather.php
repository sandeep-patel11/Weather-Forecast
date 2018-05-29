<?php

	if($_GET['city']){
		$_GET['city']=str_replace(' ','',$_GET['city']);
		$forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$_GET['city']."/forecasts/latest");
		$pageArray=explode('<tr class="b-forecast__table-description b-forecast__hide-for-small days-summaries"><th></th><td colspan="9"><span class="b-forecast__table-description-title">', $forecastPage);
		$secondPageArray=explode('</span></p></td><td colspan="9"><span class="b-forecast__table-description-title"><h2>', $pageArray[1]);
		$weather= $secondPageArray[0];

	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>WEATHER FORECAST</title>
    <style type="text/css">
    	.container{
    		text-align:center;
    		margin-top:200px;
    	}
    	#weather
    	{
    		margin-top:15px;
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  		<h1>What's The Weather</h1>
    
    <form>
    	<fieldset class="form-group">
				<label for="city">Enter the name of the city.</label>
				<input type="text" class="form-control" name="city" id="city" placeholder="Eg. London , Tokyo">
				<button style="margin-top:5px;" type="submit" class="btn btn-primary">Submit</button>
			</form>
			<div id="weather">
				<?php
				if($weather)
				{
					echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
				}?>


<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>