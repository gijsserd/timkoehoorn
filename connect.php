<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['HTTP_HOST'] == 'i325032.hera.fhict.nl'){
$server = "studmysql01.fhict.local";
$username = "";
$password = "";
$databasename = "";
}
else {
	$server = "localhost";
	$username = "root";
	$password = "";
	$databasename = "portfolio";
}
$connect = new mysqli($server, $username, $password, $databasename);
if ($connect->connect_error){
	die("Connection failed" . $connect->connect_error);
}

?>