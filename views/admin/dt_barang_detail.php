<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<!-- untk pemberian kode otomatis -->
<?php

$kdbar = $_GET['kd_barang'];
$sql   = "SELECT * FROM dta_barang WHERE kd_barang = '$kdbar'";
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
               <h3>Detail Barang</h3>
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
                   <form class="form-horizontal form-label-left" action="#">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['kd_barang']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['nama']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="" value="<?php echo $row['jumlah']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['satuan']; ?>" readonly>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-primary" href="dt_barang.php">Kembali</a>
                       </div>
                     </div>

                   </form>
                   <!-- akhir form tambah barang -->

                 </div>
               </div>
             </div>

             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Keterangan</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                  <div class="row">
                    <div class="col-lg-3">
                      <img style="height: 200px" src="../../images/apel.jpg" class="img-responsive" alt="Apel">
                    </div>
                    <div class="col-lg-3">
                      <img style="height: 200px" src="../../images/air.jpg" class="img-responsive" alt="Air">
                    </div>
                    <div class="col-lg-3">
                      <img style="height: 200px" src="../../images/gula.jpg" class="img-responsive" alt="gula">
                    </div>
                    <div class="col-lg-3">
                      <img style="height: 200px" src="../../images/cuka_apel.jpg" class="img-responsive" alt="gula">
                    </div>
                  </div>

                  <br /><br />

                  <ul>
                    <li>4 Buah Apel yang sudah dipotong dadu ukuran 1 inch</li>
                    <li>1 Liter air bersih</li>
                    <li>1/4 cangkir gula pasir, untuk proses fermentasi</li>
                    <li>1/4 cangkir cuka apel organik murni (maksudnya yang belum mengalami proses pemanasan), cuka apel
                    organik ini bertujuan untuk mempercepat proses fermentasi cuka, ini hanya optional, kamu juga bisa
                    untuk tidak menggunakannya.</li>
                    <li>Toples kaca yang berukuran besar</li>
                  </ul>

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
