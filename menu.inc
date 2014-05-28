<div class="menu-div" id="menu-div">
	<nav class="nav">
		<ul class="menu">
			<li id='menu-home' class="menu-home">
				<a id="asd" href="./index.php">Home</a>
			</li>
			<li id="menu-search">
				<a href="./search.php">Search Wifi Point</a>
			</li>
			<li id="menu-aboutus">
				<a href="./aboutus.php">About US</a>
			</li>
			<li id='menu-login' class="menu-login menu-invi">
				<a href='#'>Login</a>
			</li>
			<li id='menu-signup' class="menu-signup menu-invi">
				<a href="./signup.php" >Sign Up</a>
			</li>
		</ul>
	</nav>
	<div id='login' class="login">
		<?php 
			$login = array_key_exists('login', $_POST) ? $_POST['login'] : "";
			$username = array_key_exists('username', $_POST) ? $_POST['username'] : "";
			$password = array_key_exists('password', $_POST) ? $_POST['password'] : "";
			if($login == 1) {
				if(check_login($username, $password)) {
					//session_start();
		 		 	$_SESSION['username'] = $username;
		 		 	$_SESSION['password'] = $password;
				}
			}
			if(!empty($_SESSION['username']) ) { 
				echo "Welcome {$_SESSION['username']}&nbsp;&nbsp;&nbsp;";
				echo "<a class='login-button blue-button' href='index.php?logout=true' >Logout</a>&nbsp;&nbsp;&nbsp;";
				if($_SESSION['username'] == 'admin') {
					echo "<a class='login-button blue-button' href='admin.php' >Admin Page</a>&nbsp;&nbsp;&nbsp;";
				}
			} else {
				
		?>	

		<form class='login-form' id='login-form' method='post' action="<?php echo $_SERVER['REQUEST_URI'];?>">
		<input name='login' value='1' style='display:none;'/>
		UserName: <input id='input-username' class="login-inputbox username" type="text" name="username" /> &nbsp;&nbsp;&nbsp;
		Password: <input class="login-inputbox password" type="password" name="password"/> &nbsp;&nbsp;&nbsp;
		<a   class="login-button blue-button" href="#" onclick='document.getElementById("login-form").submit();'>Login</a> &nbsp;&nbsp;&nbsp;
		<a   class="signup-button blue-button" href="./signup.php" >Sign Up</a>
		</form>
		<?php } ?>

	</div>
</div>