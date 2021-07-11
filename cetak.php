<?php
session_start();
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$dokter = query("SELECT * FROM data_dokter ORDER BY id_dokter ASC");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Dokter</title>
</head>
<body>
    <h1>Daftar Data Dokter<h1>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover table-sm">
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
        </tr>
    </thead>';
    $no = 1;
    foreach($dokter as $row){
        $html .= '<tr>
        <td>'.$no++.'</td>
        <td>'.$row['id_dokter'].'</td>
        <td>'.$row['nama_dokter'].'</td>
        <td>'.$row['alamat'].'</td>
        <td>'.$row['jenis_kelamin'].'</td>
        <td>'.$row['no_telp'].'</td>
        <td>'.$row['jenis_dokter'].'</td>
        <td>'.$row['hari_praktik'].'</td>
        <td>'.$row['jam_praktik'].'</td>
    </tr>';
    }
$html .='</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Data Dokter.php' ,\Mpdf\Output\Destination::INLINE);
?>