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
			elseif($table == 'album'){
				header("location: cms_music.php?status=Met_succes_verwijderd!");
			}
			else{
				header("location: cms_optreden.php?status=Met_succes_verwijderd!");
			}
		}else{
			if($table == 'article'){
				header("location: cms_article.php?status=Er_is_iets_mis_gegaan_tijdens_het_verwijderen_van_het_artikel!");
			}
			elseif($table == 'album'){
				header("location: cms_music.php?status=Er_is_iets_mis_gegaan_tijdens_het_verwijderen_van_het_album!");
			}
			else{
				header("location: cms_optreden.php?status=Er_is_iets_mis_gegaan_tijdens_het_verwijderen_van_het_optreden!");
			}
		}
	} else {
		$connect->close();	
		header("Location: login.php");
		die;
	}
?>
