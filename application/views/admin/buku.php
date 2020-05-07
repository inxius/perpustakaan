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

    <!-- Select2JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <title>Perpustakaan | Buku</title>
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
                              <h5 class="nav-link"><a href="<?php echo site_url('admin'); ?>">Home</a> / Buku</h5>
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
                        <div class="col-md-4 col-lg-4">
                          <h1>Buku</h1>
                        </div>
                        <div class="col-md-8 col-lg-8">
                          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" name="button"><i class="fas fa-plus"></i> Tambah Buku</button>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Buku-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- form start -->
            <?php echo form_open_multipart('buku/tambah'); ?>
              <div class="card-body">
                <!-- Row -->
                <div class="row">
                  <!-- Left Col -->
                  <div class="col-md-6 col-lg-6">
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
                  </div>
                  <!-- End Left Col -->

                  <!-- Right Col -->
                  <div class="col-md-6 col-lg-6">
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
                  </div>
                  <!-- End Right Col -->
                </div>
                <!-- End Row -->

                <!-- Bottom Row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="inputDeskripsi">Deskripsi</label>
                        <textarea class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambarBuku" id="customFile" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                </div>
                <!-- End Bottom Row -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            <?php echo form_close(); ?>
            <!-- End Form -->
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

    <!-- bs-custom-file-input -->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <!-- Select2JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script src="<?php echo base_url('assets/js/customSidebar.js'); ?>"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            bsCustomFileInput.init();
            $('.select2').select2();
        } );

        $('#myTable tbody tr #hapus').click(function(){
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
    </script>
</body>
</html>
