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
              <h3>History Pemesanan</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <?php if (isset($_GET['simpan'])) { ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              Data Barang Berhasil Ditambahkan !
          </div>
          <?php } else if (isset($_GET['ubah'])) { ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              Ubah Data Barang Berhasil !
          </div>
          <?php } else if (isset($_GET['berhasil'])) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Berhasil!</strong> Konfirmasi pembayaran berhasil!
            </div>
          <?php } else if (isset($_GET['gagal'])) { ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Gagal!</strong> Konfirmasi pembayaran gagal!
            </div>
          <?php } ?>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>History Pemesanan</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Pemesanan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                         $sql_h  = "SELECT dta_pemesanan.*, dta_barang.nama, dta_barang.satuan, dta_barang.kondisi FROM dta_pemesanan LEFT JOIN dta_barang ON dta_pemesanan.kd_barang = dta_barang.kd_barang WHERE id_user = '$user[id_user]'";
                        $result = $mysqli->query($sql_h);
                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                         <tr>
                             <td><?php echo $no++ ?></td>
                             <td><?php echo $row['id_pemesanan']; ?></td>
                             <td><?php echo $row['nama']; ?></td>
                             <td align="center"><?php echo $row['jumlah']; ?></td>
                             <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                             <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
                             <td><?php echo $row['satuan']; ?></td>
                             <td><?php echo $row['kondisi']; ?></td>
                             <td>
                               <?= $row['status'] == 'lunas' ? 'Lunas' : 'Belum Lunas' ?>
                             </td>
                             <td align="center">
                              <?php if ($row['status'] == 'lunas') { ?>
                                <a class="btn btn-success" href="pembayaran_detail.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>">Lihat Pembayaran</a>
                              <?php } else if ($row['status'] == 'pelunasan') { ?>
                                <a class="btn btn-warning" href="pembayaran_pelunasan.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>">Pelunasan Pembayaran</a>
                              <?php } else { ?>
                                <a class="btn btn-danger" href="pembayaran_konfirmasi.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>">Konfirmasi Pembayaran</a>
                              <?php } ?>
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