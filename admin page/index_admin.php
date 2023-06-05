<?php
	include("../config.php");
	$db = mysqli_query($status, "select * from umkm_db");

    session_start();

    if(isset($_SESSION['uname'])){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width-device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="style_admin.css">
                <title>Admin Dashboard</title>
                <link rel="icon" type="image/x-icon" href="Assets/logo.png">
            </head>
            <body>
                <div class="table">
                    <div class="table-header">
                        <p>Admin Dashboard</p>
                        <a class="btn-logout" href="../login page/API/logout.php">Log out</a>
                    </div>
                    <div class="table-section">
                        <table>
                            <thead>
                                <th>No.</th>
                                <th>Nama UMKM</th>
                                <th>Produk</th>
                                <th>Owner</th>
                                <th>Lokasi</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    while($arr = mysqli_fetch_array($db)){
                                        echo "<tr>";
                                        echo "<td>".$count."</td>";
                                        echo "<td>".$arr['umkm']."</td>";
                                        echo "<td>".$arr['produk']."</td>";
                                        echo "<td>".$arr['owner']."</td>";
                                        echo "<td>".$arr['lokasi']."</td>";
        
                                        // Set button
                                        echo "<td>";
                                        ?>
                                            <form method="post" name="edit" action="API/properties.php">
        
                                                <?php if($arr['status'] == 1 || $arr['status'] == 2){?>
                                                    <!-- Button trash -->
                                                    <button class="btn-trash" name="action" value="del">
                                                        <ion-icon name="trash"></ion-icon>
                                                    </button>
        
                                                <?php } else{?>
                                                    <!-- Button yes -->
                                                    <button class="btn-yes" name="action" value="yes">
                                                        <ion-icon name="checkmark-outline"></ion-icon>
                                                    </button>
        
                                                    <!-- Button no -->
                                                    <button class="btn-no" name="action" value="no">
                                                        <ion-icon name="close-outline"></ion-icon>
                                                    </button>
                                                <?php }?>
                                                
                                                <!-- Passing id -->
                                                <input type="hidden" name="id" value="<?php echo $arr['id_umkm']; ?>"/>
                                                
                                            </form>
                                        <?php
                                        echo "</td>";
        
                                        $count++;
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        
                
                <!-- Javascript -->
                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                <script src="script.js"></script>
            </body>
        </html>
        <?php
    }
    else{
        header("location: ../login page/login.html");
    }
?>