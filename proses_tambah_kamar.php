<?php

include 'koneksi.php';

$tipe_kamar      = $_POST['tipe_kamar'];
$fasilitas_kamar = $_POST['fasilitas_kamar'];
$jumlah_kamar    = $_POST['jumlah_kamar'];

$insert = mysqli_query($koneksi, "INSERT INTO kamar VALUES(NULL, '$tipe_kamar', '$fasilitas_kamar', '$jumlah_kamar')");

if ( $insert ) {
    header('Location: data_kamar.php');
} else {
    echo "Gagal menambahkan data. Terjadi kesalahan pada database:<br>";
    echo mysqli_error($koneksi);
}