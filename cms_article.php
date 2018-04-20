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
	
	<div class="flex-content">
	<table class="flex-content-table" >
				<tr class="flex-content-table-row">
					<th></th>
					<th>Titel</th>
					<th>Aangemaakt op</th>
					<th>Laatst bewerkt op</th>
					<th>auteur</th>
					<th></th>
					<th class="add"><a href="add.php"><img class="flex-content-table-icon" src="img/addicon.png" /></a></th>
				</tr>
				
			<?php
				$sql = "SELECT * FROM article";
				$result = $connect->query($sql);

					if($result->num_rows > 0){
					While($row = $result->fetch_assoc()){
						?><tr>
							<td><img class="flex-content-table-img" src="<?=$row['image']?>"/></td>
							<td><?=$row["title"]?></td>
							<td><?=$row["creation_date"]?></td>
							<td><?=$row["update_date"]?></td>
							<td><?=$row["author"]?></td>
							<td title="Edit">
									<a href="edit.php?id=<?=$row["id"]?>"><img class="flex-content-table-icon" src="img/editicon.png"/></a></td>
							<td onclick="ConfirmDel('<?=htmlspecialchars($row["title"])?>', 'article', '<?=$row["id"]?>')" title="Delete">
								<a href=""><img class="flex-content-table-icon" src="img/deleteicon.png" /></a></td>
						</tr>
						<?php }
						}else{ ?>
						<tr>
							<td>no data found</td>
							<td>no data found</td>
							<td>no data found</td>
							<td>no data found</td>
						</tr>
						<?php }
					$connect->close();					
			?>
	</table>
	</div>
</body>
<footer>
<script>
	var host = '<?=$_SERVER["HTTP_HOST"]?>';

	$(document).ready(function()
	{
	  $("tr:odd").css({
		"background-color":"#e7e7e7",
		});
	});
	
	function ConfirmDel(titel, table, id){
		console.log("Delete function started");
		console.log(host);
		console.log(window.location);
		if (host == 'localhost') {
			host = 'http://localhost/timkoehoorn';
		}
		
		if (confirm('Weet je zeker dat je het volgende artikel wilt verwijderen?\n ' + titel)) {
			var location = host + "/delete.php?table=" + table + "&id=" + id;
			console.log(location);
			document.location.href = location;
			console.log(window.location);			
			console.log("Delete succes");
		} else {
			console.log("Delete canceled");
		}
	}
	
	function Error() {
		console.log("function 'Error' started");
		
		if(document.location.search === ""){
			document.getElementById("error").style.display = "none";
			console.log("returned true. no querystring given.");
		}else if(document.location.search.split('=')[0] === "?status" ){
			var error_message = document.location.search.split('=')[1];
			var message = error_message.split("_").join(" ");
			document.getElementById("error-msg").innerHTML = message;
			console.log("returned false. '?status' found.");
		}
	}
		
	function ErrorRemove() {
		document.getElementById("error").style.display = "none";
	}
	
	</script>
</footer>
<?php
			}
	else {
		$connect->close();	
		header("Location: login.php");
		die;
	}
?>
</html> 