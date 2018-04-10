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
	<p>Logged in as <?php echo $_SESSION['username']; ?> </p>
	<a href="logout.php">Logout</a>
</header>
<body>
	<div class="content-grid">
		<div class="content-left">
			<table class="content-table" >
				<tr class="content-table-row">
					<th>Titel</th>
					<th>Aangemaakt op</th>
					<th>Laatst bewerkt op</th>
					<th>auteur</th>
					<th></th>
					<th></th>
				</tr>
				
			<?php
				$sql = "SELECT * FROM article";
				$result = $connect->query($sql);

					if($result->num_rows > 0){
					While($row = $result->fetch_assoc()){
						?><tr>
							<td><?=$row["title"]?></td>
							<td><?=$row["creation_date"]?></td>
							<td><?=$row["update_date"]?></td>
							<td><?=$row["author"]?></td>
							<td><a href=""><img src=""/></a></td>
							<td onclick="ConfirmDel('<?=$row["title"]?>')"><a href=""><img src="img/deleteicon.png" /></a></td>
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
		<div class="content-right">
		</div>
	</div>
</body>
<footer>
<script>
	$(document).ready(function()
	{
	  $("tr:odd").css({
		"background-color":"#c7c7c7",
		});
	});
	
	function ConfirmDel(id){
		console.log("Delete function started");
		if (confirm('Weet je zeker dat je het volgende artikel wilt verwijderen?\n ' + id)) {
			window.location.replace("delete.php");
			console.log("Delete succes");
		} else {
			console.log("Delete canceled");
		}
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