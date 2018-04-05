<?php
require "connect.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>CMS</title>
	<link rel="stylesheet" type="text/css" href="css/cms_style.css">
</head>
<header>
	<p>Logged in as <?php echo $_SESSION['username'] ?> </p>
	<a href="logout.php">Logout</a>
</header>
<body>
	<div class="menu-container">
		<a href="">
			<div class="menu-item">
				<div class="menu-icon">
				</div>
				<h1>Article</h1>
			</div>
		</a>
		<a href="">
			<div class="menu-item">
				<div class="menu-icon">
				</div>
				<h1>Article</h1>
			</div>
		</a>
		<a href="">
			<div class="menu-item">
				<div class="menu-icon">
				</div>
				<h1>Article</h1>
			</div>
		</a>
		<a href="">
			<div class="menu-item">
				<div class="menu-icon">
				</div>
				<h1>Article</h1>
			</div>
		</a>
		<a href="">
			<div class="menu-item">
				<div class="menu-icon">
				</div>
				<h1>Article</h1>
			</div>
		</a>
	</div>

</body>
</html> 