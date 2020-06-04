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
              <h3>Bahan Baku</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- button tambah data -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="dt_bahan_baku_tambah.php" class="btn btn-primary">Tambah Bahan Baku</a>
            </div>
          </div>
            
            <!-- validasi untuk proses simpan, ubah, hapus data barang masuk -->
            <?php if (isset($_GET['simpan'])) : ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data Bahan Berhasil Ditambahkan !
                </div>
            <?php elseif (isset($_GET['ubah'])) : ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Ubah Data Bahan Berhasil !
                </div>
            <?php elseif (isset($_GET['hapus'])) : ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Hapus Data Bahan Berhasil !
                </div>
            <?php endif; ?>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Bahan</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Satuan Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query  = "SELECT * FROM dta_bahan_baku";
                        $result = $mysqli->query($query);
                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) :
                        ?>
                         <tr>
                             <td><?php echo $no++ ?></td>
                             <td><?php echo $row['id_bahan_baku']; ?></td>
                             <td><?php echo $row['nama']; ?></td>
                             <td align="center"><?php echo $row['jumlah']; ?></td>
                             <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                             <td><?= $row['satuan'] ?></td>
                             <td align="center">
                               <a class="btn btn-success" href="dt_bahan_baku_detail.php?id_bahan_baku=<?php echo $row['id_bahan_baku'] ?>"><i class="fa fa-folder-open"></i> </a>
                               <a class="btn btn-primary" href="dt_bahan_baku_ubah.php?id_bahan_baku=<?php echo $row['id_bahan_baku'] ?>"><i class="fa fa-edit"></i> </a>
                               <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row['id_bahan_baku'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapusbarang"><i class="fa fa-trash"></i> </a>
                             </td>
                         </tr>
                        <?php endwhile; ?>
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
      modal.find('#hapus-data-barang').attr("href","dt_bahan_baku_hapus.php?id_bahan_baku="+id);
    })

  });
</script>
