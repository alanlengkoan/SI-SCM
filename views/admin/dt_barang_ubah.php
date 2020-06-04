<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<!-- untk pemberian kode otomatis -->
<?php

$kdbar = $_GET['kd_barang'];
$sql   = "SELECT * FROM dta_barang WHERE kd_barang = '$kdbar'";
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
               <h3>Ubah Barang</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Barang</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpkode" value="<?php echo $row['kd_barang']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnma" value=<?= $row['nama'] ?> required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Tambah Stock</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inptmbahstock" placeholder="Masukkan Jumlah Barang" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpjmlh" value="<?= $row['jumlah'] ?>" readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Terjual</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpstoter" value="<?= $row['stock_terjual'] ?>" readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" name="inphrga" value="<?= $row['harga'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Satuan <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="inpstuan" required>
                           <option><?= $row['satuan'] ?></option>
                           <option>- Satuan -</option>
                           <option>Unit</option>
                           <option>Buah</option>
                           <option>Dus</option>
                           <option>Sak</option>
                           <option>Set</option>
                         </select>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Kondisi Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="inpkndsibrng" required>
                           <option><?= $row['kondisi'] ?></option>
                           <option>- Kondisi Barang -</option>
                           <option>Ready Stock</option>
                           <option>Reject</option>
                           <option>Sold</option>
                           <option>Out Of Stock</option>
                         </select>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_barang.php">Batal</a>
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
    // untuk proses input
    if (isset($_POST['ubah'])) {
      $kdbar  = $_POST['inpkode'];
      $nma    = $_POST['inpnma'];
      $tmbhso = $_POST['inptmbahstock'];
      $jmlh   = $_POST['inpjmlh'];
      $hrga   = $_POST['inphrga'];
      $stuan  = $_POST['inpstuan'];
      $kndsi  = $_POST['inpkndsibrng'];
      $stoaw  = $_POST['inpstoaw'];
      $stoter = $_POST['inpstoter'];

      $tambahstock = $jmlh + $tmbhso;

      $query  = "UPDATE dta_barang SET nama = '$nma', jumlah = '$tambahstock', harga = '$hrga', satuan = '$stuan', kondisi = '$kndsi', stock_terjual = '$stoter' WHERE kd_barang = '$kdbar'";
      $result = $mysqli->query($query);

      if ($result) {
        echo "<script>window.location=(href='dt_barang.php?ubah');</script>";

      } else {
        echo "<script>window.alert('Tidak Dapat Mengubah Data !');</script>";
        echo "<script>window.location=(href='dt_barang.php');</script>";
      }

    }
    ?>
