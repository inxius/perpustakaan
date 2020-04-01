<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Katalog Simple Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/custom/custom.css'); ?>">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('katalog'); ?>">Simple Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('katalog/show'); ?>">Semua Katalog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin'); ?>">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
          <h1 class="font-weight-light text-center">Katalog Simple Perpustakaan</h1>
          <br><hr>
          <form class="" action="<?php echo site_url('katalog/search'); ?>" method="post">
            <div class="input-group input-group-lg">
              <input type="text" class="form-control" name="judul" placeholder="Judul Buku, Pengarang" required>
              <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">Search</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  </body>
</html>
