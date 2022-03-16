<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BlueDoorz</title>

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
      <h1 class="display-4">BlueDoorz</h1>
      <p class="lead">Hotel terjangkau dengan fasilitas terbaik, berada di jangkauan seluruh kota besar. Ayo booking!</p>
      <a href="reservasi.php" class="btn btn-primary">Ayo reservasi sekarang!</a>
      <a href="kamar.php" class="btn btn-success">Lihat tipe kamar dulu</a>
    </div>

    <hr>

    <div class="container">
      <h1 class="display-6 text-center mb-4">Fasilitas Umum Hotel</h1>
      <div class="row">
        <?php
          include "koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM fasilitas_hotel");
          while( $fasilitas = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
          ?>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img style="width: 100%; height: 15vw; object-fit: cover;" class="card-img-top" src="assets/img/<?php echo $fasilitas['gambar'];?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $fasilitas['nama_fasilitas_hotel'] ?></h5>
              <p class="card-text"><?php echo $fasilitas['keterangan']; ?></p>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
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
              <li><a class="text-muted" href="index.php">Home</a></li>
              <li><a class="text-muted" href="kamar.php">Tipe Kamar</a></li>
              <li><a class="text-muted" href="reservasi.php">Reservasi</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>

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
