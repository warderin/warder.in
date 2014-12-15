<?php
$con=mysqli_connect("localhost","wardvnyk_erin","f5ckvMrd","wardvnyk_maps");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO maps (name, place)
VALUES
('$_POST[name]','$_POST[place]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
    
    <title>Road Trip</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="shortcut icon" href="icon.ico" >
		
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700|Roboto:400,300' rel='stylesheet' type='text/css'>

	<style>
	
	#happy {
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-top: 20px;
	}
	
	</style>

</head>

<body>

	<div id="secondHead">
  	
  		<a href="http://warder.in/home/"><img src="http://i.imgur.com/IldP7PK.png" alt="logo" class="logo2"/> <h2>ERIN WARD</h2> </a>
  		
  	</div>
  	
  	<img id="happy" src="smile.png">

	<h1 style='margin-top:20px;text-align:center;color:#000;'>Thanks for the input!<br><a href='http://warder.in/map/'>Back to the map</a></h1>

<?php
  
mysqli_close($con);

?>

</body>

</html>