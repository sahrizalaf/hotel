<?php

include 'koneksi.php';

$id_kamar        = $_POST['id_kamar'];
$tipe_kamar      = $_POST['tipe_kamar'];
$fasilitas_kamar = $_POST['fasilitas_kamar'];
$jumlah_kamar    = $_POST['jumlah_kamar'];

$update = mysqli_query($koneksi, "UPDATE kamar SET tipe_kamar = '$tipe_kamar', fasilitas_kamar = '$fasilitas_kamar', jumlah_kamar = '$jumlah_kamar' WHERE id_kamar = '$id_kamar'");

if ( $update ) {
    header('Location: data_kamar.php');
} else {
    echo "Gagal mengubah data. Terjadi kesalahan pada database:<br>";
    echo mysqli_error($koneksi);
}