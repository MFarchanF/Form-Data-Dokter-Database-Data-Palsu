<?php
session_start();

if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
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
            margin: 58px auto;
            padding: 30px 20px;
        }
        .form-control{
            width: 180%;
	        padding: 10px;
        }
        .btn{
            width: 90.5%;
            margin-left: 15px;
        }
        .tulisan_atas{
            margin-top: 50px;
            text-align: center;
        }
        .akunbaru{
            margin-left: 15px;
            font-size: 12px;
        }
	</style>
</head>
<body>
    <h1 class="tulisan_atas">SELAMAT DATANG</h1>
        <div class="kotak_login">
            <div class="card">
                <div class="card-body">
                <center>
                Silahkan Login Terlebih Dahulu </br></br>
                </center>
                <?php if(isset($error)):
                            echo "<script>
                            alert('Username atau Password salah');
                        </script>";?>
                <?php endif;?>
                    <form action="cek_loginhash.php" method="POST">
                        <div class="form-group col-sm-7">
                            <label>Username : </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Input username" required autocomplete="off">
                        </div>
                        <div class="form-group col-sm-7">
                            <label>Password : </label>
                            <input type="password" name="password" id="password class" class="form-control" placeholder="Input password" required>
                        </div>
                            <button type="submit" class="btn btn-primary" name="btnlogin">Login</button>
                            </br>
                            </br>
                            <center>
                                <a class="akunbaru" href="registrasi.php">*BUAT AKUN</a>
                            </center>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>