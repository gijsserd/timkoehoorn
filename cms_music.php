<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<?php require "elements/header_cms.php" ?>
<?php require "elements/error_cms.php" ?>
	<div class="flex-content">
		<table class="flex-content-table" >
			<tr class="flex-content-table-row">
				<th>Titel</th>
				<th>Aangemaakt op</th>
				<th></th>
				<th class="add"><a href="add_music.php"><img class="flex-content-table-icon" src="img/addicon.png" /></a></th>
			</tr>
		<?php
			$sql = "SELECT * FROM album";
			$result = $connect->query($sql);

				if($result->num_rows > 0){
				While($row = $result->fetch_assoc()){
					?><tr>
						<td><?=$row["name"]?></td>
						<td><?=$row["creation_date"]?></td>
						<td title="Edit"><a href="edit.php?id=<?=$row["id"]?>"><img src="img/editicon.png" class="flex-content-table-icon"/></a></td>
						<td title="Delete"><a href="delete.php?table=album&id=<?=$row['id']?>"><img src="img/deleteicon.png" class="flex-content-table-icon" /></a></td>
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