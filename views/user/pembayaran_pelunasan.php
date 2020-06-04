<!-- untuk bagian head -->
<?php include_once 'atribut/head.php' ?>

<?php 
$id_pemasanan = $_GET['id_pemesanan'];
$sql          = "SELECT dta_pemesanan.*, dta_pembayaran.sisah_pembayaran, dta_barang.nama, dta_barang.satuan, dta_barang.kondisi FROM dta_pemesanan INNER JOIN dta_barang ON dta_pemesanan.kd_barang = dta_barang.kd_barang INNER JOIN dta_pembayaran ON dta_pemesanan.id_pemesanan = dta_pembayaran.id_pemesanan WHERE id_user = '$user[id_user]' AND dta_pembayaran.id_pemesanan = '$id_pemasanan'";
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
              <h3>Pelunasan Pembayaran</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <?php if (isset($_GET['validasi_ukuran'])) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Gagal!</strong> Ukuran Gambar terlalu besar!
            </div>
          <?php } else if (isset($_GET['validasi_ektensi'])) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Gagal!</strong> Ektensi gambar tidak sesuai yg diperbolehkan hanya jpeg, jpg dan png!
            </div>
          <?php } else if (isset($_GET['validasi_nama'])) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Gagal!</strong> Nama Gambar sudah ada silahkan diganti!
            </div>
          <?php } ?>

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

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pelunasan Pembayaran</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- form tambah barang -->
                  <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pemesanan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inp_id_pemesanan" value="<?= $row['id_pemesanan'] ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" value="<?= $row['nama'] ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="number" value="<?= $row['jumlah'] ?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                        <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" value="<?= $row['harga'] ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Total</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                        <input class="form-control col-md-7 col-xs-12 has-feedback-left" id="total" type="number" value="<?= $row['total'] ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Sisah Pembayaran <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                        <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" id="sisahpembyaran" value="<?=$row['sisah_pembayaran']?>" readonly="readonly" />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="inpnamabank" id="inpnamabank" class="form-control">
                          <option value="">- Pilih Bank -</option>
                          <option value="bri">BRI</option>
                          <option value="bni">BNI</option>
                          <option value="mandiri">Mandiri</option>
                        </select>
                      </div>
                    </div>

                    <!-- begin:: norek -->
                    <div class="item form-group" id="norek">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Rekening <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpnorek" placeholder="Masukkan Nomor Rekening Anda" />
                      </div>
                    </div>
                    <!-- end:: norek -->

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Pembayaran <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                        <input class="form-control col-md-7 col-xs-12 has-feedback-left" id="jumlah" type="number" name="inppembayaran" />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" id="status" type="text" name="inpstatus" placeholder="Status" readonly="readonly" />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Bukti <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="file" name="inpbukti" />
                      </div>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="pemesanan_history.php" class="btn btn-danger">Batal</a>
                        <input class="btn btn-warning" type="reset" name="kosongkan" value="Kosongkan">
                        <input class="btn btn-success" type="submit" name="konfirmasi" value="Konfirmasi">
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

    $(document).ready(function () {

      $('#norek').css('display', 'none');
      $('#inpnamabank').change(function () {
        var value = $(this).val();
        if (value != '') {
          $('#norek').slideDown("fast");
        } else {
          $('#norek').slideUp("fast");
        }
      });

      $('#jumlah').keyup(function() {
        var value = $(this).val();
        var sisah = $('#sisahpembyaran').val();

        if (parseInt(value) >= Math.abs(parseInt(sisah))) {
          $('#status').attr('value', 'Lunas');
        } else {
          $('#status').attr('value', 'Belum Lunas');
        }

      });

    });

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

  <?php 
  if (isset($_POST['konfirmasi'])) {
    $id_pembayaran = $_POST['inp_id_pembayaran'];
    $id_pemesanan  = $_POST['inp_id_pemesanan'];
    $nama_bank     = $_POST['inpnamabank'];
    $norek         = $_POST['inpnorek'];
    $jum_pem       = $_POST['inppembayaran'];
    $status        = $_POST['inpstatus'];

    // hasil pelunasan
    $pelunasan = $jum_pem + $row['sisah_pembayaran'];

    // waktu zona asia jakarta
    date_default_timezone_set('Asia/Jakarta');
    $waktu  = date("Y-m-d H.i.s");

    // untuk format foto
    $frmgambar = array('jpeg', 'jpg', 'png');
    // untuk ukuran foto
    $ukrgambar = 10 * 1024 * 1024;
    // mengambil data file berdasarkan jumlah
    $bukti   = basename($_FILES['inpbukti']['name']);
    $tmpgmbr = $_FILES['inpbukti']['tmp_name'];
    $szegmbr = $_FILES['inpbukti']['size'];
    $errgmbr = $_FILES['inpbukti']['error'];

    if ($errgmbr == 0) {
      if ($szegmbr > $ukrgambar) {
        echo "<script>document.location.href='pembayaran_konfirmasi.php?id_pemesanan=".$id_pemesanan."&validasi_ukuran';</script>";
        return false;
      } else if (!in_array(pathinfo($bukti, PATHINFO_EXTENSION), $frmgambar)) {
        echo "<script>document.location.href='pembayaran_konfirmasi.php?id_pemesanan=".$id_pemesanan."&validasi_ektensi';</script>";
        return false;
      } else if (file_exists("../../images/bukti_pembayaran/".$bukti)) {
        echo "<script>document.location.href='pembayaran_konfirmasi.php?id_pemesanan=".$id_pemesanan."&validasi_nama';</script>";
        return false;
      } else {

        if ($status == 'Lunas') {
          $mysqli->query("UPDATE dta_pemesanan SET status = '$status' WHERE id_pemesanan = '$id_pemesanan'");
          $sql3 = "UPDATE dta_pembayaran SET jumlah_pembayaran = '$pelunasan', sisah_pembayaran = '0', bukti2 = '$bukti' WHERE id_pemesanan = '$id_pemesanan'";
          $result = $mysqli->query($sql3);
        }   

        if ($result == true) {
          // upload gambar atau menyimpan gambar
          move_uploaded_file($tmpgmbr, "../../images/bukti_pembayaran/".$bukti);
          // apa bila berhasil
          echo "<script>document.location.href='pemesanan_history.php?berhasil';</script>";
        } else {
          echo "<script>document.location.href='pemesanan_history.php?gagal';</script>";
        }

      }
    }
  }
  ?>