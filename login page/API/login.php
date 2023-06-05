<?php
	include("../../config.php");
    
    session_start();

    if(isset($_SESSION['uname'])){
        // if the account has admin access
        if($_SESSION['access'] == 0){
            header("location: ../../admin page/index_admin.php");
        }
        // if the account doesnt has admin access
        else{
            header("location: ../../owner page/index_owner.php?id=${_SESSION['id_user']}");
        }
    }
    else{
        $db = mysqli_query($status, "select * from user_db");

        $uname = $_POST["uname"];
        $pw = $_POST["pw"];
    
        $count = 0;
    
        // check each item in database
        while($arr = mysqli_fetch_array($db)){
    
            // if found
            if($uname == $arr['nama'] && $pw == $arr['pass']){
                $count = 1;

                $_SESSION['uname'] = $arr['nama'];
                $_SESSION['access'] = $arr['access'];
                $_SESSION['id_user'] = $arr['id_user'];
                header("location: login.php");
            }
        }
        
        // if there is no account or wrong username/pw
        if($count == 0){
            header("location: ../login.html");
            session_destroy();
        }  
    }
?>