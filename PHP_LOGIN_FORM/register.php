<?php
	session_start();
  
	$db = mysqli_connect('localhost','root','','pujalogin');

	if(isset($_POST['register_btn'])){
		//session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$mob = mysqli_real_escape_string($db,$_POST['mob']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password2 = mysqli_real_escape_string($db,$_POST['password2']);

		if($password == $password2)
		{
			//create user

			$password = md5($password);
			$sql = "INSERT INTO `users` (`username`,`email`,`mob`,`password`) VALUES ('$username','$email','$mob','$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location:home.php");
		}
		else{

			$_SESSION['message']="The two Passwords do not match";
		}
	}
?>



<!DOCTYPE html>
	<html>
	<head>
		<title>Resitration,login and logout</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	
	<body>
		<div class="header">
		<h1>Registration</h1>
		</div>

		<?php
			if(isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>


		<form  action="register.php" method="POST">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" class="textInput"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" class="textInput"></td>
				</tr>
				<tr>
					<td>Mobile No:</td>
					<td><input type="tel" name="mob" class="textInput"></td>
				</tr>

				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" class="textInput"></td>
				</tr>

				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" name="password2" class="textInput"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="register_btn" value="Register"></td>
				</tr>

			</table>
		</form>
	</body>