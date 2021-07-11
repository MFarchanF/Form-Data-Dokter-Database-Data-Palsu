<?php
session_start();
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//jika tombol simpan diklik
if(isset($_POST['btnsimpan']))
{
    if(tambah($_POST) > 0){
        echo "<script>
                alert('Simpan data berhasil');
                document.location='index.php';
            </script>";
    }else{
        echo "<script>
                alert('Simpan data gagal');
                document.location='tambahdata.php';
            </script>";
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dokter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
		body{
            margin-top: 12px;
            margin-bottom: 12px;
			background: linear-gradient(to right top, #ffff1a, #ff751a);
		}
        .header_atas{
            background: #ffed99;
            width: auto;
            height: auto;
            font-size: 25px;
            padding-left: 12px;
            padding-right: 12px;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
        }
	</style>
</head>
<body>
    <header>
        <div class="header_atas">
            <h1>Form Tambah Data Dokter</h1>
        </div>
    </header>
    <div class="container">
        <!-- Memasukkan data -->
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                <b>Tambah Data Dokter</b>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>ID Dokter</label>
                        <input type="text" name="id_dokter" class="form-control" placeholder="Input ID Dokter" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Dokter dan Gelar</label>
                        <input type="text" name="nama_dokter" class="form-control" placeholder="Input Nama Dokter dan Gelar" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Input Alamat" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control" placeholder="Input Jenis Kelamin" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="no_telp" class="form-control" placeholder="Input No Telp" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jenis Dokter</label>
                        <input type="text" name="jenis_dokter" class="form-control" placeholder="Input Jenis Dokter" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Hari Praktik</label>
                        <input type="text" name="hari_praktik" class="form-control" placeholder="Input Hari Praktik" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jam Praktik</label>
                        <input type="text" name="jam_praktik" class="form-control" placeholder="Input Jam Praktik" required autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success" name="btnsimpan">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="btnreset">Kosongkan</button> <br>
                    <center>
                        <a class="btn btn-primary" href="index.php">Kembali ke Halaman Awal</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>