<!-- validasi akun -->
<?php
// untuk koneksi
session_start();
include_once ('../configs/koneksi.php');

if (isset($_POST['masuk'])) {

  $namauser = $_POST['inpuser'];
  $passuser = $_POST['inppass'];

  $sql   = "SELECT * FROM dta_user WHERE username = '$namauser' AND password = '$passuser'";
  $query = $mysqli->query($sql);
  $data  = $query->fetch_array(MYSQLI_ASSOC);

  if ($query->num_rows > 0) {

    if ($data['password'] == $passuser) {
       if ($data['level'] == 'admin') {

        $_SESSION['inpuser'] = $namauser;
        $_SESSION['level']   = 'admin';
        header("location: ../views/admin/admin.php");
        
      } else if ($data['level'] == 'user') {

        $_SESSION['inpuser'] = $namauser;
        $_SESSION['level']   = 'user';
        header("location: ../views/user/index.php");

      }
    } else {
      $user_or_pass = true;
    }

  } else {
    $user_or_pass = true;
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

  <style rel="stylesheet">
  body {
    background-image: url(img/mylovashop.jpg);
    background-position: center;
    background-attachment: fixed;
  }
  </style>

</head>

<body>

  <br>

  <!-- untuk login -->
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="card bg-light" style="margin-top: 100px;">
          <div class="card-header text-center">
            Silahkan Masuk
          </div>

          <div class="card-body">

            <?php if (isset($user_or_pass)) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                Silahkan <strong>Periksa</strong> Username atau Password <br> Anda Kembali !
              </div>
            <?php } ?>

            <form method="post">
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
                <a class="btn btn-danger" href="index.php">Batal</a>
                <input class="btn btn-success" type="submit" name="masuk" value="Masuk">
              </div>
            </form>
            <p>Jika belum punya akun silahkan daftar di <a href="daftar.php">sini</a>. </p>
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