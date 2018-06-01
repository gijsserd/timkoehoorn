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
<?php require 'elements/footer.php'; ?>
<?php
			}
	else {
		$connect->close();	
		header("Location: login.php");
		die;
	}
?>
</html> 