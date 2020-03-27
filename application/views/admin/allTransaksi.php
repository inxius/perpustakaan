<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | Semua Transaksi</title>
  <?php $this->load->view('assets/st'); ?>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
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
              <h1>Semua Transaksi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                <li class="breadcrumb-item active">Semua Transaksi</li>
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
            <h3 class="card-title">Semua Transaksi</h3>
          </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataTransaksi as $transaksi) {
                ?>
                <tr id="<?php echo $transaksi->idTransaksi; ?>">
                  <td><?php echo $transaksi->nomorAnggota ?></td>
                  <td><?php echo $transaksi->namaAnggota ?></td>
                  <td><?php echo $transaksi->judul ?></td>
                  <td><?php echo $transaksi->statusPinjam ?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning" id="edit" name="button"
                      data-toggle="modal" data-target="#modalEdit">
                      <i class="fas fa-check-circle"></i>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Pinjam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form" action="<?php echo site_url('transaksi/pinjam'); ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="inputAnggota">Anggota</label>
              <select class="form-control select2" id="inputAnggota" name="anggota" style="width: 100%;">
                <?php foreach ($dataAnggota as $anggota) {
                  ?>
                  <option value="<?php echo $anggota->idAnggota; ?>">
                    <?php echo "$anggota->nomorAnggota - $anggota->namaAnggota"; ?>
                  </option>
                  <?php
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputBuku">Buku</label>
              <select class="form-control select2" id="inputBuku" name="buku" style="width: 100%;">
                <?php foreach ($dataBuku as $buku) {
                  ?>
                  <option value="<?php echo $buku->idBuku; ?>">
                    <?php echo "$buku->kode - $buku->judul"; ?>
                  </option>
                  <?php
                } ?>
              </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form" action="<?php echo site_url('transaksi/kembali'); ?>" method="post">
          <input type="hidden" name="idTransaksi" id="idTransaksi" value="">
          <input type="hidden" name="tglKembali" id="inputTglKembali" value="">
          <input type="hidden" name="denda" id="inputDenda" value="">
          <div class="card-body">
            <div class="form-group">
              <label for="inputNomorAnggota">Nomor Anggota</label>
              <input type="text" class="form-control" id="inputNomorAnggota"
              name="nomorAnggota" value="" disabled>
            </div>
            <div class="form-group">
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control" id="inputNama" name="nama" value="" disabled>
            </div>
            <div class="form-group">
              <label for="inputJudul">Judul Buku</label>
              <input type="text" class="form-control" id="inputJudul" name="judul" value="" disabled>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label for="inputTglPinjam">Tanggal Pinjam</label>
                  <input type="text" class="form-control" id="inputTglPinjam" name="tglPinjam" value="" disabled>
                </div>
                <div class="col-sm-6">
                  <label for="inputTglKembali">Tanggal Kembali</label>
                  <input type="text" class="form-control" id="inputTglKembali" name="ftglKembali" value="" disabled>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputDenda">Denda</label>
              <input type="text" class="form-control" id="inputDenda" name="fdenda" value="" disabled>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-primary">Transaksi Kembali</button> -->
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
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script>
$(document).ready(function () {
  bsCustomFileInput.init();

  $('.select2').select2();
});

$('#example1 tbody tr #edit').click(function(){
  var id = $(this).parents("tr").attr("id");
  var base_url = '<?php echo site_url('Trshistory/getDetail/'); ?>';
  $.ajax({
    url: base_url+id,
    type: 'GET',
    dataType: 'json',
    error: function(){
      alert('Something is wrong');
    },
    success: function(data){
      $('#modalEdit #idTransaksi').val(data.detail[0].idTransaksi);
      $('#modalEdit #inputNomorAnggota').val(data.detail[0].nomorAnggota);
      $('#modalEdit #inputNama').val(data.detail[0].namaAnggota);
      $('#modalEdit #inputJudul').val(data.detail[0].judul);
      $('#modalEdit #inputTglPinjam').val(data.detail[0].tglPinjam);
      $('#modalEdit #inputTglKembali').val(data.detail[0].tglKembali);
      $('#modalEdit #inputDenda').val("Rp. "+data.detail[0].denda+".-");
    }
  });
});

$('#example1 tbody tr #hapus').click(function(){
  // alert('aa');
  var id = $(this).parents("tr").attr("id");
  var base_url = '<?php echo site_url('anggota/hapus/'); ?>';
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
