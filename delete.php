<?php
require "connect.php";
session_start();

	if (isset($_SESSION['username'])){
			
		$table = $_GET['table'];
		$id = $_GET['id'];

		echo "tablename = ";
		echo $table;
		echo "\nid = ";
		echo $id;
		
		$sql = "DELETE FROM ".$table." WHERE id = ".$id."";
		if($connect->query($sql) == true) {
			$connect->close();
			if($table == 'article'){
				header("location: cms_article.php?status=Met_succes_verwijderd!");
			}
			else{
				header("location: cms_music.php?status=Met_succes_verwijderd!");
			}
		}else{
			if($table == 'article'){
				header("location: cms_article.php?status=Er_is_iets_mis_gegaan_tijdens_het_verwijderen_van_het_artikel!");
			}
			else{
				header("location: cms_music.php?status=Er_is_iets_mis_gegaan_tijdens_het_verwijderen_van_het_album!");
			}
		}
	} else {
		$connect->close();	
		header("Location: login.php");
		die;
	}
?>
