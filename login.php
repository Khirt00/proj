<?php 
session_start();
require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>ASF Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="img/asf.png">
</head>
<body>
	<form method="post">

				<input type="text" class="input" placeholder="Username" name="username">
				<input type="password" class="input" placeholder="Password" name="password">
				<button type="submit" name="login">LOGIN</button>
				<button><a href="register.php">SIGNUP</a></button>
		</form>


	<?php
		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$q = 'SELECT * FROM `site` WHERE `username` = "'.$username.'" AND `password` = "'.$password.'"  ';

			$r = mysqli_query($con, $q);
			if ($r) {
				if (mysqli_num_rows($r) > 0){
					$_SESSION['username'] = $username;
					header("location:add.html");
				}else{
					echo '<p class="p">Your username and password do not matched<p>'; 
				}
			}else{
				echo $q; 
			}
		}
	?>

</body>
</html>