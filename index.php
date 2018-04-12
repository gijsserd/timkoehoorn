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
				<li onclick="ScrollTop('.album-container')"><a>Albums</a></li>
				<li onclick="ScrollTop('')"><a>Optredens</a></li>
				<li onclick="ScrollTop('')"><a>Nieuws</a></li>
			</ul>
		</div>
	</div>
	
	<div class="about-container" id="about">
		<h1>Over Mij</h1>
	</div>
	
	<div class="album-container" id="albums">
		<h1>Muziek</h1>
		<div class="spotify-container">
			<iframe src="https://open.spotify.com/embed/artist/7y5DunkoStbLnIwfVR91T2" width="400" height="400" frameborder="0" allowtransparency="true"></iframe>
		</div>

		<div class="album">
			
		</div>
	</div>
	
	<div id="topButton">
		<img src="img/iconscroll2.png" onclick="ScrollTop('.main-nav')">
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