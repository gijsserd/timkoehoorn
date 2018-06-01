<head>
	<title>CMS</title>
	<link rel="stylesheet" type="text/css" href="css/cms_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
</head>
<header>
	<a href="cms.php">Back</a>
	<p>Logged in as <?php echo $_SESSION['username']; ?> </p>
	<a href="logout.php">Logout</a>
</header>
<body onload="Error()">
	<div class="error-display" id="error">
		<h2></h2>
		<h2 class ="error-msg" id="error-msg">error: </h2>
		<img onclick="ErrorRemove()" class="error-close-button" src="img/closeicon.png"/>
	</div>