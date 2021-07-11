<?php
session_start();
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$hapus = $_GET['id'];
//$hapus = mysqli_query($koneksi, "DELETE FROM data_dokter WHERE id_dokter = '$_GET[id]'");
if(hapus($hapus) > 0){
    echo "<script>
                alert('Hapus data berhasil');
                document.location='index.php';
            </script>";
}else{
    echo "<script>
                alert('Hapus data gagal');
                document.location='index.php';
            </script>";
}
?>