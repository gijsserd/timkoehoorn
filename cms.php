<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<?php require "elements/header_cms.php" ?>
<body>
	<div class="menu-container">
		<a href="cms_music.php">
			<div class="menu-item">
				<div class="menu-icon">
					<img src="img/musicicon.png">
				</div>
				<h1>Muziek</h1>
			</div>
		</a>
		<a href="cms_article.php">
			<div class="menu-item">
				<div class="menu-icon">
					<img src="img/newsicon.png">
				</div>
				<h1>Artikelen</h1>
			</div>
		</a>
		<a href="cms_optreden.php">
			<div class="menu-item">
				<div class="menu-icon">
					<img src="img/optreden.png">
				</div>
				<h1>Optredens</h1>
			</div>
		</a>
		<a href="">
			<div class="menu-item">
				<div class="menu-icon">
					<img src="img/loggedinicon.png">
				</div>
				<h1>Ingelogd als:</h1>
				<h1 class="menu-item-loguser" ><?php echo $_SESSION['username'] ?></h1>
			</div>
		</a>
	</div>

</body>
<?php require "elements/footer_cms.php" ?>
<?php
			}
	else {
		header("Location: login.php");
		die;
	}
?>
</html> 