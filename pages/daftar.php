<?php
// untuk koneksi
include_once ('../configs/koneksi.php');

if (isset($_POST['daftar'])) {

  $nama      = $_POST['inpnama'];
  $nama_user = $_POST['inpuser'];
  $pass_user = $_POST['inppass'];
  $email     = $_POST['inpemail'];
  $no_telpon = $_POST['inpphone'];
  $alamat    = $_POST['inpalamat'];
  $level     = 'user';

  $sql    = "SELECT id_user FROM dta_user";
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
      $kodeoto.'1';
  }

  $sql1 = "INSERT INTO dta_user (id_user, nama, username, password, email, no_telpon, level) VALUES ('$kodeoto', '$nama', '$nama_user', '$pass_user', '$email', '$no_telpon', '$level')";
  $mysqli->query($sql1);
  $sql2 = "INSERT INTO dta_supplier (id_supplier, alamat) VALUES ('$kodeoto', '$alamat')";
  $insert = $mysqli->query($sql2);

  if ($insert) {
    $berhasil = true;
  } else {
    $gagal = true;
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi SCM</title>

  <!-- Bootstrap -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

  <br>

  <!-- untuk login -->
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="card bg-light mb-3">
          <div class="card-header text-center">
            Silahkan Masuk
          </div>

          <div class="card-body">

            <?php if (isset($berhasil)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Selamat</strong> Anda telah terdaftar silahkan login!
            </div>
            <?php } if (isset($gagal)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Maaf</strong> Anda gagal mendaftar silahkan di cek kembali!
            </div>
            <?php } ?>

            <form method="post">
              <div class="form-group">
                <label>Nama</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><i class="fa fa-user"></i> </div>
                  <input class="form-control" type="text" name="inpnama" placeholder="Nama Retail" required>
                </div>
              </div>
              <div class="form-group">
                <label>Username</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><i class="fa fa-user"></i> </div>
                  <input class="form-control" type="text" name="inpuser" placeholder="Username" required>
                </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><i class="fa fa-key"></i> </div>
                  <input class="form-control" type="password" name="inppass" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><i class="fa fa-envelope"></i> </div>
                  <input class="form-control" type="email" name="inpemail" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                <label>Nomor Telpon</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><i class="fa fa-phone"></i> </div>
                  <input class="form-control" type="text" name="inpphone" placeholder="Nomor Telpon" required>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i> </div>
                  <textarea name="inpalamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>
              <div class="form-group">
                <a class="btn btn-danger" href="index.php">Batal</a>
                <input class="btn btn-success" type="submit" name="daftar" value="Daftar">
              </div>
            </form>
            <p>Jika sudah punya akun silahkan masuk di <a href="masuk.php">sini</a>. </p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>