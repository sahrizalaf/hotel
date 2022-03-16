<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Kamar - BlueDoorz</title>

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
      <h1 class="display-4">Tipe Kamar di BlueDoorz</h1>
      <p class="lead">Berikut ini tipe kamar dan fasilitas yang tersedia di hotel kami</p>
    </div>

    <div class="container">
      <div class="row">
        <?php
          include "koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM kamar");
          while( $fasilitas = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
          ?>
        <div class="col-md-4 mb-3">
          <div class="card" style="min-height: 250px; max-height: 250px !important;">
            <div class="card-body">
              <h3 class="card-title"><?php echo $fasilitas['tipe_kamar'] ?></h3>
              <p class="card-text"><?php echo $fasilitas['fasilitas_kamar']; ?></p>
              <a href="" class="btn btn-success">Reservasi</a>
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
