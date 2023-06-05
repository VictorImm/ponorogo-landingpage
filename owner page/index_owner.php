<?php
	include("../config.php");
    $id = $_GET['id'];
	$db = mysqli_query($status, "select * from umkm_db where id_user = '$id'");

    session_start();

    if(isset($_SESSION['uname'])){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width-device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="style_owner.css">
                <title>Owner Dashboard</title>
                <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
            </head>
            <body>
                <div class="table">
                    <div class="table-header">
                        <p>Owner Dashboard</p>
                        <a class="btn-logout" href="../login page/API/logout.php">Log out</a>
                    </div>

                    <div class="table-section">
                        <table>
                            <thead>
                                <th>No.</th>
                                <th>Nama UMKM</th>
                                <th>Lokasi</th>
                                <th>No. Telp</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    while($arr = mysqli_fetch_array($db)){
                                        echo "<tr>";
                                        echo "<td>".$count."</td>";
                                        echo "<td>".$arr['umkm']."</td>";
                                        echo "<td>".$arr['lokasi']."</td>";
                                        echo "<td>".$arr['telp']."</td>";

                                        // Set status
                                        if($arr['status'] == 0) {
                                            echo "<td>In process</td>";
                                        }else if($arr['status'] == 1){
                                            echo "<td>Accepted</td>";
                                        }else if($arr['status'] == 2){
                                            echo "<td>Rejected</td>";
                                        }

                                        // Set button
                                        echo "<td>";
                                        ?>        
                                            <form method="post" name="edit" action="API/properties.php">
                                                <!-- Button edit -->
                                                <button class="btn-edit" name="action" value="edit">
                                                    <ion-icon name="create"></ion-icon>
                                                </button>

                                                <!-- Button delete -->
                                                <button class="btn-trash" name="action" value="del">
                                                    <ion-icon name="trash"></ion-icon>
                                                </button>

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
                        <a class="btn-add" href="add_umkm.php?id=<?=$id?>">ADD UMKM</a>
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


