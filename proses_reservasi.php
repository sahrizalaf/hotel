<?php
include "koneksi.php";

$id_kamar        = $_POST['id_kamar'];
$nama_tamu       = $_POST['nama_tamu'];
$email           = $_POST['email'];
$no_handphone    = $_POST['no_handphone'];
$tanggal_cek_in  = $_POST['tanggal_cek_in'];
$tanggal_cek_out = $_POST['tanggal_cek_out'];
$jumlah_kamar    = $_POST['jumlah_kamar'];

$insert = mysqli_query($koneksi, "INSERT INTO reservasi VALUES(NULL, '$id_kamar', '$nama_tamu', '$email', '$no_handphone', '$tanggal_cek_in', '$tanggal_cek_out', 'Cek In', '$jumlah_kamar')");

if ( $insert ):
    $id = mysqli_insert_id($koneksi);

    $query = mysqli_query($koneksi, "SELECT * FROM reservasi INNER JOIN kamar ON reservasi.id_kamar = kamar.id_kamar WHERE id_reservasi = '$id'");
    $hasil = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
    <head>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
        <div class="button-group m-4 d-print-none">
            <p>Berhasil melakukan reservasi! berikut detailnya:</p>
            <a href="reservasi.php" class="btn btn-primary">Kembali</a>
            <a onclick="window.print();" href="#" class="btn btn-success">Cetak</a>
        </div>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <td colspan="2" class="text-center">Data Reservasi</td>
                </tr>
                <tr>
                    <td>ID Reservasi</td>
                    <td><?php echo $hasil['id_reservasi']; ?></td>
                </tr>
                <tr>
                    <td>Nama Tamu</td>
                    <td><?php echo $hasil['nama_tamu']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $hasil['email']; ?></td>
                </tr>
                <tr>
                    <td>No Handphone</td>
                    <td><?php echo $hasil['no_handphone']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Cek In</td>
                    <td><?php echo $hasil['tanggal_cek_in']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Cek Out</td>
                    <td><?php echo $hasil['tanggal_cek_out']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $hasil['status']; ?></td>
                </tr>
                <tr>
                    <td>Tipe Kamar</td>
                    <td><?php echo $hasil['tipe_kamar']; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Kamar</td>
                    <td><?php echo $hasil['jumlah_kamar']; ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </body>
    
<?php else: ?>
    <p>Terjadi kesalahan, gagal melakukan reservasi</p>
    <p><?php echo mysqli_error($koneksi); ?></p>
<?php endif; ?>