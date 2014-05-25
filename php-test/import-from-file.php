<?php
	//connect to mysql
	$con=mysqli_connect("localhost","root","mysql","WEB");
	
	// connection is fail
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// get data from database
	$row = 1;
	if (($handle = fopen("wifi-hot-spots.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			//echo "<p> $num fields in line $row: <br /></p>\n";

			$insertStr = "INSERT INTO Items VALUES ("."'".uniqid()."',";
			for ($c=0; $c < $num; $c++) {
				//echo $data[$c] . "<br />\n";
				if($c < $num - 2){
					$insertStr .= "'" . $data[$c] . "',";
				} else if($c < $num - 1){
					$insertStr .=  $data[$c] . ", ";
				} else {
					$insertStr .=  $data[$c];
				}
			}
			$insertStr .= ")";
			echo "$insertStr </br>";
			if($row != 1) {
				//import
				mysqli_query($con,$insertStr);
			}
			$row++;
		}
		fclose($handle);
	}
	
	mysqli_close($con);
?>