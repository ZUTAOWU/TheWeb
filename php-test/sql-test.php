<?php

	//connect to mysql
	$con=mysqli_connect("localhost","root","mysql","WEB");
	
	// // connection is fail
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// get data from database
	$result = mysqli_query($con,"SELECT * FROM Members");
	while($row = mysqli_fetch_array($result)) {
	  echo $row['ID'] . " " . $row['USERNAME'];
	  echo "<br>";
	}
	echo "<br>";
	echo "<br>";
	
	$result = mysqli_query($con,"SELECT * FROM Items");
	while($row = mysqli_fetch_array($result)) {
	  echo $row['NAME']."</br>";
	  echo $row['ADDRESS'] ."</br>";
	  echo $row['SUBURB'] ."</br>";
	  echo $row['Latitude'] ."</br>";
	  echo $row['Longitude'] ."</br>";
	  echo "</br>";
	}
	
	echo "test";
	mysqli_close($con);
?>
