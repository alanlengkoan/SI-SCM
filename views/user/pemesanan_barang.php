<!-- untuk bagian head -->
<?php include_once 'atribut/head.php' ?>

<!-- untk pemberian kode otomatis -->
<?php

// untuk barang
$sql_1 = "SELECT * FROM dta_barang WHERE kd_barang = 'KDR-0001'";
$qry_1 = $mysqli->query($sql_1) or die('MySQL Salah ! '.mysqli_error($mysqli));
$rows  = $qry_1->fetch_array(MYSQLI_ASSOC);

$sql    = "SELECT id_pemesanan FROM dta_pemesanan";
$carkod = $mysqli->query($sql);
$datkod = $carkod->fetch_array(MYSQLI_ASSOC);
$jumdat = $carkod->num_rows;
$kodeoto = "";
$karakter = range('0', '9');
$max = count($karakter) - 1;
for ($i = 0; $i < 7; $i++) {
    $rand = mt_rand(0, $max);
    $kodeoto .= $karakter[$rand];
}
if ($datkod) {
    $nilkode  = substr($jumdat[0], 1);
    $kode     = (int) $nilkode;
    $kode     = $jumdat + 1;
    /*
    * $kodeoto untuk mengambil angka acak 
    * $kode mengambil jumlah data yang tersimpan
    */
    $kodeoto.=$kode;
} else {
    $kodeoto;
}
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
              <h3>Pemesanan Barang</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- untuk bagian waktu -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="waktu">
                  <p id="getwaktu"></p>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir row waktu -->

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
                  <h2>Form Pemesanan Barang</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- form tambah barang -->
                  <form class="form-horizontal form-label-left" method="post">
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Transaksi</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden" name="inpkdbar" value="<?= $rows['kd_barang'] ?>" />
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpidpemesanan" value="<?= $kodeoto.'1'; ?>" readonly>
                        <input type="hidden" name="inpiduser" value="<?= $user['id_user'] ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang Pesanan<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="jmlah" class="form-control col-md-7 col-xs-12" type="number" name="inpjumlah" placeholder="Masukkan Jumlah Barang" onkeyup="jumlah();" required="required">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                        <input id="setharga" class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inpharga" onkeyup="jumlah();" value="<?= $rows['harga'] ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Total <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                        <input id="total" class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inptotal" placeholder="Total Harga" readonly>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input class="btn btn-warning" type="reset" name="kosongkan" value="Kosongkan">
                        <input class="btn btn-success" type="submit" name="pesan" value="Pesan">
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

<!-- koding javascript -->
<script type="text/javascript">
  // prose penjumlahan
  function jumlah() {
    var txt1  = document.getElementById('jmlah').value;
    var txt2  = document.getElementById('setharga').value;
    var hasil = parseInt(txt1) * parseInt(txt2);
    if (!isNaN(hasil)) {
      document.getElementById('total').value = hasil;
    }
  }
  // pengambilan waktu
  function reloadwaktu() {
    var waktu = new Date();
    var tanggal = waktu.getDate();
    var bulan   = waktu.getMonth();
    var tahun   = waktu.getFullYear();
    var jam     = waktu.getHours();
    var menit   = waktu.getMinutes();
    var detik  = waktu.getSeconds();
    document.getElementById('getwaktu').innerHTML = "Tanggal, Waktu : " + tanggal + "/" + bulan + "/" + tahun + ", " + jam + ":" + menit + ":" + detik;
  }
</script>

<!-- koding php -->
<?php
// untuk proses input
if (isset($_POST['pesan'])) {
    $id_pemesanan = $_POST['inpidpemesanan'];
    $id_user      = $_POST['inpiduser'];
    $kd_barang    = $_POST['inpkdbar'];
    $jumlah       = $_POST['inpjumlah'];
    $harga        = $_POST['inpharga'];
    $total        = $_POST['inptotal'];
    $stus_peng    = 'On-Process';
    // waktu zona asia jakarta
    date_default_timezone_set('Asia/Jakarta');
    $waktu  = date("Y-m-d H.i.s");

    $sql   = "SELECT * FROM dta_barang WHERE kd_barang = '$kd_barang'";
    $query = $mysqli->query($sql);
    $data  = $query->fetch_array(MYSQLI_ASSOC);

    if ($data['jumlah'] >= $jumlah) {
      $query  = "INSERT INTO dta_pemesanan (id_pemesanan, id_user, kd_barang, jumlah, harga, total, status_pengantaran, waktu) VALUES ('$id_pemesanan', '$id_user', '$kd_barang', '$jumlah', '$harga', '$total', '$stus_peng', '$waktu')";
      $result = $mysqli->query($query);

      if ($result) {
        echo "<script>window.location=(href='pemesanan_history.php?&simpan')</script>";
      } else {
        echo "<script>window.location=(href='pemesanan_barang.php?&gagal')</script>";
      }

    } else {
      echo "<script>window.location=(href='pemesanan_barang.php?&stock_abis')</script>";
    }

}
?>