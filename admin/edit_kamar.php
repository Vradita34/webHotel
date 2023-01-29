<?php
    session_start();

    if ($_SESSION['user_type'] != 'administrator'){
        header('location:../404.php');
    }


//     // my Version
include '../koneksi.php';

$id     = $_GET['id'];
$query  = mysqli_query($koneksi, "SELECT * FROM kamar WHERE no_kamar='$id'");
$getData    = mysqli_fetch_array($query);


if (isset($_POST['update'])) {
    $no_kamar = $_POST['no_kamar'];
    $tipe_kamar_id = $_POST['tipe_kamar_id'];    
    $update = mysqli_query($koneksi, "UPDATE kamar SET no_kamar = '$no_kamar', tipe_kamar_id = '$tipe_kamar_id' WHERE no_kamar = $_GET[id] ");

    if ($update) {
        $_SESSION['pesan'] = '<font color=green>OK, 1 data berhasil diupdate.</font>';
        header("location: data_kamar.php"); // kembali ke halaman tampil
    } else {
        echo "Gagal update data!";
    }
}   


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/button.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Hotel OYE</span>
                    </a>
                </li>

                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="data_tamu.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>


                <li>
                    <a href="../logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user">
                    <img src="#" alt="">
                </div>
            </div>
            <div class="details">
            <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Edit data ROOM (Kamar)</h2>
                    </div>
            <form action="" method="post">
                        <div class="card-body">
                        <input type="number" class="from-control" id="floatingInput" name="no_kamar" placeholder="no kamar" value="<?= $getData['no_kamar'];?>">
                        <input type="number" class="from-control" id="floatingInput" name="tipe_kamar_id" placeholder="tipe kamar" value="<?= $getData['tipe_kamar_id'];?>">
                        <button type="submit" name="update" value="update" >Update</button>
                        <!-- <button type="submit" style="width:100px;background:#B40301; color:white;font-weight:bold;padding:4px;border:2px solid #B40301;">Update</button> -->
                        <button><a href="data_kamar.php">Lihat data</a></button>
                        </div>
                    </form>
            </div>
            </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/JS/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>