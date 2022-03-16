<?php

$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'hotel';

$koneksi = mysqli_connect($host, $user, $pass, $dbname);

if ( mysqli_connect_errno() ) {
    echo "Terjadi kesalahan koneksi pada database!<br>";
    echo mysqli_connect_error();
}