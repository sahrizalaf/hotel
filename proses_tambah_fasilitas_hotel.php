<?php

include 'koneksi.php';

$nama_fasilitas_hotel = $_POST['nama_fasilitas_hotel'];
$keterangan           = $_POST['keterangan'];

$insert = mysqli_query($koneksi, "INSERT INTO fasilitas_hotel VALUES(NULL, '$nama_fasilitas_hotel', '$keterangan', 'no-preview.png')");

if ( $insert ) {
    header('Location: data_fasilitas_hotel.php');
} else {
    echo "Gagal menambah data. Terjadi kesalahan pada database: <br>";
    echo mysqli_error($koneksi);
}