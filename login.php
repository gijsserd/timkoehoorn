<?php
require "connect.php";
?>

<html lang="nl">
	<head>
		<!--<script src="js/jquery.min.js" ></script>
		<script src="js/script.js" ></script> !-->
		<link href="css/cms_style.css" media="all" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	</head>
	
<body>
	<div class="login-container">
		<div class="loginform">
			<h1>Login</h1>
			<form action="" method="POST">
				<input type="text" name="username" placeholder="enter username" value="" required>
				<input type="password" name="password" placeholder="enter password" value="" required>
				<input type="submit" name="loginbutton" value="Login" id="loginbutton">
			</form>
			<?php
				if(isset($_POST["loginbutton"]))
				{
					session_start();
					$username = $_POST["username"];
					$password = hash("sha1", $_POST["password"]);
					
					$query = "SELECT * FROM user WHERE
							  username = '$username' AND
							  CONCAT(password, salt) = '$password'";
					
					$result = mysqli_query($connect, $query) or die(mysqli_error("$connect"));
					$count = mysqli_num_rows($result);
					if($count == 1){
						unset($_SESSION['username']);
						$_SESSION['username'] = $username;	
					}
					else {
						echo '<script type="text/javascript"> alert("gegevens niet correct")';
					}
				}
				
				if(isset($_SESSION['username'])){
					header("Location: cms.php");
				}
				
			?>
		</div>
	</div>
</body>

</html>