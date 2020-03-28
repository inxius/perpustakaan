<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | Kelola Denda</title>
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
              <h1>Kelola Denda</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                <li class="breadcrumb-item active">Kelola Denda</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Kelola Denda</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">

                    <div class="active tab-pane" id="settings">
                      <?php echo form_open_multipart('denda/ubah'); ?>
                      <!-- <form class="form-horizontal" action="post"> -->
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
