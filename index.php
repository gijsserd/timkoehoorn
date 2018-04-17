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
				
					<img src="img/ihebil.jpg">
					<div class="album-content">
						<h3>Nummertjes</h3>
						<ul>
							<li>1. <a href="https://open.spotify.com/track/00dLqGsbVdTssDHl4towiN?si=0KUpIeAeTROJhkGdqiaa5Q" target="_blank">Liefdesliedjes</a></li>
							<li>2. <a href="https://open.spotify.com/track/5X6IXCOlzcJyJcYEUAepYE?si=4lDDVTxoRJGGhF02aKA3YA" target="_blank">In Het Echt Ben Ik Leuker</a></li>
							<li>3. <a href="https://open.spotify.com/track/1rSTBTRmp3R0nsYJQGZeDu?si=ANIv9XqjT5uqA5aRI4Iq5Q" target="_blank">Voor David</a></li>
							<li>4. <a href="https://open.spotify.com/track/5O2rOyBVD5dIDXrBKAdUQv?si=qQzjobc_R-qR8B53idKyRA" target="_blank">Ik Uit Mijn Frustratie Middels Alcohol en Popmuziek</a></li>
							<li>5. <a href="https://open.spotify.com/track/6loTySK5j0Zk0VHbKfePrr?si=OQsfD3JNT1SGB67D3uZUNw" target="_blank">Brief Aan Bart, Pascal en Iris</a></li>
						</ul>
					</div>
				</div>
				<h2>Nieuwste Single</h2>
				<div class="single">
					
					<img src="img/hgdskommp.jpg">
					<div class="single-content">
						<p>rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna. Nullam eget libero non lacus maximus posuere vel nec dui.
						Morbi consectetur diam eu aliquam suscipit. Nullam sed mauris quis odio malesuada fringilla. Integer lacus justo, gravida quis magna eget, accumsan consequat dui.
						Maecenas blandit purus ut venenatis malesuada.
						</p>
					</div>
				</div>
			</div>
			
			<div class="spotify-container">
				<iframe src="https://open.spotify.com/embed/artist/7y5DunkoStbLnIwfVR91T2" width="400" height="400" frameborder="0" allowtransparency="true"></iframe>
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
		<div class="contact-left-box">
		</div>
	</div>
	
</body>

<footer>
	
<script>
	function ScrollTop(selector) {
        var el = document.querySelector(selector);
        el.scrollIntoView({behavior: "smooth", block: "center"});
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