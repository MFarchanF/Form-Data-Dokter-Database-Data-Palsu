<?php
session_start();
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$dokter = query("SELECT * FROM jenis_dokter_tersedia ");

// tombol cari diklik
if (isset($_POST["carijumlah"])) {
    $dokter = carijmlh($_POST["keywordjmlhdokter"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumlah Jenis Dokter (AKUN ADMINISTRATOR)</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<style> 
		body{
            margin-top: 12px;
            margin-bottom: 12px;
			background: linear-gradient(to right top, #ffff1a, #ff751a);
		}
        .daftar_dokter a{
            color: white;
        }
        .header_atas{
            background: #ffed99;
            width: auto;
            height: auto;
            font-size: 20px;
            text-align: center;
            padding-left: 12px;
            padding-right: 12px;
            padding-top: 12px;
            padding-bottom: 12px;
        }
        nav{
            padding-left: 8px;
            padding-right: 8px;
            background-color: #ffffc7;
        }
        nav a:hover {
            background: #f1ca89;
            text-decoration: none;
        }
	</style>
</head>
<body>
    <header>
        <div class="header_atas">
            <h1>Hello, <b><?= $_SESSION['nama'] ?></b></h1>
            <p>Selamat datang di Form Data Dokter<br>
            Anda berhasil Login dengan kategori <b><?= $_SESSION['level'] ?></b>
            </p>
        </div>
        <nav class="nav justify-content-end">
            <a class="nav-link" href="index.php">Daftar Data Dokter</a>
            <a class="nav-link" href="jumlah_jenis_dokter.php"><b>Jumlah Dokter</b></a>
            <a class="nav-link" href="logout.php" onclick ="return confirm('Apakah anda ingin keluar dari akun ini ?')"><b>Logout?? </b><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <div class="container">
        <!-- Mengeluarkan data -->
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                <div class="daftar_dokter">
                    <a href="jumlah_jenis_dokter.php">Jenis Dokter dan Jumlah Dokter</a>
                </div>
            </div>
            <form action="" method="POST">
                <div class="input-group ml-1 mt-3 col-sm-7">
                    <input type="text" class="form-control" name="keywordjmlhdokter" placeholder="Masukkan keyword pencarian" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="carijumlah" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="bg-info text-white">
                            <th>No</th>
                            <th>Jenis Dokter</th>
                            <th>Jumlah Dokter</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($dokter as $row) :
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['macam_macam_dokter'] ?></td>
                                <td><?= $row['jumlah_dokter'] ?></td>
                            </tr>
                        </tbody>
                    <?php
                        $no++;
                    endforeach;  //penutup perulangan endforeach
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>