<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Detail Buku</title>
  <?php $this->load->view('assets/st'); ?>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('assets/navbar'); ?>
  <?php $this->load->view('assets/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Buku</a></li>
              <li class="breadcrumb-item active">Detail Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Detail</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings">
                    <?php echo form_open_multipart('buku/ubah'); ?>
                    <!-- <form class="form-horizontal" action="post"> -->
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
                    <!-- </form> -->
                    <?php echo form_close(); ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('assets/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('assets/js'); ?>
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();

  $('.select2').select2();
});
</script>
</body>
</html>
