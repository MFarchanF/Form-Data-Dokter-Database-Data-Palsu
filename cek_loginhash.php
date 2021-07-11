<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
require 'functions.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
//$password = md5($_POST['password']);


// menyeleksi data user dengan username yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
// menghitung jumlah data yang ditemukan
$hitung = mysqli_num_rows($login);
//$pw = mysqli_fetch_array($login);
$data = mysqli_fetch_assoc($login);
$passwordhash = $data['password'];
// cek apakah username dan password di temukan pada database
if($hitung > 0){
    //jika ada dan verivikasi password
    if(password_verify($password, $passwordhash)){

        // cek jika user login sebagai admin
        if($data['level']=="administrator"){

            // buat session login dan username
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "administrator";
            // alihkan ke halaman dashboard admin
            header("location:index.php");

        // cek jika user login sebagai umum
        }else if($data['level']=="umum"){
            // buat session login dan username
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "umum";
            // alihkan ke halaman dashboard umum
            header("location:lihat_dokter.php");
        }else{
            // alihkan ke halaman login kembali
            echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='login.php'</script>";
        }	
	}else{
		// alihkan ke halaman login kembali
		echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='login.php'</script>";
	}	
}else{
	echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='login.php'</script>";
}

?>