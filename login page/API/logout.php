<?php
    session_start();

    if(isset($_SESSION['uname'])){
        session_destroy();
        header("location: ../login.html");
    }
    else{
        header("location: ../login.html");
    }
?>