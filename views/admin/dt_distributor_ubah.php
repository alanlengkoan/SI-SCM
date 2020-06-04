<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<!-- untk pemberian kode otomatis -->
<?php
$idsup = $_GET['id_distributor'];
$sql   = "SELECT * FROM dta_distributor WHERE id_distributor = '$idsup'";
$query = $mysqli->query($sql);
$row = $query->fetch_array(MYSQLI_ASSOC);
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

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Supplier</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpid" value="<?= $row['id_distributor'] ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnma" value="<?= $row['nama'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Hp / Telepon <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnmo" value="<?= $row['nomor'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpfax" value="<?= $row['fax'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpemail" value="<?= $row['email'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="form-control col-md-7 col-xs-12" name="inpalmt" rows="8" cols="25"><?= $row['alamat'] ?></textarea>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_distributor.php">Batal</a>
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
    // proses tambah data
    if (isset($_POST['ubah'])) {
        $idsup  = $_POST['inpid'];
        $nma    = $_POST['inpnma'];
        $nmo    = $_POST['inpnmo'];
        $fax    = $_POST['inpfax'];
        $email  = $_POST['inpemail'];
        $alamat = $_POST['inpalmt'];
    
        $query  = "UPDATE dta_distributor SET nama = '$nma', nomor = '$nmo', fax = '$fax', email = '$email', alamat = '$alamat' WHERE id_distributor = '$idsup'";
        $result = $mysqli->query($query);
    
        if ($result) {
            echo "<script>window.location=(href='dt_distributor.php?ubah')</script>";
        } else {
            echo "<script>window.alert('Tidak Dapat Mengubah Data !');</script>";
            echo "<script>window.location=(href='dt_distributor_ubah.php?id_distributor=".$idsup."')</script>";
        }
    
    }
   ?>