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
			<h2 class="flex-content-header">Voeg een album toe</h2>
			<form class="flex-content-form" method="post" action="insert_music.php" enctype="multipart/form-data">
				<h2>Titel </h2><input class="content-form-text-title" type="text" name="title" />
				<h2>Foto </h2><input class="content-form-text-title" type="file" name="uploadedimage" />
				<h2>Spotify Link </h2><input class="content-form-text-title" type="text" name="spotifylink" />
				
				<table class="flex-song-table" id="songtable">
				<h3> Voeg liedjes toe </h3>
					<tr>
						<th>Titel</th>
						<th>Spotify link</th>
						<th></th>
					</tr>
					
					<tr id="songrow">
						<td><input type="text" name="songname[]" id="songname" /></td>
						<td><input type="text" name="song_spotifylink[]" id="song_spotifylink" /></td>
						<td class="add"><img class="flex-content-table-icon" id="addButton" src="img/addicon.png" onclick="addField(this)" /></td>
					</tr>
				</table>
				<input class="content-form-submit" type="submit">
			</form>
			<a href="cms_music.php?status=Toevoegen_album_geannuleerd!"><div class="flex-content-add-button">
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
			
		var count = 1;
		
		function addField(n){
			var tr = n.parentNode.parentNode.cloneNode(true);
			var rowId = 'songrow' + count;
			tr.id = rowId;
			count = count + 1;
			
			var rowLength = document.getElementById('songtable').rows.length;
			var highestRowIndex = rowLength - 1;
			
			var addButton = document.getElementById('addButton');
			var songName = document.getElementById('songname');
			var songSpotifyLink = document.getElementById('song_spotifylink');
			var songs = [songName, songSpotifyLink];
			console.log(songs);
			
			if(songName.value != '' && songSpotifyLink.value != ''){
				console.log(rowLength);
				console.log("highestrowindex " + highestRowIndex);
				document.getElementById('songtable').appendChild(tr);				
			}
			else{
				alert('Vul alle velden in voordat je een nieuw liedje wil gaan invullen.');
			}
			
		}
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