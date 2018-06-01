<?php
require "connect.php";
session_start();

	if (isset($_SESSION['username'])){
		
		
			$prep_stmt = $connect->prepare("INSERT INTO `performance`(`name`, `description`, `location`, `time`, `date`) 
			VALUES (?, ?, ?, ?, ?)");
			$prep_stmt->bind_param("sssss", $name, $description, $location, $time, $date);
			
			$name = $_POST["name"]; 
			$description = $_POST["description"];
			$location = $_POST["location"];
			$date = $_POST["time"]; 
			$time = $_POST["date"]; 
		
		if ($prep_stmt->execute() === TRUE) {
			echo "<p>New record created successfully</p>";
			$prep_stmt->close();
			$connect->close();
			header("location: cms_optreden.php?status=Nieuw_optreden_aangemaakt!");
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