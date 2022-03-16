<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register Hotel BlueDoorz</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="proses_register.php" method="POST">
      <img class="mb-4" src="logo.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Register - BlueDoorz</h1>
      <label class="sr-only">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Masukkan username" required autofocus>
      <label class="sr-only">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
      <label>Pilih Level</label>
      <select name="level" class="form-control mb-4">
          <option value="admin">Admin</option>
          <option value="resepsionis">Resepsionis</option>
      </select>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <p class="mt-2">
          Sudah punya akun? login <a href="login.php">disini</a>
      </p>
      <p class="mt-5 mb-3 text-muted">&copy; BlueDoorz 2022</p>
    </form>
  </body>
</html>
