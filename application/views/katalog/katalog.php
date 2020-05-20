<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/katalog.css'); ?>">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Font Awesome JS -->
  <script src="https://kit.fontawesome.com/9bceecac14.js" crossorigin="anonymous"></script>

  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <title>Simple Perpus</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url(); ?>">Simple Perpus</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
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
    <div class="card mt-5">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4 col-lg-4">
            <h1>Katalog</h1>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
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
                    <button type="button" class="btn btn-warning" id="edit" name="button" data-toggle="modal" data-target="#modalEdit">
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
  </div>

  <!-- Modal Detail -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 col-lg-5">
              <img id="gambar" src="" alt="">
            </div>
            <div class="col-md-7 col-lg-7">
              <table>
                <tr>
                  <td>
                    <p>Kode Buku</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="kode"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Judul</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="judul"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Pengarang</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="pengarang"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Penerbit</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="penerbit"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>ISBN</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="isbn"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Jml Halaman</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="jmlHal"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Tahun Terbit</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="tahunTerbit"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Kategori</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="kategori"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Rak Buku</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="lokasi"> </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Deskripsi</p>
                  </td>
                  <td>
                    <p>=</p>
                  </td>
                  <td>
                    <p id="deskripsi"> </p>
                  </td>
                </tr>
              </table>

            </div>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Datatables -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });

    $('#myTable tbody tr #edit').click(function() {
      var id = $(this).parents("tr").attr("id");
      var base_url = '<?php echo site_url('katalog/getDetail/'); ?>';
      $.ajax({
        url: base_url + id,
        type: 'GET',
        dataType: 'json',
        error: function() {
          alert('Something is wrong');
        },
        success: function(data) {
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
          $('#modalEdit #gambar').attr("src", "http://localhost/perpustakaan/assets/img/" + data.dataKatalog[0].gambar)
        }
      });
    });
  </script>
</body>

</html>