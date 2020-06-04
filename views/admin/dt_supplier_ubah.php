<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<!-- untk pemberian kode otomatis -->
<?php
$idsup = $_GET['id_supplier'];
$sql   = "SELECT * FROM dta_user INNER JOIN dta_supplier ON dta_user.id_user = dta_supplier.id_supplier WHERE id_supplier = '$idsup'";
$query = $mysqli->query($sql);
$row   = $query->fetch_array(MYSQLI_ASSOC);
?>

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
               <h3>Ubah Supplier</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Supplier</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" method="post">

                    <!-- untuk id supplier -->
                    <input type="hidden" name="inpidsupplier" value="<?= $row['id_supplier'] ?>">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Retail</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpnama"
                          value="<?= $row['nama'] ?>" />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpemail"
                          value="<?= $row['email'] ?>" />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telepon</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpnomor"
                          value="<?= $row['no_telpon'] ?>" />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpfax"
                          <?= ($row['fax'] == null) ? 'placeholder="Masukkan Fax"' : 'value="'.$row['fax'].'"' ?> />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="inpwebsite"
                          <?= ($row['website'] == null) ? 'placeholder="Masukkan Website"' : 'value="'.$row['website'].'"' ?> />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control col-md-7 col-xs-12" name="inpalamat" id="" cols="30" rows="10"
                          <?= ($row['alamat'] == null) ? 'placeholder="Masukkan Alamat"' : '' ?>><?= ($row['alamat'] != null) ? $row['alamat'] : '' ?></textarea>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="profil.php" class="btn btn-danger">Batal</a>
                        <input class="btn btn-success" type="submit" name="ubah" value="Ubah">
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

<?php 
if (isset($_POST['ubah'])) {
    $idsupplier = $_POST['inpidsupplier'];
    $nama       = $_POST['inpnama'];
    $email      = $_POST['inpemail'];
    $nomor      = $_POST['inpnomor'];
    $fax        = $_POST['inpfax'];
    $website    = $_POST['inpwebsite'];
    $alamat     = $_POST['inpalamat'];

    $sql_1 = "UPDATE dta_supplier SET fax = '$fax', website = '$website', alamat = '$alamat' WHERE id_supplier = '$idsupplier'";
    $sql_2 = "UPDATE dta_user SET nama = '$nama', email = '$email', no_telpon = '$nomor' WHERE id_user = '$idsupplier'";
    $qry_1 = $mysqli->query($sql_1) or die('MySQLI Salah ! '.mysqli_error($mysqli));
    $qry_2 = $mysqli->query($sql_2) or die('MySQLI Salah ! '.mysqli_error($mysqli));

    if ($qry_1 == true && $qry_2 == true) {
      echo "<script>window.location=(href='dt_supplier.php?ubah');</script>";
    } else {
      echo "<script>window.alert('Gagal !');</script>";
      echo "<script>window.location=(href='dt_supplier.php');</script>";
    }
}
?>