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
				<li onclick="ScrollTop('.optreden-container')"><a>Optredens</a></li>
				<li onclick="ScrollTop('.about-container')"><a>Over Mij</a></li>
				<li onclick="ScrollTop('.muziek-container')"><a>Muziek</a></li>
				<li onclick="ScrollTop('.news-container')"><a>Nieuws</a></li>
			</ul>
		</div>
		
		<div class="down-arrow">
			<img src="img/iconscrolldown.png" onclick="ScrollTop('.optreden-container')">
		</div>
	</div>
	
	<div class="optreden-container" id="optreden">
		<h1>Optredens</h1>
		<div class="optreden-sub-container">
			<div class="optreden-infobox">
				
					<?php 
						$sql = "SELECT * FROM performance ORDER By time DESC";
						$result = $connect->query($sql);
						
						if($result->num_rows > 0){
							$i = 0;
							While($row = $result->fetch_assoc()){
									if($i == 0){
										?>
										<div class="optreden-recent">
											<div class="optreden-recent-left">
												<h2>24:00</H2>
												<h2><?=$row["time"]?></h2>
											</div>
											<div class="optreden-recent-right">
												<h2><?=$row["name"]?></h2>
												<h3><?=$row["location"]?></h3>
												<p><?=$row["description"]?></p>
											</div>
										</div>
										<?php 
										$i = 1;
									}else{
										?>
										<div class="optreden">
											<div class="optreden-left">
												<h2>12:00</H2>
												<h2><?=$row["time"]?></h2>
											</div>
											<div class="optreden-right">
												<h2><?=$row["name"]?></h2>
												<h3><?=$row["location"]?></h3>
												<p><?=$row["description"]?></p>
											</div>
										</div>
										<?php 
									}
						
								} 
							}else{
								?>
								<div class="optreden-recent">
									<div class="optreden-recent-left">
										<h2>19:00</H2>
										<h2>0000-00-00</h2>
									</div>
									<div class="optreden-recent-right">
										<h2>geen optredens gevonden</h2>
										<p>geen optredens gevonden</p>
									</div>
								</div>
								<?php
							}	
					?>
				
			</div>
		</div>
	</div>
	
	<div class="about-container" id="about">
		<h1>Over Mij</h1>
		<div class="about-sub-container">
			<div class="about-left">
				<p>In sed sodales nunc. Nulla tortor lorem, scelerisque a orci non, mattis tincidunt nibh. In ut accumsan nulla. Cras eu odio dui. Nullam quam urna, convallis ut tortor eu, hendrerit accumsan massa. Quisque malesuada dictum diam a tristique. Aliquam scelerisque quis nisl eu fermentum. Ut eu finibus eros, nec sagittis leo. Sed porttitor, libero sit amet tempus tincidunt, nunc tellus dapibus lectus, eu iaculis velit nibh vel tortor.
				</p>
				<p>Aliquam laoreet, enim sed tincidunt aliquet, tellus elit semper lacus, semper efficitur massa nunc vehicula ex. Aliquam tristique vitae arcu quis hendrerit. Mauris accumsan elit id libero bibendum molestie. Aenean quam urna, cursus vitae condimentum id, finibus sit amet magna. In pellentesque faucibus nisl, id interdum tellus facilisis quis. Nam nec ex non lorem rhoncus vestibulum vitae nec nibh. Aenean in diam lobortis, tempus ex tincidunt, ultrices quam. Curabitur viverra diam eu diam facilisis tempus. Donec gravida, quam in vestibulum feugiat, felis diam accumsan tortor, sed pharetra est quam nec nibh. Donec at feugiat est, non vulputate sapien. Phasellus suscipit erat sit amet quam ultrices ultrices. In hendrerit efficitur malesuada. Phasellus quis dolor vitae nisi bibendum varius. In hac habitasse platea dictumst. Fusce vel est consectetur, condimentum diam ac, rhoncus quam. Integer ac massa erat.
				</p>
				<p>Morbi congue scelerisque risus vel cursus. Aliquam ut leo venenatis, laoreet arcu quis, pellentesque diam. Fusce ut felis risus. Phasellus diam metus, pellentesque hendrerit pretium ac, luctus eget dolor. Mauris viverra magna eu pulvinar pharetra. Pellentesque blandit tellus nec aliquet scelerisque. Suspendisse vel massa in arcu fermentum commodo.
				</p>
			</div>
			<div class="about-right">
				<img src="img/Tim koehoorn noback 3.png" />
			</div>
		</div>
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
		<a class="news-container-a	" href="news_page.php"><h2>Alle nieuws artikelen ></h2></a>
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