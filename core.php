<?php 

	//core.php defines some common functions use in php

	// Show message on web page
	function alert($str) {
		echo "<script type='text/javascript'>alert('$str');</script>";
	}
	session_start();
	// common define for MYSQL
	define('DB_HOST', 'localhost');  
	// define('DB_USER', 'n8975698');  
	// define('DB_PASS', 'PDaOVvSGw4iMhoda');  
	// define('DB_DATABASENAME', 'n8975698');
	define('DB_USER', 'root');  
	define('DB_PASS', 'mysql');  
	define('DB_DATABASENAME', 'n8975698');

	//Mysql connection
	function db_connect() {
		try {
			$dbh = new PDO("mysql:host=". DB_HOST . ";dbname=" . DB_DATABASENAME, DB_USER, DB_PASS);
			return($dbh);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//Mysql query, base on sql_str
	function sql_query($sql_str) {
		$db = db_connect();
		$stmt = $db->query($sql_str);
		if(!empty($stmt)) {
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		return array();
	}

	//query table's row number
	function sql_query_table_count($table_name) {
		$db = db_connect();
		$stmt = $db->prepare("SELECT COUNT(*) FROM $table_name");
		$stmt->execute(); 
		return $stmt->fetchColumn(); 
	}	

	// base on sql select, get count
	function sql_query_count($sql_str) {
		$db = db_connect();
		$stmt = $db->query($sql_str);
		if(!empty($stmt)) {
			$res = $stmt->rowCount();
			return $res;
		}
		return 0;
	}

	// sql query with page limite
	function sql_query_page($sql_str, $page_num, $show_num) {
		if($page_num <= 0 or $show_num <= 0) {
			return;
		}
		// offset is beginning of record
		$offset = ($page_num-1) * $show_num;
		// add limit to query sql
		$sql_str = $sql_str . " limit $offset,$show_num";
		$db = db_connect();
		$stmt = $db->query($sql_str);
		if(!empty($stmt)) {
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		return array();
	}

	// parse page number from url
	function parse_pagenum() {
		// get url
		$url = $_SERVER['REQUEST_URI'];
		$parsedURL = parse_url($url,PHP_URL_QUERY);
		if($parsedURL=="") {
			return 1;
		}
		parse_str($parsedURL, $output);
		if(array_key_exists('page', $output)) {
			return $output['page'];
		} else {
			return 1;
		}
	}

	// return total page number
	function get_total_pagenum($page_display_num, $counts) {
		return (int)($counts / $page_display_num) + 1;
	}

	// return page html code
	function get_page_html($current_page_num, $total_page_num) {
		$page_html = "";
		if($current_page_num > 1) {
			// if page number great than 1, show 'prev'.
			$_GET['page'] = $current_page_num - 1;
			$page_html = $page_html . "<a href='{$_SERVER['PHP_SELF']}?".http_build_query($_GET)."'>Prev </a>&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($current_page_num < $total_page_num)	{
			// if page number less than total page num, show 'next'.
			$_GET['page'] = $current_page_num + 1;
			$page_html = $page_html . "<a href='{$_SERVER['PHP_SELF']}?".http_build_query($_GET)."'>Next </a>&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$page_html = $page_html . " Page:  $current_page_num  | Total pages : $total_page_num";
		return $page_html;
	}

	// check if user exist
	function is_user_exist($username) {
		$db = db_connect();
		$stmt = $db->query("SELECT COUNT(*) FROM Members where USERNAME = '$username'");
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// var_dump($res);
		// echo $res[0]["COUNT(*)"];
		if($res[0]["COUNT(*)"] !=0 ) {
			return true;
		} else {
			return false;
		}
	}

	// validate sign up information
	function validate_signUp($username, $email, $password, $repassword, $sex) {
		$db = db_connect();

		$stmt = $db->prepare("SELECT COUNT(*) FROM Members where USERNAME = '$username'");
		$stmt->execute();
		$number_of_rows = $stmt->fetchColumn(); 
		if($number_of_rows!=0) {
			alert("Exist User Name!");
			return false;
		}

		$stmt = $db->prepare("SELECT COUNT(*) FROM Members where EMAIL = '$email'");
		$stmt->execute();
		$number_of_rows = $stmt->fetchColumn(); 
		if($number_of_rows!=0) {
			alert("Exist Email!");
			return false;
		}

		// check if two password equal
		if($password != $repassword) {
			alert("Please input the same password!");
			return false;
		}

		return true;
	}

	// insert sign up information to database
	function insert_signup($username, $email, $password, $sex) {
		$db = db_connect();
		$id = uniqid();
		// change password to hashed password
		$password = md5($password);
		$stmt = $db->prepare("insert into Members values(:field1,:field2,:field3,:field4,:field5)");
		$isSuccess = $stmt->execute(array(':field1' => $id, ':field2' => $username, ':field3' => $email, ':field4' => $password, ':field5' => $sex));
		//$isSuccess = mysqli_query($con,"insert into Members values ('$id','$username','$email', '$password', '$sex')");
		//sql_disconnect();
		return $isSuccess;;
	}	

	// check if username and password exist
	function check_login($username, $password) {
		$db = db_connect();
		$password = md5($password);

		if(!is_user_exist($username)) {
			alert("User Name does not exist !");
			return false;
		}

		$stmt = $db->query("select * from Members where USERNAME = '$username' and PASSWORD ='$password'");
		$count = $stmt->rowCount();
		
		if($count > 0) {
			return true;
		} else {
			alert("Wrong password!");
			return false;
		}
	}

	// insert comment/review to database
	function insert_comment($comment, $rating, $username, $itemid) {
		if($comment != "" and $rating >=1 and $rating <=5 and $username!="" and $itemid!="") {
			$db = db_connect();
			// search User ID first
			$stmt = $db->query("SELECT ID FROM Members where USERNAME = '$username'");
			//$result = mysqli_query($con,"SELECT ID FROM Members where USERNAME = '$username'");

			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			//$row = mysqli_fetch_array($result);
			$userid = $res[0]['ID'] ? $res[0]['ID'] : '';

			if($userid == '') {
				return false;
			}
			$id = uniqid();
			//insert comment to databases
			$stmt = $db->prepare("insert into Reviews values (:field1,:field2,:field3,:field4,:field5, now())");
			$isSuccess = $stmt->execute(array(':field1' => $id, ':field2' => $userid, ':field3' => $itemid, ':field4' => $comment, ':field5' => $rating));

			return $isSuccess;
		}
	}

	// import item data from file
	function import_from_file($file_name) {
		$db = db_connect();
		$row = 0;

		if (($handle = fopen($file_name, "r")) !== FALSE) {
			$is_valid_data = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$is_valid_data = true;
				$num = count($data);
				if($num != 5) {
					$is_valid_data = false;
				}
				// insert data to item table
				$stmt = $db->prepare("insert into Items values ('".uniqid()."',:field2,:field3,:field4,:field5,:field6)");
				//$stmt -> bindParam(':field1', uniqid());
				for ($c=0; $c < $num; $c++) {
					if(($c == $num -1 || $c == $num - 2)) {
						$data[$c] = floatval($data[$c]);
						if(!is_float($data[$c]) || $data[$c] == 0 ) {
							$is_valid_data = false;
						}
					}
					$stmt -> bindParam(':field'.($c+2), $data[$c]);
				}
				if($is_valid_data) {
					//alert("asd");
					$isSuccess = $stmt -> execute();
					if(!$isSuccess) {
						echo("Statement failed: ". $stmt->error . "<br>");
					}
				}
					
				$row++;
			}
			alert('import success!');
		} else {
			alert('import fail!');
		}
	}

	//clear all Items data from databases
	function clear_Items() {
		$db = db_connect();
		$stmt = $db->prepare('delete from Items');
		$stmt->execute();
	}

	//clear all Reviews data from databases
	function clear_Reviews() {
		$db = db_connect();
		$stmt = $db->prepare('delete from Reviews');
		$stmt->execute();
	}

	//clear all Members data from databases
	function clear_Members() {
		$db = db_connect();
		$stmt = $db->prepare("delete from Members where USERNAME <> 'admin'");
		$stmt->execute();
	}

?>