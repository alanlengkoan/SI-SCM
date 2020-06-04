<!-- untuk bagian head -->
<?php include_once 'atribut/head.php' ?>

<!-- untk pemberian kode otomatis -->
<?php

// untuk barang
$sql_1 = "SELECT * FROM dta_user INNER JOIN dta_supplier ON dta_user.id_user = dta_supplier.id_supplier WHERE username = '$_SESSION[inpuser]'";
$qry_1 = $mysqli->query($sql_1) or die('MySQL Salah ! '.mysqli_error($mysqli));
$rows  = $qry_1->fetch_array(MYSQLI_ASSOC);
?>

<body class="nav-md" onload="setInterval('reloadwaktu()');">

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
              <h3>Profil</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <?php if (isset($_GET['gagal'])) { ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Transaksi Anda gagal diproses!
          </div>
          <?php } else if (isset($_GET['stock_abis'])) { ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf Barang yang Anda pesan stocknya telah abis!
          </div>
          <?php } ?>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Profil Anda</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- form tambah barang -->
                  <form class="form-horizontal form-label-left" action="profil_ubah.php" method="post">
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Retail</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              : <?= $rows['nama'] ?>
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              : <?= $rows['email'] ?>
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telepon</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              : <?= $rows['no_telpon'] ?>
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              : <?= ($rows['fax'] == null) ? 'Silahkan Ubah Data Anda!' : $rows['fax'] ?>
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              : <?= ($rows['website'] == null) ? 'Silahkan Ubah Data Anda!' : $rows['website'] ?>
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              : <?= ($rows['alamat'] == null) ? 'Silahkan Ubah Data Anda!' : $rows['alamat'] ?>
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                              <a href="profil_ubah.php" class="btn btn-success">Ubah</a>
                          </div>
                      </div>
                  </form>
                  <!-- akhir form tambah barang -->

                </div>
              </div>
            </div>
          </div>
          <!-- akhir row form -->

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