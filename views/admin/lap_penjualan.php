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
              <h3>Laporan Transaksi Barang Keluar</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- awal cetak semua -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <a href="laporan/lap_dta_cetak_brngkluar.php" target="_blank">
                <button class="btn btn-success" type="submit" name="cetak">Cetak Semua</button>
              </a>
            </div>
          </div>
          <!-- akhir cetak semua -->

          <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Data Penjualan</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                    <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Jumlah <br> Barang Keluar</th>
                            <th>Harga Barang</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Waktu</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql    = "SELECT dta_pemesanan.*, dta_user.nama AS nama_user, dta_barang.nama AS nama_barang, dta_barang.satuan, dta_barang.kondisi FROM dta_pemesanan LEFT JOIN dta_barang ON dta_pemesanan.kd_barang = dta_barang.kd_barang LEFT JOIN dta_user ON dta_pemesanan.id_user = dta_user.id_user";
                            $result = $mysqli->query($sql);
                            $no = 1;
                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_pemesanan']; ?></td>
                                <td><?php echo $row['nama_user']; ?></td>
                                <td><?php echo $row['nama_barang']; ?></td>
                                <td align="center"><?php echo $row['jumlah']; ?></td>
                                <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                                <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
                                <td><?php if ($row['status'] == 'lunas') {echo 'Lunas';} else if ($row['status'] == 'pelunasan') {echo 'Pelunasan';} else {echo 'Konfirmasi Pembayaran';} ?></td>
                                <td><?php echo $row['waktu']; ?></td>
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
