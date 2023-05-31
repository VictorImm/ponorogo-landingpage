<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "fp_pemweb";
	
	$status = mysqli_connect($server, $user, $password, $database);
	
	if(!$status){
		die("Gagal terhubung dengan db : " . mysqli_connect_error());
	}
	else{
		//echo("connecting...");
	}
?>