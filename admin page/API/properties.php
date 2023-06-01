<?php
    include("../../config.php");

    if ($_POST['action'] && $_POST['id']) {
        $id = $_POST['id'];

        $db_barang = mysqli_query($status, "SELECT * FROM umkm_db WHERE id_umkm='$id'");
        $arr = mysqli_fetch_array($db_barang);

        // if admin want to accept
        if($_POST['action'] == 'yes'){
            $query_update = mysqli_query($status,
            "
            UPDATE umkm_db
            SET status=1
            WHERE id_umkm=$id;
            "
            );  
        }

        // if admin not want to accept
        else if($_POST['action'] == 'no'){
            $query_update = mysqli_query($status,
            "
            UPDATE umkm_db
            SET status=2
            WHERE id_umkm=$id;
            "
            ); 
        }

        // if admin want to delete
        else if($_POST['action'] == 'del'){
            $query_update = mysqli_query($status,
            "DELETE FROM umkm_db WHERE id_umkm=$id;"
            );
        }

        if($query_update){
            header("location: ../index_admin.php");
        }else{
            echo "Data gagal diedit. Klik <a href='../index_admin.php'>di sini</a> untuk melanjutkan";
        }
    }
?>