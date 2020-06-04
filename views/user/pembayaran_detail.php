<!-- untuk bagian head -->
<?php include_once 'atribut/head.php' ?>

<?php 
$id_pemasanan = $_GET['id_pemesanan'];
$sql          = "SELECT dta_pembayaran.id_pembayaran, dta_pembayaran.id_pemesanan, dta_barang.nama, dta_barang.satuan, dta_barang.kondisi, dta_pemesanan.jumlah, dta_pemesanan.harga, dta_pemesanan.total, dta_pembayaran.bank, dta_pembayaran.jumlah_pembayaran, dta_pemesanan.status, dta_pembayaran.bukti1, dta_pembayaran.bukti2 FROM dta_pemesanan
                INNER JOIN dta_barang ON dta_pemesanan.kd_barang = dta_barang.kd_barang 
                INNER JOIN dta_pembayaran ON dta_pemesanan.id_pemesanan = dta_pembayaran.id_pemesanan
                WHERE id_user = '$user[id_user]' AND dta_pembayaran.id_pemesanan = '$id_pemasanan'";
$query        = $mysqli->query($sql);
$row          = $query->fetch_array(MYSQLI_ASSOC);
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
              <h3>Konfirmasi Pembayaran</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Konfirmasi Pembayaran</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row">
                    <div class="col-lg-6">
                      <!-- form tambah barang -->
                      <form class="form-horizontal form-label-left">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pembayaran</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="inp_id_pemesanan" value="<?= $row['id_pembayaran'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pemesanan</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="inp_id_pemesanan" value="<?= $row['id_pemesanan'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['nama'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['satuan'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Kondisi</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['kondisi'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah pesan</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['jumlah'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga/unit</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= "Rp. ". number_format($row['harga'], 0, ",", "."); ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Total harga</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= "Rp. ". number_format($row['total'], 0, ",", "."); ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['bank'] ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Transfer</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= "Rp. ". number_format($row['jumlah_pembayaran'], 0, ",", "."); ?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['status'] ?>" readonly="readonly">
                          </div>
                        </div>
                      </form>
                      <!-- akhir form tambah barang -->
                    </div>
                    <div class="col-lg-6">
                      <img src="<?= ($row['bukti1'] == null) ? '../../images/konfirmasi.png' : '../../images/bukti_pembayaran/'.$row['bukti1'] ?>" class="img-responsive" alt="">
                      <br><br>
                      <img src="<?= ($row['bukti2'] == null) ? '../../images/konfirmasi.png' : '../../images/bukti_pembayaran/'.$row['bukti2'] ?>" class="img-responsive" alt="">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <a href="pemesanan_history.php" class="btn btn-primary">&nbsp;Kembali</a>

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