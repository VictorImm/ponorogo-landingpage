<?php
	include("../config.php");

	$uname = $_POST["uname"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
    $access = 1;

	$query = mysqli_query($status,
	"
	INSERT INTO user_db(nama, email, pass, access)
	VALUES('$uname', '$email', '$pass', '$access')
	"
	);

	if($query){
		header("location: login.html");
	}else{
		echo "User gagal dibuat. Klik <a href='login.html'>di sini</a> untuk melanjutkan";
	}
?>