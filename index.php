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
				<div class="album">
					
				</div>
			</div>
			<div class="spotify-container">
				<iframe src="https://open.spotify.com/embed/artist/7y5DunkoStbLnIwfVR91T2" width="400" height="400" frameborder="0" allowtransparency="true"></iframe>
			</div>
		</div>
		
	</div>
	
	<div class="news-container" id="news">
		<h1>Nieuws</h1>
			<div class="news-article-item">
				<div class="news-article-item-img">
					<img src="img/template-news-1.jpg"/>
				</div>
				<div class="news-article-item-txt">
					<h2>Optreden cafe buutvrij!</h2>
					<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis.
					Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna.</p> 
					</div>
				<div class="news-article-item-link">
					<p>lees meer...</p>
				</div>
			</div>
			<div class="news-article-item">
				<div class="news-article-item-img">
					<img src="img/template-news-2.jpg"/>
				</div>
				<div class="news-article-item-txt">
					<h2>Recap: concert</h2>
					<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis.
					Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna.</p> 
					</div>
				<div class="news-article-item-link">
					<p>lees meer...</p>
				</div>
			</div>
			<div class="news-article-item">
				<div class="news-article-item-img">
					<img src="img/template-news-3.jpg"/>
				</div>
				<div class="news-article-item-txt">
					<h2>Nieuwe foto's!</h2>
					<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis.
					Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna.</p> 
					</div>
				<div class="news-article-item-link">
					<p>lees meer...</p>
				</div>
			</div>
			
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