<?php
    include("../../config.php");

    if ($_POST['action'] && $_POST['id']) {
        $id = $_POST['id'];

        $db_barang = mysqli_query($status, "SELECT * FROM umkm_db WHERE id_umkm='$id'");
        $arr = mysqli_fetch_array($db_barang);
        $id_user = $arr['id_user'];

        // if user want to edit
        if($_POST['action'] == 'edit'){
            header("location: ../edit_owner.php?id=$id");
        }
        else if($_POST['action'] == 'edit-data'){
            $umkm = $_POST["namaUMKM"];
            $loc = $_POST["loc"];
            $produk = $_POST["produk"];
            $telp = $_POST["telp"];
            $detail = $_POST["detail"];

            $query_update = mysqli_query($status,
            "
            UPDATE umkm_db
            SET
                umkm='$umkm', 
                lokasi='$loc', 
                produk='$produk', 
                telp='$telp', 
                deskripsi='$detail'
            WHERE id_umkm='$id';
            "
            );
            
            if($query_update){
                header("location: ../index_owner.php?id=$id_user");
            }else{
                echo "Data gagal diperbarui. Klik <a href='../edit_owner.php?id=$id_user'>di sini</a> untuk melanjutkan";
            }
        }
        
        // if user want to delete
        else if($_POST['action'] == 'del'){         
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