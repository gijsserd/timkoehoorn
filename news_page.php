<html>
<head>
	<title>Tim Koehoorn</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Roboto:400,700" rel="stylesheet">
</head>

<header class="news-page-header">
	<a href="index.php#news"><h2>< Terug</h2></a>
	<a href="news_page.php"><h2>Alle nieuws artikelen ></h2></a>
</header>
<body>
<?php
require "connect.php";

if (isset($_GET['news_id'])){
	$id = $_GET['news_id'];
	
	$sql = "SELECT content, id, title, image FROM article WHERE id = $id";
	$result = $connect->query($sql);
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
	?>
	<div class="news-page">
		<img class="news-page-img" src="<?=$row['image']?>"/>
		<h2><?=$row['title']?></h2>
		<p><?=$row['content']?></p>
	</div>
<?php
		}
	}else{
		echo "Geen artikel gevonden";
	}
}
else {
	$sql = "SELECT LEFT (content, 200), id, title, image FROM article ORDER BY creation_date DESC ";
	$result = $connect->query($sql);
	?>
	<div class="news-page-container">
	<?php
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$content = $row['LEFT (content, 200)']."...";
		?>
			<div class="news-article-item">
				<div class="news-article-item-img">
					<img src="<?=$row['image']?>"/>
				</div>
				<div class="news-article-item-txt">
					<h2><?=$row['title']?></h2>
					<p><?=$content?></p> 
					</div>
				<div class="news-article-item-link">
					<a href="news_page.php?news_id=<?=$row['id']?>"><p>Lees meer...</p></a>
				</div>
			</div>
	<?php
			}
		}
	?>
	</div>
	<?php
}
$connect->close();
?>
</body>
</html>