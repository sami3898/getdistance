<html>
	<head>
		<title>Location</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="col-md-4"></div>
				<div class="col-md-4">
				<h3>Enter ZipCodes Here</h3>
				<form method = "POST" action = "">
					<div class="form-group">
						<Label>ZIP Code 1</Label>
						<Input type = "text" name = "location" class="form-control">
					</div>
					<div class="form-group">
						<Label>ZIP Code 2</Label>
						<Input type = "text" name = "location1" class="form-control">
					</div>
					
					<input type = "submit" name = "submit" class="btn btn-success" value = "Get Location">
				</form>
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">Distance Between Zipcodes</h3>
					<center>
					<?php
				if(isset($_POST['submit']))
				{
					$zipcode=$_POST['location'];
					$zipcode1 = $_POST['location1'];
					echo "<b>".$zipcode."</b>";
					echo "<br>";
					echo "<b>".$zipcode1."</b>";
					echo "<br>";
					$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zipcode."&sensor=false&key=AIzaSyDSrw_1-p0jP2VhAPnp6udFfnVFiFJSKug";
					$url1 = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zipcode1."&sensor=false&key=AIzaSyDSrw_1-p0jP2VhAPnp6udFfnVFiFJSKug";
					$details=file_get_contents($url);
					echo $details1=file_get_contents($url1);
					$result = json_decode($details,true);
					$result1 = json_decode($details1,true);
				
					$lat=$result['results'][0]['geometry']['location']['lat'];
					$lng=$result['results'][0]['geometry']['location']['lng'];
					
					$lat1=$result1['results'][0]['geometry']['location']['lat'];
					$lng1=$result1['results'][0]['geometry']['location']['lng'];
					echo "<b>Zipcode 1 Latitude :" .$GLOBALS['lat']. ", Zipcode 2 Latitude: ".$lat1;
					echo '<br>';
					echo "Zipcode 1 Longitude :" .$lng. ", Zipcode 2 Longitude: ".$lng1."</b>";
					function getDistance($lat1, $lon1, $lat2, $lon2){
						$earthRadius = 6371;
						$latfrom = deg2rad($lat1);
						$lonfrom = deg2rad($lon1);
						$latto = deg2rad($lat2);
						$lonoto = deg2rad($lon2);
				
						$latDelta = $latto - $latfrom;
						$lonDelta = $lonoto - $lonfrom;
				
						$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2)+
						cos($latfrom) * cos($latto) * pow(sin($lonDelta / 2), 2)));
						return $angle * $earthRadius;
					}
				
					/*$lat1 = 21.185443;
					$lon1 = 72.822365;
					$lat2 = 21.185813;
					$lon2 = 72.822960;*/
				
					$distance = getDistance($lat,$lng,$lat1,$lng1);
					echo "<br>";
					echo "<b>".$distance. " Km</b>"; 
				}
			?>
					</center>
				</div>
			</div>
			
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>
