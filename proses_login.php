<?php

session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

if ( mysqli_num_rows($query) == 1 ) {

    $user = mysqli_fetch_array($query);

    if ( password_verify($password, $user['password']) ) {
        
        $_SESSION['username'] = $user['username'];
        $_SESSION['typeuser'] = $user['typeuser'];

        header('Location: dashboard.php');
    } else {
        echo "Password tidak cocok!";
    }

} else {
    echo "Username yang dimasukkan tidak terdaftar!";
}