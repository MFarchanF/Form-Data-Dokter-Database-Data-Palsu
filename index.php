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
    <title>Form Data Dokter</title>
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
        @media print{
            .logout, .nav, .btn, .aksi, .input-group {
                display: none;
            }
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
            <a class="nav-link" href="index.php"><b>Daftar Data Dokter</b></a>
            <a class="nav-link" href="jumlah_jenis_dokter.php">Jumlah Dokter</a>
            <a class="nav-link" href="logout.php" onclick ="return confirm('Apakah anda ingin keluar dari akun ini ?')"><b>Logout?? </b><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
<div class="container">
    <br>
        <!--<h1 class="text-center">Form Data Dokter</h1>-->
        <!-- Memasukkan data -->
        <a class="btn btn-primary" href="tambahdata.php"><i class="fas fa-user-plus"></i> Tambah Data Dokter</a>
        <a class="btn btn-danger" href="cetak.php" target="_blank"><i class="fas fa-print"></i></i> Cetak Data Dokter</a>
        <!-- Mengeluarkan data -->
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                <div class="daftar_dokter">
                    <a href="index.php">Daftar Dokter</a>
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
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Jenis Dokter</th>
                            <th>Hari Praktik</th>
                            <th>Jam Praktik</th>
                            <th class="aksi">Aksi</th>
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
                            <td><?=$row['alamat']?></td>
                            <td><?=$row['jenis_kelamin']?></td>
                            <td><?=$row['no_telp']?></td>
                            <td><?=$row['jenis_dokter']?></td>
                            <td><?=$row['hari_praktik']?></td>
                            <td><?=$row['jam_praktik']?></td>
                            <td>
                                <a style="padding:5px 20px" class="btn btn-warning" href="editdata.php?id=<?=$row['id_dokter']?>" role="button"><i class="fas fa-edit"></i>Edit</a> <br><br>
                                <a style="padding:5px 11px" class="btn btn-danger" href="hapusdata.php?id=<?=$row['id_dokter']?>" 
                                onclick ="return confirm('Apakah anda ingin menghapus data ini ?')" role="button"><i class="fas fa-trash"></i>Hapus</a>
                            </td>
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