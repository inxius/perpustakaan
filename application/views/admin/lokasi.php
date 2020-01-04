<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | Lokasi</title>
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
              <h1>Lokasi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lokasi</li>
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
            <h3 class="card-title">Lokasi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-primary" name="button" id="tambah"
              data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus-circle"></i> Tambah Lokasi
            </button>
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Lokasi</th>
                <th>Nama Lokasi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataLokasi as $lokasi) {
                ?>
                <tr id="<?php echo $lokasi->idLokasi; ?>">
                  <td><?php echo $lokasi->idLokasi ?></td>
                  <td><?php echo $lokasi->namaLokasi ?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning" id="edit" name="button"
                      data-toggle="modal" data-target="#modalEdit">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-danger" id="hapus" name="button">
                        <i class="fas fa-trash"></i>
                      </button>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Lokasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form role="form" action="<?php echo site_url('lokasi/tambah'); ?>" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputNama">Nama Lokasi</label>
                <input type="text" class="form-control" id="inputNama" name="nama" value="" required>
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


  <!-- Modal for Edit -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Lokasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form role="form" action="<?php echo site_url('lokasi/edit'); ?>" method="post">
            <input type="hidden" name="idLokasi" id="idLokasi" value="">
            <div class="card-body">
              <div class="form-group">
                <label for="inputNama">Nama Lokasi</label>
                <input type="text" class="form-control" id="inputNama" name="nama" value="" required>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
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

$('#example1 tbody tr #edit').click(function(){
  var id = $(this).parents("tr").attr("id");
  var base_url = '<?php echo site_url('lokasi/getLokasi/'); ?>';
  $.ajax({
    url: base_url+id,
    type: 'GET',
    dataType: 'json',
    error: function(){
      alert('Something is wrong');
    },
    success: function(data){
      $('#modalEdit #idLokasi').val(data.dataLokasiById[0].idLokasi);
      $('#modalEdit #inputNama').val(data.dataLokasiById[0].namaLokasi);
    }
  });
});

$('#example1 tbody tr #hapus').click(function(){
  // alert('aa');
  var id = $(this).parents("tr").attr("id");
  var base_url = '<?php echo site_url('lokasi/hapus/'); ?>';
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
