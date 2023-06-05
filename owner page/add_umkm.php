<?php
	include("../config.php");
    $id = $_GET['id'];

    session_start();

    if(isset($_SESSION['uname'])){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width-device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="style_owner.css">
                <title>Upload UMKM</title>
                <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
            </head>
            <body>
                <div class="table">
                    <div class="table-header">
                        <p>Owner Dashboard</p>
                        <a class="btn-back" href="index_owner.php?id=<?=$id?>">Back</a>
                    </div>

                    <div class="form-section">
                        <div class="title">Registration</div>
                        <form method="post" name="upload" action="API/upload.php?id=<?=$id?>">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Nama UMKM</span>
                                    <input type="text" name="namaUMKM" placeholder="Masukkan nama UMKM Anda" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Lokasi</span>
                                    <input type="text" name="loc" placeholder="Link google maps" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Produk UMKM</span>
                                    <select name="produk" required>
                                        <!-- to add more -->
                                        <option value="" disabled selected>Masukkan jenis produk</option>
                                        <option value="Makanan">Makanan</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <span class="details">Nomor Telp</span>
                                    <input type="text" name="telp" placeholder="Masukkan nomor telp" required>
                                </div>
                            </div>

                            <div class="user-details-long">
                                <div class="input-box">
                                    <span class="details">Deskripsi UMKM</span>
                                    <textarea name="detail" placeholder="Masukkan deskripsi singkat" required></textarea>
                                </div>
                                <div class="input-box">
                                    <span class="details">Foto UMKM</span>
                                    <input type="file" name="foto" accept="image/png, image/jpeg">
                                </div>
                            </div>

                            <button type="submit" class="btn">Add</button>
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