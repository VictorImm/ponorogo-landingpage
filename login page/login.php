<?php
	include("../config.php");
    
	$db = mysqli_query($status, "select * from user_db");

    $uname = $_POST["uname"];
    $pw = $_POST["pw"];

    $count = 0;

    // check each item in database
    while($arr = mysqli_fetch_array($db)){

        // if found
        if($uname == $arr['nama'] && $pw == $arr['pass']){

            // if the account has admin access
            if($arr['access'] == 0){
                header("location: ../admin page/index_admin.html");
            }
            // if the account doesnt has admin access
            else{
                header("location: ../owner page/index_owner.html");
            }
            $count = 1;
        }
    }
    
    // if there is no account or wros username/pw
    if($count == 0){
        header("location: login.html");
    }
?>