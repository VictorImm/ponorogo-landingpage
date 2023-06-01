<?php
    include("../../config.php");

    if ($_POST['action'] && $_POST['id']) {
        $id = $_POST['id'];

        // if user want to edit
        if($_POST['action'] == 'edit'){

        }
        
        // if user want to delete
        else if($_POST['action'] == 'del'){
            $db_barang = mysqli_query($status, "SELECT * FROM umkm_db WHERE id_umkm='$id'");
            $arr = mysqli_fetch_array($db_barang);
            $id_user = $arr['id_user'];

            $query_delete = mysqli_query($status,
            "DELETE FROM umkm_db WHERE id_umkm=$id;"
            );

            if($query_delete){
                header("location: ../index_owner.php?id=$id_user");
            }else{
                echo "Data gagal dihapus. Klik <a href='../index_owner.php?id=$id_user'>di sini</a> untuk melanjutkan";
            }
        }
    }
?>