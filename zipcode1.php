
			<?php
				if(isset($_GET['submit']))
				{
					$zipcode=$_GET['location'];
					$zipcode1 = $_GET['location1'];
					/*echo "<b>".$zipcode."</b>";
					echo "<br>";
					echo "<b>".$zipcode1."</b>";
					echo "<br>";*/
					$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zipcode."&sensor=false&key=AIzaSyDSrw_1-p0jP2VhAPnp6udFfnVFiFJSKug";
					$url1 = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zipcode1."&sensor=false&key=AIzaSyDSrw_1-p0jP2VhAPnp6udFfnVFiFJSKug";
					$details=file_get_contents($url);
					$details1=file_get_contents($url1);
					$result = json_decode($details,true);
					$result1 = json_decode($details1,true);
				
					$lat=$result['results'][0]['geometry']['location']['lat'];
					$lng=$result['results'][0]['geometry']['location']['lng'];
					
					$lat1=$result1['results'][0]['geometry']['location']['lat'];
					$lng1=$result1['results'][0]['geometry']['location']['lng'];
					//echo "<b>Zipcode 1 Latitude :" .$GLOBALS['lat']. ", Zipcode 2 Latitude: ".$lat1;
					//echo '<br>';
					//echo "Zipcode 1 Longitude :" .$lng. ", Zipcode 2 Longitude: ".$lng1."</b>";
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
					echo $distance; 
				}
			?>