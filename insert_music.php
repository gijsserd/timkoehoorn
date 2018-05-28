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
				$prep_stmt = $connect->prepare("INSERT INTO `album`(`name`, `image`, `spotify`) 
				VALUES (?, ?, ?)");
				$prep_stmt->bind_param("sss", $title, $image, $spotify);
				
				$title = $_POST["title"]; 
				$spotify = $_POST["spotifylink"];
				$image =  $upload_directory.$TargetPath;
			}
		}else{
			$prep_stmt = $connect->prepare("INSERT INTO `album`(`name`, `spotify`) 
			VALUES (?, ?)");
			$prep_stmt->bind_param("ss", $title, $spotify);
			
			$title = $_POST["title"]; 
			$spotify = $_POST["spotifylink"];
		}
		
		if ($prep_stmt->execute() === TRUE) {
			echo "<p>New record created successfully</p>";
			$prep_stmt->close();
			$connect->close();
			header("location: cms_music.php?status=Nieuw_Album_aangemaakt!");
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