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

    <!-- Select2JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <title>Perpustakaan | Detail Buku</title>
</head>
<body id="bg-custom-1">
    <div class="wrapper">
      <!-- Sidebar -->
        <?php $this->load->view('assets/sidebar'); ?>
      <!-- End Sidebar -->

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
                              <h5 class="nav-link"><a href="<?php echo site_url('admin'); ?>">Home</a> / <a href="<?php echo site_url('buku'); ?>">Buku</a> / Detail Buku</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
          <!-- End Navbar -->

            <div class="container" id="main-content">
              <div class="row">
                <!-- Photos -->
                <div class="col-md-4 col-lg-4">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <?php foreach ($dataBuku as $Gambar) {
                          ?>
                            <img class="img-fluid"
                            src="<?php echo base_url("assets/img/$Gambar->gambar.png"); ?>"
                            alt="Sampul Buku">
                          <?php
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Photos -->

                <!-- Right Side -->
                <div class="col-md-8 col-lg-8">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"> <h5>Detail Buku</h5> </li>
                      </ul>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                          <!-- Form -->
                          <?php echo form_open_multipart('buku/ubah'); ?>
                            <?php foreach ($dataBuku as $buku) {
                              ?>
                              <input type="hidden" name="idBuku" value="<?php echo $buku->idBuku; ?>">
                              <div class="form-group row">
                                <label for="inputKode" class="col-sm-2 col-form-label">Kode Buku</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputKode" name="kodeBuku"
                                  placeholder="Kode Buku" value="<?php echo $buku->kode; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputJudul" name="judulBuku"
                                  placeholder="Judul Buku" value="<?php echo $buku->judul; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPengarang" name="pengarang"
                                  placeholder="Pengarang" value="<?php echo $buku->pengarang; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputISBN" class="col-sm-2 col-form-label">ISBN</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputISBN" name="isbn"
                                  placeholder="ISBN" value="<?php echo $buku->isbn; ?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                  <select class="form-control select2" id="inputPenerbit" name="penerbit" style="width: 100%;">
                                    <?php foreach ($dataPenerbit as $penerbit) {
                                      if ($penerbit->idPenerbit == $buku->idPenerbit) {
                                        ?>
                                          <option selected value="<?php echo $penerbit->idPenerbit; ?>"><?php echo $penerbit->namaPenerbit; ?></option>
                                        <?php
                                      }
                                      else {
                                        ?>
                                          <option value="<?php echo $penerbit->idPenerbit; ?>"><?php echo $penerbit->namaPenerbit; ?></option>
                                        <?php
                                      }
                                    } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                  <select class="form-control select2" id="inputKategori" name="kategori" style="width: 100%;">
                                    <?php foreach ($dataKategori as $kategori) {
                                      if ($kategori->idKategori == $buku->idKategori) {
                                        ?>
                                          <option selected value="<?php echo $kategori->idKategori; ?>"><?php echo $kategori->namaKategori; ?></option>
                                        <?php
                                      }
                                      else {
                                        ?>
                                          <option value="<?php echo $kategori->idKategori; ?>"><?php echo $kategori->namaKategori; ?></option>
                                        <?php
                                      }
                                    } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputTahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputTahun" name="tahun"
                                  placeholder="Tahun Terbit" value="<?php echo $buku->tahunTerbit; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="jmlHal" class="col-sm-2 col-form-label">Jumlah Halaman</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="jmlHal" name="jmlHal"
                                  placeholder="Jumlah Halaman" value="<?php echo $buku->jmlHal; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="jmlBuku" class="col-sm-2 col-form-label">Jumlah Buku</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="jmlBuku" name="jmlBuku"
                                  placeholder="Jumlah Buku" value="<?php echo $buku->jmlBuku; ?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputLokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                  <select class="form-control select2" id="inputLokasi" name="lokasi" style="width: 100%;">
                                    <?php foreach ($dataLokasi as $lokasi) {
                                      if ($lokasi->idLokasi == $buku->idLokasi) {
                                        ?>
                                          <option selected value="<?php echo $lokasi->idLokasi; ?>"><?php echo $lokasi->namaLokasi; ?></option>
                                        <?php
                                      }
                                      else {
                                        ?>
                                          <option value="<?php echo $lokasi->idLokasi; ?>"><?php echo $lokasi->namaLokasi; ?></option>
                                        <?php
                                      }
                                    } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi">
                                    <?php echo $buku->deskripsi; ?>
                                  </textarea>
                                </div>
                              </div>
                              <?php
                            } ?>
                            <div class="form-group row">
                              <div class="custom-file" id="sampul">
                                <input type="file" class="custom-file-input" name="gambarBuku" id="customFile">
                                <label class="custom-file-label" for="customFile">Pilih Sampul</label>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update</button>
                              </div>
                            </div>
                          <?php echo form_close(); ?>
                          <!-- </form> -->
                        </div>
                      </div>
                    </div>
                    <!-- End Card Body -->
                  </div>
                </div>
                <!-- End Right Side -->
              </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- bs-custom-file-input -->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Select2JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script src="<?php echo base_url('assets/js/customSidebar.js'); ?>"></script>

    <script type="text/javascript">
    $(document).ready( function () {
        $('.select2').select2();
    } );
    </script>
</body>
</html>
