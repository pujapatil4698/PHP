<?php
	session_start();
  


?>




<!DOCTYPE html>
	<html>
	<head>
		<title>Resitration,login and logout</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	
	<body>
		<div class="header">
		<h1>Home</h1>
		</div>
		<?php
			if(isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>

		<div class="hero">
	<h2>Welcome User</h2>
	<!--font size="8" color="white">We are here to serve you!</font-->
	<div class="button-awesome">
	<a href="login.php" class="btn btn-half">LOGIN</a>
	<a href="register.php" class="btn btn-full">REGISTER</a>
	</div>
	</div>

		
			<!--
		<div><h4>Welcome> <?php //echo $_SESSION['username']; ?> </h4></div>
				--> 
		<div><a href="logout.php" style="font-size: 25px; color: red; position: absolute; top: 60px; right: 0px; text-align: right;">Logout</a></div>
	</body>
	</html>