<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

  <body class="nav-md">

    <!-- awal container -->
    <div class="container body">
      <div class="main_container">

        <!-- menu samping -->
        <?php include_once 'atribut/header.php'; ?>

        <!-- awal isi halaman -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Retail</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- validasi untuk proses simpan, ubah, hapus data barang masuk -->
            <?php if (isset($_GET['simpan'])) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data Retail Berhasil Ditambahkan !
            </div>
            <?php } else if (isset($_GET['gagal'])) { ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data Retail Gagal Ditambahkan !
            </div>
            <?php } else if (isset($_GET['ubah'])) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Ubah Data Retail Berhasil !
            </div>
            <?php } else if (isset($_GET['hapus'])) { ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Hapus Data Retail Berhasil !
            </div>
            <?php } ?>

            <!-- untuk bagian tabel dan awal row tabel -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Retail</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Retail</th>
                              <th>Nama Retail</th>
                              <th>No. Hp / Telepon</th>
                              <th>Fax</th>
                              <th>Email</th>
                              <th>Website</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                          $query  = "SELECT * FROM dta_user INNER JOIN dta_supplier ON dta_user.id_user = dta_supplier.id_supplier";
                          $result = $mysqli->query($query);
                          $no = 1;
                          while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                          <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $row['id_supplier']; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['no_telpon']; ?></td>
                              <td><?php echo ($row['fax'] == null) ? 'Tidak Ada!' : $row['fax'] ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo ($row['website'] == null) ? 'Tidak Ada!' : $row['website'] ?></td>
                              <td><?php echo $row['alamat']; ?></td>
                              <td align="center">
                                <a class="btn btn-success" href="dt_supplier_detail.php?id_supplier=<?php echo $row['id_supplier'] ?>"><i class="fa fa-folder-open"></i> </a>
                                <a class="btn btn-primary" href="dt_supplier_ubah.php?id_supplier=<?php echo $row['id_supplier'] ?>"><i class="fa fa-edit"></i> </a>
                                <a class="btn btn-danger" href="#" data-id="<?php echo $row['id_supplier'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapusretail"><i class="fa fa-trash"></i> </a>
                              </td>
                          </tr>

                          <?php } ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
            <!-- akhir row tabel -->

            <!--Modal konfirmasi menggunakan bootstrap 3.3.7-->
            <div class="modal fade" id="modal-konfirmasihapusretail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Ingin Menghapus Data Retail Ini ?
                        </div>
                        <div class="modal-footer">
                          <a href="#" id="hapus-data-supplier" class="btn btn-danger">Hapus</a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
        <!-- akhir isi halaman -->

        <!-- footer -->
        <?php include_once 'atribut/footer.php'; ?>

      </div>
    </div>
    <!-- akhir container -->

  <!-- untuk bagian foot -->
  <?php include_once 'atribut/foot.php'; ?>

  <!-- koding hapus -->
  <script type="text/javascript">
    $(document).ready(function () {

      $('#modal-konfirmasihapusretail').on('show.bs.modal',
      function (event)
      {
        var div   = $(event.relatedTarget)
        var id    = div.data('id')
        var modal = $(this);
        modal.find('#hapus-data-supplier').attr("href","dt_supplier_hapus.php?id_supplier="+id);
      })

    });
  </script>
