<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<?php require "elements/header_cms.php" ?>
<body>
	
	
		<div class="flex-content">
			<div class="flex-content-form-div">
			<h2 class="flex-content-header">Pas optreden aan</h2>
				<?php
				if (isset($_GET["id"])){
				$id = $_GET["id"];
				} else {
					header("Location: cms_article.php?status=Geen_artikel_gevonden!");
				}
				
				$sql = "SELECT * FROM performance WHERE id= ".$id."";
				$result = $connect->query($sql);

					if($result->num_rows > 0){
						While($row = $result->fetch_assoc()){ ?>
							<form class="flex-content-form" method="post" enctype="multipart/form-data">
								<h2>Naam: </h2><input class="content-form-text-title" type="text" name="name" value="<?=$row["name"]?>"  />
								<h2>desciption: </h2><textarea class="content-form-textarea" id="editor" type="textarea" name="description"><?=$row["description"]?></textarea>	
								<h2>Adres: </h2><input class="content-form-text-title" type="text" name="location" value="<?=$row["location"]?>" />
								<h2>Time: </h2><input id="time" type="time" name="time"  min="00:00" max="24:00" required pattern="[0-9]{2}:[0-9]{2}" value="<?=$row["date"]?>" />
								<h2>Date: </h2><input id="date" type="date" name="date" value="<?=$row["time"]?>">								
								<input name="update-button" class="content-form-submit" type="submit">
							</form>
						<?php }
						}else{
							header("Location: cms_optreden.php?status=Geen_artikel_gevonden!");
							$connect->close();	
						}
						
						if (isset($_POST["update-button"])){				
							$prep_stmt = $connect->prepare("UPDATE article SET 
							title = ?, content = ? WHERE id =".$id."");
							$prep_stmt->bind_param("ss", $title, $content);
							
							$title = $_POST["title"];
							$content = $_POST["content"];
							
							
							if($prep_stmt->execute()){
								$prep_stmt->close();
								$connect->close();
								header("Location: cms_optreden.php?status=Artikel_aangepast!");
							}else{
								header("Location: cms_optreden.php?status=Artikel_kon_niet_worden_aangepast!");
							}
							
							$prep_stmt->close();
							$connect->close();
						}
				?>
				<a href="cms_article.php?status=Aanpassen_artikel_geannuleerd!"><div class="flex-content-add-button">
				<h2> Aanpassen annuleren</h2>
				</div></a>
			</div>
		</div>	
</body>
<footer>
	<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
	<script>
		ClassicEditor
			.create( document.querySelector( '#editor' ), {
				toolbar: [ 'headings', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'image'],
				heading: {
					options: [
						{ modelElement: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
						{ modelElement: 'heading1', viewElement: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
						{ modelElement: 'heading2', viewElement: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
					]
				}
			} )
			.catch( error => {
			console.log( error );
		} );
	</script>
</footer>
<?php
			}
	else {
		header("Location: login.php");
		die;
	}
?>
</html> 