<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <?php $this->load->view('assets/st'); ?>
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
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
              <h1>Penerbit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Penerbit</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Penerbit</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-primary" name="button" id="tambah"
              data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus-circle"></i> Tambah Penerbit
            </button>
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>No.Telp</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataPenerbit as $penerbit) {
                ?>
                <tr id="<?php echo $penerbit->id; ?>">
                  <td><?php echo $penerbit->nama ?></td>
                  <td><?php echo $penerbit->telp ?></td>
                  <td><?php echo $penerbit->alamat ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="#">
                        <button type="button" class="btn btn-warning" name="button">
                          <i class="fas fa-edit"></i>
                        </button>
                      </a>
                      <button type="button" class="btn btn-danger" id="hapus" name="button">
                        <i class="fas fa-trash"></i>
                      </button>
                      <!-- <a href="<?php //echo site_url("penerbit/hapus/$penerbit->id"); ?>">
                        <button type="button" class="btn btn-danger" name="button">
                          <i class="fas fa-trash"></i>
                        </button>
                      </a> -->
                    </div>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Penerbit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form role="form" action="<?php echo site_url('penerbit/tambah'); ?>" method="post">
            <input type="hidden" name="aksi" value="ubah_profil">
            <div class="card-body">
              <div class="form-group">
                <label for="inputNama">Nama</label>
                <input type="text" class="form-control" id="inputNama" name="nama" value="" required>
              </div>
              <div class="form-group">
                <label for="inputTelp">Nomor Telpon</label>
                <input type="text" class="form-control" id="inputTelp" name="telp" value="" required>
              </div>
              <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <!-- <input type="email" class="form-control" id="inputAlamat" name="alamat" value=""> -->
                <textarea class="form-control" id="inputAlamat" name="alamat" aria-label="With textarea" required></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('assets/footer'); ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('assets/js'); ?>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>

<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});

$('#example1 tbody tr #hapus').click(function(){
  // alert('aa');
  var id = $(this).parents("tr").attr("id");
  var base_url = '<?php echo site_url('penerbit/hapus/'); ?>';
  if (confirm('Are you sure to remove this record ?')) {
    $.ajax({
      url: base_url+id,
      type: 'DELETE',
      error: function(){
        alert('Something is wrong');
      },
      success: function(){
        $("#"+id).remove();
        alert("Record removed successfully");
      }
    });
  }
});

$(function () {
  $("#example1").DataTable();
});

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus');
});


</script>
</body>
</html>
