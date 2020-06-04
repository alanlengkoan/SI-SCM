<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<?php
$idtrns = $_GET['id_transaksi'];
$sql    = "SELECT dta_trnsaksi_brng_masuk.*, dta_distributor.nama AS nama_distributor, dta_bahan_baku.nama AS nama_bahan_baku FROM dta_trnsaksi_brng_masuk INNER JOIN dta_distributor ON dta_trnsaksi_brng_masuk.id_distributor = dta_distributor.id_distributor INNER JOIN dta_bahan_baku ON dta_trnsaksi_brng_masuk.id_bahan_baku = dta_bahan_baku.id_bahan_baku WHERE dta_trnsaksi_brng_masuk.id_transaksi = '$idtrns'";
$query  = $mysqli->query($sql);
$row    = $query->fetch_array(MYSQLI_ASSOC);
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
               <h3>Detail Barang Masuk</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Barang Masuk</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" action="#">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Transaksi</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['id_transaksi']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Distributor</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['nama_distributor']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bahan</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['nama_bahan_baku']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang Masuk</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['jumlah']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Harga</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['waktu']; ?>" readonly>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-primary" href="dt_barangmasuk.php">Kembali</a>
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
