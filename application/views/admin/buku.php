<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | Buku</title>
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
              <h1>Buku</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Buku</li>
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
          <h3 class="card-title">Buku</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary" name="button" id="tambah"
            data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus-circle"></i> Tambah Buku
            </button>
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataBuku as $buku) {
                ?>
                <tr id="<?php echo $buku->idBuku; ?>">
                  <td><?php echo $buku->kode ?></td>
                  <td><?php echo $buku->judul ?></td>
                  <td><?php echo $buku->pengarang ?></td>
                  <td><?php echo $buku->namaPenerbit ?></td>
                  <td><?php echo $buku->namaKategori ?></td>
                  <td><?php echo $buku->namaLokasi ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="buku/detailBuku/<?php echo $buku->idBuku; ?>">
                        <button type="button" class="btn btn-warning" id="edit" name="button">
                        <i class="fas fa-edit"></i>
                        </button>
                      </a>

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
        <?php echo form_open_multipart('buku/tambah'); ?>
          <div class="card-body">
            <div class="form-group">
              <label for="inputKode">Kode Buku</label>
              <input type="text" class="form-control" id="inputKode" name="kodeBuku" placeholder="Kode Buku" required>
            </div>
            <div class="form-group">
              <label for="inputJudul">Judul</label>
              <input type="text" class="form-control" id="inputJudul" name="judulBuku" placeholder="Judul Buku" required>
            </div>
            <div class="form-group">
              <label for="inputPengarang">Pengarang</label>
              <input type="text" class="form-control" id="inputPengarang" name="pengarang" placeholder="Pengarang" required>
            </div>
            <div class="form-group">
              <label for="inputPenerbit">Penerbit</label>
              <select class="form-control select2" id="inputPenerbit" name="penerbit" style="width: 100%;">
                <?php foreach ($dataPenerbit as $penerbit) {
                  ?>
                  <option value="<?php echo $penerbit->idPenerbit; ?>"><?php echo $penerbit->namaPenerbit; ?></option>
                  <?php
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputISBN">ISBN</label>
              <input type="text" class="form-control" id="inputISBN" name="isbn" placeholder="ISBN" required>
            </div>
            <div class="form-group">
              <label for="inputTahun">Tahun Terbit</label>
              <input type="text" class="form-control" id="inputTahun" name="tahun" placeholder="Tahun Terbit" required>
            </div>
            <div class="form-group">
              <label for="jmlHal">Jumlah Halaman</label>
              <input type="text" class="form-control" id="jmlHal" name="jmlHal" placeholder="Jumlah Halaman" required>
            </div>
            <div class="form-group">
              <label for="jmlBuku">Jumlah Buku</label>
              <input type="text" class="form-control" id="jmlBuku" name="jmlBuku" placeholder="Jumlah Buku" required>
            </div>
            <div class="form-group">
              <label for="inputKategori">Kategori</label>
              <select class="form-control select2" id="inputKategori" name="kategori" style="width: 100%;">
                <?php foreach ($dataKategori as $kategori) {
                  ?>
                  <option value="<?php echo $kategori->idKategori; ?>"><?php echo $kategori->namaKategori; ?></option>
                  <?php
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputLokasi">Lokasi</label>
              <select class="form-control select2" id="inputLokasi" name="lokasi" style="width: 100%;">
                <?php foreach ($dataLokasi as $lokasi) {
                  ?>
                  <option value="<?php echo $lokasi->idLokasi; ?>"><?php echo $lokasi->namaLokasi; ?></option>
                  <?php
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputDeskripsi">Deskripsi</label>
              <textarea class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="gambarBuku" id="customFile" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>

          <!-- /.card-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        <?php echo form_close(); ?>
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

$('#example1 tbody tr #hapus').click(function(){
  // alert('aa');
  var id = $(this).parents("tr").attr("id");
  var base_url = '<?php echo site_url('buku/hapus/'); ?>';
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
