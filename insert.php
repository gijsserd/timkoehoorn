<?php
require "connect.php";
session_start();

	if (isset($_SESSION['username'])){
		
		$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
		$result = $connect->query($sql);
				
		if($result->num_rows > 0){
			While($row = $result->fetch_assoc()){
				$author = $row['id'];
			}
		}else{
			echo "false";
		}
		

		$prep_stmt = $connect->prepare("INSERT INTO `article`(`title`, `content`, `author`) 
		VALUES (?, ?, ?)");
		$prep_stmt->bind_param("ssi", $title, $content, $author);
		
		$title = $_POST['title']; 
		$content = $_POST['content'];
		
		if ($prep_stmt->execute() === TRUE) {
			echo "<p>New record created successfully</p>";
			$prep_stmt->close();
			$connect->close();
			header("location: cms_article.php?status=Nieuw_artikel_aangemaakt!");
		} else {
			echo "Error: " . $prep_stmt . "<br>" . $conn->error;
		}
		$prep_stmt->close();
		$connect->close();

	} else {
		$connect->close();	
		header("Location: login.php");
		die;
	}
?>