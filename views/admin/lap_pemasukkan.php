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
              <h3>Laporan Pemasukkan Bahan Baku</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- awal cetak semua -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <a href="laporan/lap_dta_cetak_brngmsuk.php" target="_blank">
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
                   <h2>Data Pemasukkan Bahan Baku</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                    <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama Distributor</th>
                            <th>Nama Bahan</th>
                            <th>Jumlah <br> Barang Masuk</th>
                            <th>Harga Barang</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          $sql    = "SELECT dta_trnsaksi_brng_masuk.*, dta_distributor.nama AS nama_distributor, dta_bahan_baku.nama AS nama_bahan_baku FROM dta_trnsaksi_brng_masuk INNER JOIN dta_distributor ON dta_trnsaksi_brng_masuk.id_distributor = dta_distributor.id_distributor INNER JOIN dta_bahan_baku ON dta_trnsaksi_brng_masuk.id_bahan_baku = dta_bahan_baku.id_bahan_baku";
                          $result = $mysqli->query($sql);

                          $no = 1;
                          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $row['id_transaksi']; ?></td>
                              <td><?php echo $row['nama_distributor']; ?></td>
                              <td><?php echo $row['nama_bahan_baku']; ?></td>
                              <td align="center"><?php echo $row['jumlah']; ?></td>
                              <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                              <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
                            </tr>
                            <?php
                            $no++;
                          }
                          ?>

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
