<?php

include 'koneksi.php';

$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar = '$id'");

if ( $delete ) {
    header('Location: data_kamar.php');
} else {
    echo "Gagal menghapus data. Terjadi kesalahan pada database:<br>";
    echo mysqli_error($koneksi);
}