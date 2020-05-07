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

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <title>Perpustakaan | Semua Transaksi</title>
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
                              <h5 class="nav-link"><a href="<?php echo site_url('admin'); ?>">Home</a> / Semua Transaksi</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="container" id="main-content">
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-6 col-lg-6">
                          <h1>Semua Transaksi</h1>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <table id="myTable" class="table table-striped table-bordered" style="width:100%">
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
    <!-- End Modal -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?php echo base_url('assets/js/customSidebar.js'); ?>"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        $('#myTable tbody tr #edit').click(function(){
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
    </script>
</body>
</html>
