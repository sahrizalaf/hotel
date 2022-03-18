<?php

include 'koneksi.php';

$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM fasilitas_hotel WHERE id_fasilitas_hotel = '$id'");

if ( $delete ) {
    header('Location: data_fasilitas_hotel.php');
} else {
    echo "Gagal menghapus data. Terjadi kesalahan pada database: <br>";
    echo mysqli_error($koneksi);
}