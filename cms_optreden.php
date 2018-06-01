<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<?php require "elements/header_cms.php" ?>
	<div class="flex-content">
		<table class="flex-content-table" >
			<tr class="flex-content-table-row">
				<th>Naam</th>
				<th>Beschrijving</th>
				<th>Locatie</th>
				<th>Datum</th>
				<th></th>
				<th class="add"><a href="add_music.php"><img class="flex-content-table-icon" src="img/addicon.png" /></a></th>
			</tr>
		<?php
			$sql = "SELECT * FROM performance";
			$result = $connect->query($sql);

				if($result->num_rows > 0){
				While($row = $result->fetch_assoc()){
					?><tr>
						<td><?=$row["name"]?></td>
						<td><?=$row["description"]?></td>
						<td><?=$row["location"]?></td>
						<td><?=$row["time"]?></td>
						<td title="Edit"><a href="edit.php?id=<?=$row["id"]?>"><img src="img/editicon.png" class="flex-content-table-icon"/></a></td>
						<td onclick="ConfirmDel('<?=$row["name"]?>', 'album', '<?=$row["id"]?>')" title="Delete"><a href=""><img src="img/deleteicon.png" class="flex-content-table-icon" /></a></td>
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
<?php require 'elements/footer_cms.php'; ?>
<?php
			}
	else {
		$connect->close();	
		header("Location: login.php");
		die;
	}
?>
</html> 