<?php

include 'koneksi.php';

$id_fasilitas_hotel   = $_POST['id_fasilitas_hotel'];
$nama_fasilitas_hotel = $_POST['nama_fasilitas_hotel'];
$keterangan           = $_POST['keterangan'];

$update = mysqli_query($koneksi, "UPDATE fasilitas_hotel SET nama_fasilitas_hotel = '$nama_fasilitas_hotel', keterangan = '$keterangan' WHERE id_fasilitas_hotel = '$id_fasilitas_hotel'");

if ( $update ) {
    header('Location: data_fasilitas_hotel.php');
} else {
    echo "Gagal mengubah data. Terjadi kesalahan pada database:<br>";
    echo mysqli_error($koneksi);
}