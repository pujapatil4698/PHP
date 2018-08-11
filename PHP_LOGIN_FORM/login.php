<?php
	session_start();
  
	$db = mysqli_connect('localhost','root','','pujalogin');

	if(isset($_POST['login_btn'])){
		//session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		
		$password =md5($password);

		$sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db,$sql);

		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now Logged in";
			$_SESSION['username'] = $username;
			header("location: home.php");

		}else{
//			echo "Invalid Username or Password";
			$_SESSION['message']="Username/password combination incorrect";

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
		<h1>Login</h1>
		</div>

		<?php
			if(isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>




		<form  action="login.php" method="POST">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" class="textInput"></td>
				</tr>
				
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" class="textInput"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="login_btn" value="Login"></td>
				</tr>

			</table>
		</form>
	</body>