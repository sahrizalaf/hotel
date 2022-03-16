<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Reservasi - BlueDoorz</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/index.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">BlueDoorz</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Home</a>
        <a class="p-2 text-dark" href="kamar.php">Kamar</a>
        <a class="p-2 text-dark" href="reservasi.php">Reservasi</a>
      </nav>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Reservasi di BlueDoorz</h1>
        <p class="lead">Sudah melakukan reservasi sebelumnya? cek reservasi melalui form dibawah ini</p>
            <div class="form">
                <form class="form-inline col-md-12" method="GET" action="">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control col-md-8" name="keyword" placeholder="Cari berdasarkan nama, email, atau no telepon">
                        <button type="submit" class="btn btn-primary ml-2 col-md-3">Cari</button>
                    </div>
                </form>
                <?php
                include "koneksi.php";

                if( isset($_GET['keyword']) && !empty($_GET['keyword']) ):

                    $keyword = $_GET['keyword'];

                    $cari = mysqli_query($koneksi, "SELECT * FROM reservasi INNER JOIN kamar ON reservasi.id_kamar = kamar.id_kamar WHERE nama_tamu = '$keyword' OR email = '$keyword' OR no_handphone = '$keyword'");
                    if ( mysqli_num_rows($cari) !== 0 ):
                ?>
                
                <div class="mt-4">
                    <p>Kata kunci yang dimasukkan <b><?php echo $keyword; ?></b> </p>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID Reservasi</th>
                            <th>Nama Tamu</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Tanggal Cek In</th>
                            <th>Tanggal Cek Out</th>
                            <th>Tipe Kamar</th>
                            <th>Jumlah Kamar</th>
                        </tr>
                        <?php
                        while($hasil = mysqli_fetch_array($cari, MYSQLI_ASSOC) ):
                        ?>    
                            <tr>
                                <td><?php echo $hasil['id_reservasi']; ?></td>
                                <td><?php echo $hasil['nama_tamu']; ?></td>
                                <td><?php echo $hasil['email']; ?></td>
                                <td><?php echo $hasil['no_handphone']; ?></td>
                                <td><?php echo $hasil['tanggal_cek_in']; ?></td>
                                <td><?php echo $hasil['tanggal_cek_out']; ?></td>
                                <td><?php echo $hasil['tipe_kamar']; ?></td>
                                <td><?php echo $hasil['jumlah_kamar']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div> 
                <?php else: ?>
                    <div class="mt-4">
                        <p>Kata kunci yang dimasukkan <b><?php echo $keyword; ?></b> </p>
                        <h3>TIDAK ADA DATA</h3>
                    </div>
                <?php endif; ?>

                <?php endif; ?>
            </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="card bg-secondary text-white col-md-12">
                <h3 class="display-4 text-center mb-4">Buat Reservasi Baru</h3>
                <form action="proses_reservasi.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_tamu" class="form-control" placeholder="Masukkan nama anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-10">
                    <input type="text" name="no_handphone" class="form-control" placeholder="Masukkan no telepon anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pilih Tipe Kamar</label>
                    <div class="col-sm-10">
                        <select name="id_kamar" class="form-control">
                            <?php
                            include 'koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM kamar");
                            while($kamar = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
                            ?>
                                <option value="<?php echo $kamar['id_kamar']; ?>">
                                    <?php echo $kamar['tipe_kamar']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Cek In</label>
                    <div class="col-sm-10">
                    <input type="date" name="tanggal_cek_in" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Cek Out</label>
                    <div class="col-sm-10">
                    <input type="date" name="tanggal_cek_out" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-10">
                    <input type="number" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar">
                    </div>
                </div>
                <div class="form-group row mx-4">
                    <button class="btn btn-success btn-block">Pesan!</button>
                </div>
                </form>
            </div>
        </div>
    </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; BlueDoorz 2022</small>
          </div>
          <div class="col-6 col-md">
            <h5>Halaman</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Home</a></li>
              <li><a class="text-muted" href="#">Tipe Kamar</a></li>
              <li><a class="text-muted" href="#">Fasilitas Hotel</a></li>
              <li><a class="text-muted" href="#">Booking</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
