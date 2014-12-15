<!DOCTYPE html>

<html>

  <head>
  
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    
    <meta charset="utf-8">
    
    <title>Road Trip</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="shortcut icon" href="icon.ico" >
		
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400|Roboto:300' rel='stylesheet' type='text/css'>
		
    
    <style>
    
    html, body { 
    width: 100%; 
    height: 100%;
    font-size: 12pt; 
    background-color: #CCC;
    }
    
    #container {
    top: 75px;
	left: 0;
	right: 0;
	bottom: 0;
    }
    
    #map-canvas {
    
    width: 80%;
    top: 75px;
    left: 0;
	bottom: 0;
    position: absolute;
    z-index: 200;
    }
    
    #sidebar {    
    width: 20%;
    position: absolute;
    top: 75px;
	right: 0;
	bottom: 0;
    background-color: #CCC;
    }
    
    #sidebar p {
    padding: 15px 25px;
    }
    
    #sidebar form {
    position: relative;
    padding: 25px;
    bottom: 0;
    }
    
    #sidebar label {
    font-style: bold;
    }
    
    #sidebar input {
	background-color: #FFF;
	margin-bottom: 15px;
	font-family: 'Roboto', sans-serif;
	border: 1px solid #000;
	font-size: 12pt;
	width: 100%;
	height: 20%
	left: 0 auto;
	right: 0 auto;
	display: block;
	}
	
	#list {
	height: 30%;
	overflow: auto;
	}
    
    </style>
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    
    <script>

	
		function initialize() {
		
  			var home = new google.maps.LatLng(50.47018,-104.648316);
  			var mapOptions = {
    			zoom: 4,
    			center: home,
    			mapTypeId: google.maps.MapTypeId.ROADMAP
  			}

  			var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  			var routeLayer = new google.maps.KmlLayer( {
    			url: 'http://warder.in/map/Untitledlayer.kml'
  			} );
  	
  			routeLayer.setMap(map);
		
		}

		google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    
  </head>
  
  <body>
  
  	<div id="secondHead">
  	
  		<a href="http://warder.in/home/"><img src="http://i.imgur.com/IldP7PK.png" alt="logo" class="logo2"/> <h2>ERIN WARD</h2> </a>
  		
  	</div>
  
  	<section id="container">
  		
    	<div id="map-canvas"></div>
    	
    	<div id="sidebar">
    	
    		<p>
    		
    			<b>I want to go to there...</b>
    			
    			<br><br>
    			
    			Help us plan our road trip, suggest a place to add to the map below!
    		
    		</p>
    		
    		<p id="list">
    		
    		<b>Recent Suggestions</b>
    		
    		<br><br>
    		
    		<?php
				// Connect to database server
				mysql_connect("localhost", "wardvnyk_erin", "f5ckvMrd") or die (mysql_error ());

				// Select database
				mysql_select_db("wardvnyk_maps") or die(mysql_error());

				// SQL query
				$query = "SELECT * FROM maps ORDER BY date DESC";

				// Execute the query (the recordset $rs contains the result)
				$data = mysql_query($query);
	
				// Loop the recordset $rs
				// Each row will be made into an array ($row) using mysql_fetch_array
				while($row = mysql_fetch_array($data)) {

	   				// Write the value of the column FirstName (which is now in the array $row)
	  				echo "<b>" . $row['place'] . "</b><br>" . $row['name'] . " - " . date('F jS',strtotime($row['date'])) . "<br><br>";

	  			}

				// Close the database connection
				mysql_close();
			?>
			
			</p>
    		
    		<form action="getdata.php" method="post">
					
				<label for="name">Name: </label>
				<input type="text" name="name" placeholder="Liz Lemon" />					
					
				<label for="message">Suggestion: </label>
				<input type="text" name="place" placeholder="I want to go to there." />					
					
  				<input type="submit" value="Send">
    		
    		</form>
    	
    	</div>
    		
    </section>
    
  </body>
  
</html>