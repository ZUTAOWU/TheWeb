<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');  
	define('DB_PASS', 'mysql');  
	define('DB_DATABASENAME', 'n8975698');

	function db_connect() {
		// $hostname = 'localhost';
		// $username = 'root';
		// $password = 'mysql';
		try {
			$dbh = new PDO("mysql:host=". DB_HOST . ";dbname=" . DB_DATABASENAME, DB_USER, DB_PASS);
			return($dbh);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	$db = db_connect();
	$stmt = $db->query('SELECT * FROM Members');
	if(!empty($stmt)) {
		$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	if(!empty($members)){
		foreach($members as $member) {
			echo $member['ID'];
		} 
	} else {
			echo '<p>There are no reviews for this venue yet.</p>';
	}
?>