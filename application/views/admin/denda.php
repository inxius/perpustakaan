<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/customSidebar.css'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/9bceecac14.js" crossorigin="anonymous"></script>

    <title>Perpustakaan | Denda</title>
</head>
<body id="bg-custom-1">
    <div class="wrapper">
      <!-- Sidebar -->
        <?php $this->load->view('assets/sidebar'); ?>

        <div id="content">
          <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                              <h5 class="nav-link"><a href="#">Home</a> / Kelola Denda</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container" id="main-content">
                <div class="card">
                    <div class="card-header">
                        <h1>Kelola Denda</h1>
                    </div>
                    <div class="card-body">
                      <?php echo form_open_multipart('denda/ubah'); ?>
                      <?php foreach ($dataDenda as $denda) {
                        ?>
                        <input type="hidden" name="idDenda" value="<?php echo $denda->idDenda; ?>">
                        <div class="form-group row">
                          <label for="inputNilai" class="col-sm-4 col-form-label">Nominal Denda</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" id="inputNilai" name="nilaiDenda"
                            placeholder="Nilai Denda" value="<?php echo $denda->nominalDenda ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputHari" class="col-sm-4 col-form-label">Maksimal Lama Pinjam (Hari)</label>
                          <div class="col-sm-8">
                            <input type="number" max="127" class="form-control" id="inputHari" name="hari"
                            placeholder="Maksimal Lama Pinjam" value="<?php echo $denda->maxPinjamHari ?>">
                          </div>
                        </div>
                        <?php
                      } ?>
                      <div class="form-group row">
                        <div class="offset-sm-4 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?php echo base_url('assets/js/customSidebar.js'); ?>"></script>
</body>
</html>
