<?php
session_start();

require 'functions.php';
if(isset($_POST["btnregister"])){
    if( registrasi($_POST) > 0 ){
        echo"<script>
                alert('User baru berhasil ditambahkan!');
            </script>";
    }else{
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
		body{
            margin-top: 12px;
            margin-bottom: 12px;
			background: linear-gradient(to right top, #ffff1a, #ff751a);
		}
        .kotak_login{
            width: 450px;
            background: white;
            /*meletakkan form ke tengah*/
            margin: 35px auto;
            padding: 30px 20px;
        }
        .form-control{
            width: 180%;
	        padding: 10px;
        }
        .btn{
            width: 92%;
            margin-left: 15px;
        }
        .tulisan_form{
            text-align: center;
            font-size: 20px;
        }
        .tologin{
            margin-left: 15px;
            font-size: 14px;
        }
	</style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Halaman Registrasi</h1>
            <div class="kotak_login">
                <p class="tulisan_form">SILAHKAN MENGISI DATA</p>
                    <form action="" method="post">
                        <div class="form-group col-sm-7">
                            <label>Nama : </label>
                            <input type="text" name="nama" class="form-control" placeholder="Input nama" required>
                        </div>
                        <div class="form-group col-sm-7">
                            <label>Username : </label>
                            <input type="text" name="username" class="form-control" placeholder="Input username" required>
                        </div>
                        <div class="form-group col-sm-7">
                            <label>Password : </label>
                            <input type="password" name="password" class="form-control" placeholder="Input password" required>
                        </div>
                        <div class="form-group col-sm-7">
                            <label>Konfirmasi Password : </label>
                            <input type="password" name="password2" class="form-control" placeholder="Ulangi password" required>
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="nama_form_grup">Pilih Level :</label>
                            <select class="form-control" id="level" name="level">
                                <option value="">--Pilih Level--</option>
                                <option value="umum">Umum</option>
                                <option value="administrator">Administrator</option>
                            </select>
                        </div>
                        </br>
                        <button type="submit" class="btn btn-primary" name="btnregister">Register</button>
                        </br>
                        </br>
                        <center>
                            <a class="tologin" href="login.php">Ke Halaman Login</a>
                        </center>
                    </form>
            </div>
    </div>    
</body>
</html>
