<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Reservasi - BlueDoorz</title>

    <link href="assets/font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BlueDoorz</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($_SESSION['level'] == 'admin'): ?>
                <div class="sidebar-heading">
                    MENU ADMIN
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="data_kamar.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Data Kamar</span></a>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="data_fasilitas_hotel.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Data Fasilitas Hotel</span></a>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php endif; ?>

            <?php if($_SESSION['level'] == 'resepsionis'): ?>
                <div class="sidebar-heading">
                    MENU RESEPSIONIS
                </div>

                <li class="nav-item active">
                    <a class="nav-link" href="data_reservasi.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Reservasi</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">
            <?php endif; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <i class="fas fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Reservasi</h1>

                    <div class="card shadow p-4">

                        <div class="mb-2">
                            <form action="" method="GET">
                                <div class="form-group row">
                                    <div class="col-sm-6 row">
                                        <div class="col-sm-4 align-middle">
                                            <label style="margin-bottom: 0 !important;">Tanggal Cek In</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="tanggal_cek_in">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nama_tamu" placeholder="Cari berdasarkan nama tamu">
                                    </div>
                                    <div class="col-sm-1">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if ( isset($_GET['tanggal_cek_in']) && !empty($_GET['tanggal_cek_in']) || isset($_GET['nama_tamu']) && !empty($_GET['nama_tamu'])):
                                $tanggal_cek_in = $_GET['tanggal_cek_in'];
                                $nama_tamu      = $_GET['nama_tamu'];

                                $where = "WHERE tanggal_cek_in = '$tanggal_cek_in' OR nama_tamu = '$nama_tamu'";
                            ?>
                            <div>
                                <p>Hasil pencarian kata kunci: <b><?php echo $tanggal_cek_in; ?> <?php echo $nama_tamu; ?></b></p>
                            </div>
                            <?php else:
                                $where = '';
                            endif;
                            ?>
                            
                        </div>


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Reservasi</th>
                                    <th>Nama Tamu</th>
                                    <th>No Handphone</th>
                                    <th>Tipe Kamar</th>
                                    <th>Tanggal Cek In</th>
                                    <th>Tanggal Cek Out</th>
                                    <th style="min-width: 175px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $query = mysqli_query($koneksi, "SELECT * FROM reservasi INNER JOIN kamar ON reservasi.id_kamar = kamar.id_kamar $where");
                                while( $hasil = mysqli_fetch_array($query, MYSQLI_ASSOC) ):
                                ?>
                                <tr>
                                    <td><?php echo $hasil['id_reservasi']; ?></td>
                                    <td><?php echo $hasil['nama_tamu']; ?></td>
                                    <td><?php echo $hasil['no_handphone']; ?></td>
                                    <td><?php echo $hasil['tipe_kamar']; ?></td>
                                    <td><?php echo $hasil['tanggal_cek_in']; ?></td>
                                    <td><?php echo $hasil['tanggal_cek_out']; ?></td>
                                    <td>
                                        <a href="edit_reservasi.php?id=<?php echo $hasil['id_reservasi']; ?>" class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?');" href="proses_hapus_reservasi.php?id=<?php echo $hasil['id_reservasi']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BlueDoorz 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>