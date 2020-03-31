<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Katalog Simple Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/custom/custom.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <style media="screen">
    .card { background-color: rgba(245, 245, 245, 1); }
    .card-header, .card-footer { opacity: 1}
    </style>
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
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('katalog'); ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Semua Katalog</a>
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
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($dataKatalog as $katalog) {
                  ?>
                  <tr id="<?php echo $katalog->idBuku; ?>">
                    <td><?php echo $katalog->kode ?></td>
                    <td><?php echo $katalog->judul ?></td>
                    <td><?php echo $katalog->pengarang ?></td>
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
      </div>


      <!-- Modal for Edit -->
      <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td> <p>Kode Buku</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="kode"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Judul</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="judul"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Pengarang</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="pengarang"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Penerbit</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="penerbit"> </p> </td>
                </tr>
                <tr>
                  <td> <p>ISBN</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="isbn"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Jml Halaman</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="jmlHal"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Tahun Terbit</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="tahunTerbit"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Kategori</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="kategori"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Rak Buku</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="lokasi"> </p> </td>
                </tr>
                <tr>
                  <td> <p>Deskripsi</p> </td>
                  <td> <p>=</p> </td>
                  <td> <p id="deskripsi"> </p> </td>
                </tr>
              </table>
                <!-- /.card-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form> -->
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>

    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
      });

      $('#example1 tbody tr #edit').click(function(){
        var id = $(this).parents("tr").attr("id");
        var base_url = '<?php echo site_url('katalog/getDetail/'); ?>';
        $.ajax({
          url: base_url+id,
          type: 'GET',
          dataType: 'json',
          error: function(){
            alert('Something is wrong');
          },
          success: function(data){
            $('#modalEdit #kode').html(data.dataKatalog[0].kode);
            $('#modalEdit #judul').html(data.dataKatalog[0].judul);
            $('#modalEdit #pengarang').html(data.dataKatalog[0].pengarang);
            $('#modalEdit #penerbit').html(data.dataKatalog[0].namaPenerbit);
            $('#modalEdit #isbn').html(data.dataKatalog[0].isbn);
            $('#modalEdit #jmlHal').html(data.dataKatalog[0].jmlHal);
            $('#modalEdit #tahunTerbit').html(data.dataKatalog[0].tahunTerbit);
            $('#modalEdit #kategori').html(data.dataKatalog[0].namaKategori);
            $('#modalEdit #lokasi').html(data.dataKatalog[0].namaLokasi);
            $('#modalEdit #deskripsi').html(data.dataKatalog[0].deskripsi);
          }
        });
      });
    </script>

  </body>
</html>
