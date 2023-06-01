<?php
    include("../../config.php");

    $id = $_GET['id'];
    $db_user = mysqli_query($status, "select * from user_db where id_user = '$id'");

    $arr = mysqli_fetch_array($db_user);
    $owner = $arr['nama'];
    
    $umkm = $_POST["namaUMKM"];
    $loc = $_POST["loc"];
    $produk = $_POST["produk"];
    $telp = $_POST["telp"];
    $detail = $_POST["detail"];
    $img = $_POST["foto"];
    $stat = 0;

    $query = mysqli_query($status,
	"
	INSERT INTO umkm_db(
        owner, 
        umkm, 
        lokasi, 
        produk, 
        telp, 
        deskripsi, 
        foto, 
        status, 
        id_user
        )
	VALUES(
        '$owner', 
        '$umkm', 
        '$loc', 
        '$produk', 
        '$telp', 
        '$detail', 
        '$img', 
        '$stat', 
        '$id'
        )
	"
	);
	
	if($query){
		header("location: ../index_owner.php?id=$id");
	}else{
		echo "Data gagal disimpan. Klik <a href='../index_owner.php?id=$id'>di sini</a> untuk melanjutkan";
	}
?>