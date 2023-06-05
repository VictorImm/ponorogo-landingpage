<?php
	include("../config.php");
    $id = $_GET['id'];

	$db = mysqli_query($status, "select * from umkm_db where id_umkm = '$id'");
    $data = mysqli_fetch_array($db);

    session_start();

    if(isset($_SESSION['uname'])){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width-device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="style_owner.css">
                <title>Edit UMKM</title>
                <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
            </head>
            <body>
                <div class="table">
                    <div class="table-header">
                        <p>Owner Dashboard</p>
                        <a class="btn-back" href="index_owner.php?id=<?=$id?>">Back</a>
                    </div>

                    <div class="form-section">
                        <div class="title">Edit data</div>
                        <form method="post" name="edit" action="API/properties.php">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Nama UMKM</span>
                                    <input type="text" name="namaUMKM" value="<?=$data['umkm']?>" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Lokasi</span>
                                    <input type="text" name="loc" value="<?=$data['lokasi']?>" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Produk UMKM</span>
                                    <select name="produk" required>
                                        <!-- to add more -->
                                        <option value="Makanan" <?php if($data['produk']=="Makanan") echo "selected"?>>Makanan</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <span class="details">Nomor Telp</span>
                                    <input type="text" name="telp" value="<?=$data['telp']?>" required>
                                </div>
                            </div>

                            <div class="user-details-long">
                                <div class="input-box">
                                    <span class="details">Deskripsi UMKM</span>
                                    <textarea name="detail" required><?=$data['deskripsi']?></textarea>
                                </div>
                            </div>

                            <button class="btn" name="action" value="edit-data">Update</button>

                            <!-- Passing id -->
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        </form>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
    else{
        header("location: ../login page/login.html");
    }
?>