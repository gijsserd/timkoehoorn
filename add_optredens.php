<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<?php require "elements/header_cms.php" ?>
<body>
	<div class="flex-content">
		<div class="flex-content-form-div">
			<h2 class="flex-content-header">Voeg optreden toe</h2>
			<form class="flex-content-form" method="post" action="insert_optredens.php" enctype="multipart/form-data">
				<h2>Titel: </h2><input class="content-form-text-title" type="text" name="name" />
				<h2>desciption: </h2><textarea class="content-form-textarea" id="editor" type="textarea" name="description"></textarea>	
				<h2>Adres: </h2><input class="content-form-text-title" type="text" name="location" />
				<h2>Time: </h2><input id="time" type="time" name="time"  min="00:00" max="24:00" required pattern="[0-9]{2}:[0-9]{2}">
				<h2>Date: </h2><input id="date" type="date" name="date">
				<input class="content-form-submit" type="submit">
			</form>
			<a href="cms_optreden.php?status=Toevoegen_optreden_geannuleerd!"><div class="flex-content-add-button">
				<h2> Toevoegen annuleren</h2>
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