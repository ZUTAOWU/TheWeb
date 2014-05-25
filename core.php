<?php 
	function alert($str) {
		echo "<script type='text/javascript'>alert('$str');</script>";
	}
	session_start();
	define('DB_HOST', 'localhost');  
	define('DB_USER', 'n8975698');  
	define('DB_PASS', 'PDaOVvSGw4iMhoda');  
	define('DB_DATABASENAME', 'n8975698');
	$con;
	function sql_connect() {
		global $con;
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASENAME) or die("connect failed" . mysqli_connect_errno());
	}

	function sql_disconnect() {
		global $con;
		mysqli_close($con);
	}

	function sql_query($sql_str) {
		global $con;
		sql_connect();
		$db_rows = array(); 
		$result = mysqli_query($con,$sql_str);
		while($row = mysqli_fetch_array($result)) {
			$db_rows[]=$row;
		}
		mysqli_free_result($result);  
		sql_disconnect();
		return $db_rows;
	}

	function sql_query_table_count($table_name) {
		global $con;
		sql_connect();
		$result = mysqli_query($con,"SELECT COUNT(*) FROM $table_name");
		$row = mysqli_fetch_array($result);
		mysqli_free_result($result);  
		sql_disconnect();
		return $row[0];
	}

	function sql_query_count($sql_str) {
		global $con;
		sql_connect();
		$result = mysqli_query($con,$sql_str);
		$count = mysqli_num_rows($result);
		mysqli_free_result($result);  
		sql_disconnect();
		return $count;
	}

	function sql_query_page($sql_str, $page_num, $show_num) {
		if($page_num <= 0 or $show_num <= 0) {
			return;
		}

		global $con;
		sql_connect();
		$db_rows = array(); 
		$offset = ($page_num-1) * $show_num;
		$sql_str = $sql_str . " limit $offset,$show_num";
		$result = mysqli_query($con,$sql_str);
		while($row = mysqli_fetch_array($result)) {
			$db_rows[]=$row;
		}
		mysqli_free_result($result);  
		sql_disconnect();
		return $db_rows;
	}

	function parse_pagenum() {
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

	function get_total_pagenum($page_display_num, $counts) {
		return (int)($counts / $page_display_num) + 1;
	}

	function get_page_html($current_page_num, $total_page_num) {
		$page_html = "";
		if($current_page_num > 1) {
			$_GET['page'] = $current_page_num - 1;
			$page_html = $page_html . "<a href='{$_SERVER['PHP_SELF']}?".http_build_query($_GET)."'>Prev </a>&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($current_page_num < $total_page_num)	{
			$_GET['page'] = $current_page_num + 1;
			$page_html = $page_html . "<a href='{$_SERVER['PHP_SELF']}?".http_build_query($_GET)."'>Next </a>&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$page_html = $page_html . " Page:  $current_page_num  | Total : $total_page_num";
		return $page_html;
	}

	function validate_signUp($username, $email, $password, $repassword, $sex) {
		global $con;
		sql_connect();
		$result = mysqli_query($con,"SELECT COUNT(*) FROM Members where USERNAME = '$username'");
		$row = mysqli_fetch_array($result);
		if($row[0]!=0) {
			alert("Exist User Name!");
			return false;
		}

		$result = mysqli_query($con,"SELECT COUNT(*) FROM Members where EMAIL = '$email'");
		$row = mysqli_fetch_array($result);
		if($row[0]!=0) {
			alert("Exist User Email!");
			return false;
		}

		return true;
	}

	function insert_signup($username, $email, $password, $repassword, $sex) {
		global $con;
		sql_connect();
		$id = uniqid();
		$isSuccess = mysqli_query($con,"insert into Members values ('$id','$username','$email', '$password', '$sex')");
		sql_disconnect();
		return $isSuccess;
	}

	function check_login($username, $password) {
		global $con;
		sql_connect();
		$result = mysqli_query($con,"select * from Members where USERNAME = '$username' and PASSWORD ='$password'");
		$count = mysqli_num_rows($result);
		mysqli_free_result($result);  
		sql_disconnect();
		
		if($count > 0) {
			return true;
		} else {
			alert("Login Failure!");
			return false;
		}
	}

	function insert_comment($comment, $rating, $username, $itemid) {
		if($comment != "" and $rating >=1 and $rating <=5 and $username!="" and $itemid!="") {
			global $con;
			sql_connect();

			$result = mysqli_query($con,"SELECT ID FROM Members where USERNAME = '$username'");
			$row = mysqli_fetch_array($result);
			$userid = $row[0] ? $row[0] : '';

			if($userid == '') {
				return false;
			}
			//alert($row[0]);
			$id = uniqid();
			$sqlstr = "insert into Reviews values ('$id','$userid','$itemid', '$comment', '$rating', now())";
			echo $sqlstr;
			$isSuccess = mysqli_query($con, $sqlstr);
			sql_disconnect();
			return $isSuccess;
		}

	}

?>