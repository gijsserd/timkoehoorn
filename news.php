<?php
	require "connect.php";

	$sql = "SELECT LEFT (content, 200), id, title, image FROM article ORDER BY creation_date DESC LIMIT 3";
	$result = $connect->query($sql);
	
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
	}else{
	?>
		<div class="news-article-item">
			<div class="news-article-item-img">
				<img src="img/no-news-found.jpg"/>
			</div>
			<div class="news-article-item-txt">
				<h2>Geen nieuws gevonden!</h2>
				<p>Geen nieuws gevonden!</p> 
				</div>
			<div class="news-article-item-link">
				<a href=""><p>Geen nieuws gevonden!</p></a>
			</div>
		</div>
	<?php
	}
	
	$connect->close();
?>
	
	