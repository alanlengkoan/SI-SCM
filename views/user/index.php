<!-- index admin -->
<?php include_once 'atribut/head.php' ?>

<body class="nav-md">
  <!-- awal container -->
  <div class="container body">
    <div class="main_container">

      <!-- menu samping -->
      <?php include_once 'atribut/header.php' ?>

      <!-- awal isi halaman -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dashboard</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <h3>Sistem Informasi Manajemen Rantai Pasok Pada MyLovaaShop Berbasis Website</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="">
                <div class="x_content">
                  <div class="row">
                    <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fa fa-cubes"></i>
                        </div>
                        <?php
                        $sql    = "SELECT * FROM dta_barang WHERE kd_barang = 'KDR-0001'";
                        $carkod = $mysqli->query($sql);
                        $rows   = $carkod->fetch_array(MYSQLI_ASSOC);
                         ?>
                        <div class="count"><?= $rows['jumlah'] ?></div>
                        <h3><a href="dt_barang.php">Jumlah Barang</a> </h3>
                      </div>
                    </div>
                    <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fa fa-building-o"></i>
                        </div>
                        <?php
                        $sql    = "SELECT * FROM dta_pemesanan WHERE id_user = '$user[id_user]'";
                        $carkod = $mysqli->query($sql);
                        $jumdat = $carkod->num_rows;
                         ?>
                        <div class="count"><?php echo $jumdat; ?></div>
                        <h3><a href="pemesanan_history.php">History Pemesanan</a> </h3>
                      </div>
                    </div>
                  </div>
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

<?php include_once 'atribut/foot.php'; ?>
