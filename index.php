	<?php
require "connect.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Tim Koehoorn</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Roboto:400,700" rel="stylesheet">
</head>
<body onscroll="BackToTop()" id="top">
	<div class="image-container">
		<div class="main-nav">
			<ul>
				<li onclick="ScrollTop('.about-container')"><a>Over Mij</a></li>
				<li onclick="ScrollTop('.muziek-container')"><a>Muziek</a></li>
				<li onclick="ScrollTop('')"><a>Optredens</a></li>
				<li onclick="ScrollTop('')"><a>Nieuws</a></li>
			</ul>
		</div>
		
		<div class="down-arrow">
			<img src="img/iconscrolldown.png" onclick="ScrollTop('.about-container')">
		</div>
	</div>
	
	<div class="about-container" id="about">
		<h1>Over Mij</h1>
	</div>
	
	<div class="muziek-container" id="albums">
		<h1>Muziek</h1>
		
		<div class="muziek-sub-container">
			<div class="album-container">
			<h2>Nieuwste Album</h2>
				<div class="album">
					<?php 
						$sql = "SELECT * FROM album WHERE creation_date=(SELECT MAX(creation_date) FROM album)";
						$result = $connect->query($sql);
						
						$row = $result->fetch_assoc();
						$album = $row["id"];
					?>
					<img src="<?=$row["image"]?>">
					<div class="album-content">
						<h3>Nummertjes</h3>
						<ul>
						<?php
							$sql = "SELECT * FROM song WHERE album=".$album."";
							$result = $connect->query($sql);
							$count = 1;
							if($result->num_rows > 0){
							While($row = $result->fetch_assoc()){
							
						?>
							<li><?=$count?> <a href="<?=$row["spotify"] ?>" target="_blank"><?=$row["name"]?></a></li>
							<?php 
							$count = $count + 1;
								} 
							}	
							?>
						</ul>
					</div>
				</div>
				<h2>Nieuwste Single</h2>
				<div class="single">
					<?php 
						$sql = "SELECT * FROM song WHERE creation_date=(SELECT MAX(creation_date) FROM song)";
						$result = $connect->query($sql);
						$count = 1;
						$row = $result->fetch_assoc();
					?>
					<img src="<?=$row["image"]?>">
					<div class="single-content">
						1 <a href="<?=$row["spotify"] ?>" target="_blank"><?=$row["name"]?></a>
					</div>
				</div>
			</div>
			
			<div class="spotify-container">
				<iframe src="https://open.spotify.com/embed/album/0m2tQ4VMcAr9x6nzQidxiR" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
				<iframe src="https://open.spotify.com/embed/album/4FL7TnpQrKsPA4mWGdtQEM" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
			</div>
		</div>
		
	</div>
	
	<div class="news-container" id="news">
		<h1>Nieuws</h1>
			<?php include "news.php"; ?>			
	</div>
	
	<div id="topButton" >
		<img src="img/iconscroll2.png" onclick="ScrollTop('.main-nav')">
	</div>
	
	<div class="contact-container">
		<h1>Contact</h1>
		<div class="contact-container-box">
			<a><div class="contact-box">
				<img class="contact-box-img" src="img/phone-icon.png"/>
				<h2>tel: 06 43 43 84 47</h2>
			</div></a>
			<a href="mailto:d.kirsch@student.fontys.nl"><div class="contact-box">
				<img class="contact-box-img" src="img/mail-icon.png"/>
				<h2>timkoehoorn@live.nl</h2>
			</div></a>
			<a><div class="contact-box">
				<img class="contact-box-img" src="img/whatsapp-icon.png"/>
				<h2>06 43 43 84 47</h2>
			</div></a>
		</div>
	</div>
	
	<div class="footer">
		
	</div>
	
</body>

<footer>
	
<script>
	function ScrollTop(selector) {
        var el = document.querySelector(selector);
        el.scrollIntoView({behavior: "smooth", block: "start"});
		console.log(el);
    }
	
	function  BackToTop() {
		var top = document.getElementById('topButton');
		if(window.scrollY > 80) {
			top.style.display = "block";
		}
		else {
			top.style.display = "none";
		}
	}
</script>
</footer>
</html> 