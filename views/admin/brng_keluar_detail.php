<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<?php
$idtrns = $_GET['id_pemesanan'];
$sql    = "SELECT dta_pemesanan.*, dta_user.nama AS nama_user, dta_barang.nama AS nama_barang, dta_barang.satuan, dta_barang.kondisi FROM dta_pemesanan LEFT JOIN dta_barang ON dta_pemesanan.kd_barang = dta_barang.kd_barang LEFT JOIN dta_user ON dta_pemesanan.id_user = dta_user.id_user WHERE id_pemesanan = '$idtrns'";
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
               <h3>Detail Barang Keluar</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Barang Keluar</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" action="">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pemesanan</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['id_pemesanan']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['nama_user']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['nama_barang']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang Keluar</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['jumlah']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Total</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pengantaran</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['status']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu Barang Keluar</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['waktu']; ?>" readonly>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-primary" href="dt_barangkeluar.php">Kembali</a>
                          <?php if ($row['status'] == 'lunas') { ?>
                            <a class="btn btn-success" href="pembayaran_detail.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>">Lihat Pembayaran</a>
                          <?php } else if ($row['status'] == 'pelunasan') { ?>
                            <a class="btn btn-warning" href="pembayaran_pelunasan.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>">Pelunasan Pembayaran</a>
                          <?php } else { ?>
                            <a class="btn btn-danger" href="pembayaran_konfirmasi.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>">Konfirmasi Pembayaran</a>
                          <?php } ?>
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
