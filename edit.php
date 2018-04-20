<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title>CMS</title>
	<link rel="stylesheet" type="text/css" href="css/cms_style.css">
</head>
<header>
	<p>Logged in as <?php echo $_SESSION['username'] ?> </p>	
	<a href="logout.php">Logout</a>
</header>
<body>
	
	
		<div class="flex-content">
			<div class="flex-content-form-div">
			<h2 class="flex-content-header">Schrijf een artikel</h2>
				<?php
				if (isset($_GET["id"])){
				$id = $_GET["id"];
				} else {
					header("Location: cms_article.php?status=Geen_artikel_gevonden!");
				}
				
				$sql = "SELECT * FROM article WHERE id= ".$id."";
				$result = $connect->query($sql);

					if($result->num_rows > 0){
						While($row = $result->fetch_assoc()){ ?>
							<form class="flex-content-form" method="post" enctype="multipart/form-data">
								<h2>Titel: </h2><input value="<?=$row["title"]?>" class="content-form-text-title" type="text" name="title" />
								<h2>Inhoud: </h2><textarea class="content-form-textarea" id="editor" type="textarea" name="content"><?=$row["content"]?></textarea>	
								<input name="update-button" class="content-form-submit" type="submit">
							</form>
						<?php }
						}else{
							header("Location: cms_article.php?status=Geen_artikel_gevonden!");
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
								header("Location: cms_article.php?status=Artikel_aangepast!");
							}else{
								header("Location: cms_article.php?status=Artikel_kon_niet_worden_aangepast!");
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