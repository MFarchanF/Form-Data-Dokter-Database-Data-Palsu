<?php
//koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_dokter");

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $koneksi;
    $id_dokter = htmlspecialchars($data["id_dokter"]);
    $nama_dokter = htmlspecialchars($data["nama_dokter"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $jenis_dokter = htmlspecialchars($data["jenis_dokter"]);
    $hari_praktik = htmlspecialchars($data["hari_praktik"]);
    $jam_praktik = htmlspecialchars($data["jam_praktik"]);

    $query = "INSERT INTO data_dokter VALUES 
                ('$id_dokter', '$nama_dokter', '$alamat', '$jenis_kelamin',
                '$no_telp', '$jenis_dokter', '$hari_praktik', '$jam_praktik')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($hapus){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM data_dokter WHERE id_dokter = '$hapus'");
    return mysqli_affected_rows($koneksi);
}

function ubah($data){
    global $koneksi;
    $id_dokter = htmlspecialchars($data["id_dokter"]);
    $nama_dokter = htmlspecialchars($data["nama_dokter"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $jenis_dokter = htmlspecialchars($data["jenis_dokter"]);
    $hari_praktik = htmlspecialchars($data["hari_praktik"]);
    $jam_praktik = htmlspecialchars($data["jam_praktik"]);

    $query = "UPDATE data_dokter SET 
                id_dokter = '$id_dokter',
                nama_dokter = '$nama_dokter',
                alamat = '$alamat',
                jenis_kelamin = '$jenis_kelamin',
                no_telp = '$no_telp',
                jenis_dokter = '$jenis_dokter',
                hari_praktik = '$hari_praktik',
                jam_praktik = '$jam_praktik'
                WHERE id_dokter = '$id_dokter'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function cari($keyword){
    $query = "SELECT * FROM data_dokter 
                WHERE
                id_dokter LIKE '%$keyword%' OR
                nama_dokter LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%' OR
                no_telp LIKE '%$keyword%' OR
                jenis_dokter LIKE '%$keyword%' OR
                hari_praktik LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data){
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $level = mysqli_real_escape_string($koneksi, $data["level"]);

    // cek username ada / tidak
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username telah terdaftar');    
            </script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                alert('Konfirmasi Password tidak sesuai !!');    
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //$password = md5($password);

    //tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('','$nama','$username','$password', '$level')");
    return mysqli_affected_rows($koneksi);
}
function carijmlh($keywordjmlhdokter)
{
    $query = "SELECT * FROM jenis_dokter_tersedia
                WHERE
                macam_macam_dokter LIKE '%$keywordjmlhdokter%' OR
                jumlah_dokter LIKE '%$keywordjmlhdokter%'
                ";
    return query($query);
}









?>