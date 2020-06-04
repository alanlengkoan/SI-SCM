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
              <h3>Laporan Distributor</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- awal cetak semua -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="laporan/lap_distributor_cetak.php" target="_blank">
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
                  <h2>Data Distributor</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Distribusi</th>
                              <th>Nama Distribusi</th>
                              <th>No. Hp / Telepon</th>
                              <th>Fax</th>
                              <th>Email</th>
                              <th>Alamat</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                          $query  = "SELECT * FROM dta_distributor";
                          $result = $mysqli->query($query);
                          $no = 1;
                          while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                          <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $row['id_distributor']; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['nomor']; ?></td>
                              <td><?php echo $row['fax']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['alamat']; ?></td>
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
