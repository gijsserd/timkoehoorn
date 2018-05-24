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
		
		$UploadedFileName=$_FILES['uploadedimage']['name'];
		if($UploadedFileName!='')
		{
			$upload_directory = "img/";
			$TargetPath=time().$UploadedFileName;
			if(move_uploaded_file($_FILES['uploadedimage']['tmp_name'], $upload_directory.$TargetPath)){
				$prep_stmt = $connect->prepare("INSERT INTO `album`(`name`, `image`, `creation_date`, `spotify`) 
				VALUES (?, ?, ?, ?)");
				$prep_stmt->bind_param("ssis", $title, $image, $currentdate, $spotify);
				
				$title = $_POST["title"]; 
				$spotify = $_POST["spotifylink"];
				$image =  $upload_directory.$TargetPath;
				$currentdate = date('m/d/Y');
			}
		}else{
			$prep_stmt = $connect->prepare("INSERT INTO `album`(`name`, `creation_date`, `spotify`) 
			VALUES (?, ?, ?)");
			$prep_stmt->bind_param("ssi", $title, $currentdate, $spotify);
			
			$title = $_POST["title"]; 
			$spotify = $_POST["spotifylink"];
			$currentdate = date('m/d/Y');
		}
		
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