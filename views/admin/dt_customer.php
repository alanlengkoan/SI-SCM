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
              <h3>Barang</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Customer</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telpon</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $query  = "SELECT dta_user.id_user, dta_user.nama, dta_user.email, dta_user.no_telpon, dta_customer.alamat FROM dta_customer INNER JOIN dta_user ON dta_customer.id_user = dta_user.id_user ORDER BY nama ASC";
                        $result = $mysqli->query($query);
                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $row['nama']; ?></td>
                             <td><?= $row['email']; ?></td>
                             <td><?= $row['no_telpon']; ?></td>
                             <td><?= $row['alamat']; ?></td>
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
          <div class="modal fade" id="modal-konfirmasihapusbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi</h4>
                      </div>
                      <div class="modal-body">
                          Apakah Anda Yakin Ingin Menghapus Data Barang Ini ?
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" id="hapus-data-barang" class="btn btn-danger">Hapus</a>
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

    $('#modal-konfirmasihapusbarang').on('show.bs.modal',
    function (event)
    {
      var div   = $(event.relatedTarget)
      var id    = div.data('id')
      var modal = $(this);
      modal.find('#hapus-data-barang').attr("href","dt_barang_hapus.php?kd_barang="+id);
    })

  });
</script>
