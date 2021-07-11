<?php
session_start();
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$dokter = query("SELECT * FROM data_dokter ORDER BY id_dokter ASC");

// tombol cari diklik
if(isset($_POST["cari"])){
    $dokter = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun Umum</title>
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
            padding-left: 12px;
            padding-right: 12px;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            margin: 0 auto;
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
            <a class="nav-link" href="lihat_dokter.php"><b>Data Dokter</b></a>
            <a class="nav-link" href="jumlah_jenis_dokter_pasien.php">Jumlah Dokter</a>
            <a class="nav-link" href="logout.php" onclick ="return confirm('Apakah anda ingin keluar dari akun ini ?')"><b>Logout?? </b><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
<div class="container">
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                <div class="daftar_dokter">
                    <a href="lihat_dokter.php">Daftar Dokter</a>
                </div>
            </div>
            <form action="" method="POST">
                <div class="input-group ml-1 mt-3 col-sm-7">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan keyword pencarian" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="cari" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr class="bg-info text-white">
                            <th>No</th>
                            <th>ID Dokter</th>
                            <th>Nama Dokter dan Gelar</th>
                            <!--<th>Alamat</th>-->
                            <th>Jenis Kelamin</th>
                            <!--<th>No Telp</th>-->
                            <th>Jenis Dokter</th>
                            <th>Hari Praktik</th>
                            <th>Jam Praktik</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        foreach($dokter as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['id_dokter']?></td>
                            <td><?=$row['nama_dokter']?></td>
                            <!--<td><?=$row['alamat']?></td>-->
                            <td><?=$row['jenis_kelamin']?></td>
                            <!--<td><?=$row['no_telp']?></td>-->
                            <td><?=$row['jenis_dokter']?></td>
                            <td><?=$row['hari_praktik']?></td>
                            <td><?=$row['jam_praktik']?></td>
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