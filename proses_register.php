<?php

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level    = $_POST['level'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

if ( mysqli_num_rows($query) == 0 ) {

    $password_acak = password_hash($password, PASSWORD_BCRYPT);

    $insert = mysqli_query($koneksi, "INSERT INTO user VALUES(NULL, '$username', '$password_acak', '$level')");

    if ( $insert ) {
        echo "Berhasil mendaftarkan akun, silahkan <a href='login.php'>login</a>";
    } else {
        echo "Terjadi kesalahan pada database:<br>";
        echo mysqli_error($koneksi);
    }

} else {
    echo 'Username sudah digunakan! silahkan masukkan username yang lain';
}