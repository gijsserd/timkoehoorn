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
	
	<div class="news-container" id="news">
		<h1>Nieuws</h1>
		<div class="news-scroll-box">
			<div class="news-article">
				<h2>Test Titel 1</h2>
				<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis. Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna. Nullam eget libero non lacus maximus posuere vel nec dui. Morbi consectetur diam eu aliquam suscipit. Nullam sed mauris quis odio malesuada fringilla. Integer lacus justo, gravida quis magna eget, accumsan consequat dui. Maecenas blandit purus ut venenatis malesuada. Praesent ac lacus mollis, porta eros eget, pretium libero. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Donec vel erat sit amet neque maximus accumsan. Pellentesque porta tempor dui, et lobortis diam mattis a. Suspendisse at pretium enim, eget dapibus purus. </p>
				
			</div>
			<div class="news-article">
				<h2>Test Titel 1</h2>
				<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis. Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna. Nullam eget libero non lacus maximus posuere vel nec dui. Morbi consectetur diam eu aliquam suscipit. Nullam sed mauris quis odio malesuada fringilla. Integer lacus justo, gravida quis magna eget, accumsan consequat dui. Maecenas blandit purus ut venenatis malesuada. Praesent ac lacus mollis, porta eros eget, pretium libero. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Donec vel erat sit amet neque maximus accumsan. Pellentesque porta tempor dui, et lobortis diam mattis a. Suspendisse at pretium enim, eget dapibus purus. </p>
				
			</div>
			<div class="news-article">
				<h2>Test Titel 1</h2>
				<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis. Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna. Nullam eget libero non lacus maximus posuere vel nec dui. Morbi consectetur diam eu aliquam suscipit. Nullam sed mauris quis odio malesuada fringilla. Integer lacus justo, gravida quis magna eget, accumsan consequat dui. Maecenas blandit purus ut venenatis malesuada. Praesent ac lacus mollis, porta eros eget, pretium libero. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Donec vel erat sit amet neque maximus accumsan. Pellentesque porta tempor dui, et lobortis diam mattis a. Suspendisse at pretium enim, eget dapibus purus. </p>
				
			</div>
			<div class="news-article">
				<h2>Test Titel 1</h2>
				<p>Quisque lobortis leo et lectus sollicitudin, vel mattis augue venenatis. Mauris rutrum vulputate quam, et venenatis lectus dapibus vel. Sed rutrum enim magna. Nullam eget libero non lacus maximus posuere vel nec dui. Morbi consectetur diam eu aliquam suscipit. Nullam sed mauris quis odio malesuada fringilla. Integer lacus justo, gravida quis magna eget, accumsan consequat dui. Maecenas blandit purus ut venenatis malesuada. Praesent ac lacus mollis, porta eros eget, pretium libero. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Donec vel erat sit amet neque maximus accumsan. Pellentesque porta tempor dui, et lobortis diam mattis a. Suspendisse at pretium enim, eget dapibus purus. </p>
				
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