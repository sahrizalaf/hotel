<?php

include 'koneksi.php';

$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM reservasi WHERE id_reservasi = '$id'");

if ( $delete ) {
    header('Location: data_reservasi.php');
} else {
    echo "Gagal menghapus data. Terjadi kesalahan pada database:<br>";
    echo mysqli_error($koneksi);
}