<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<!-- untk pemberian kode otomatis -->
<?php
$sql    = "SELECT id_bahan_baku FROM dta_bahan_baku";
$carkod = $mysqli->query($sql);
$datkod = $carkod->fetch_array(MYSQLI_ASSOC);
$jumdat = $carkod->num_rows;

if ($datkod) {
  $nilkod  = substr($jumdat[0], 1);
  $kode    = (int) $nilkod;
  $kode    = $jumdat + 1;
  $kodeoto = "BHN-".str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
  $kodeoto = "BHN-0001";
}
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
               <h3>Tambah Barang Bahan Baku</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Form Barang Bahan Baku</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Bahan Bakua</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpkode" value="<?php echo $kodeoto; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bahan <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnma" placeholder="Masukkan Nama Bahan" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpjmlh" placeholder="0" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" name="inphrga" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Item <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="inpsatuan" required="required">
                           <option value="">- Satuan -</option>
                           <option value="Buah">Buah</option>
                           <option value="Botol">Botol</option>
                           <option value="Mili Liter">ML (Mili Liter)</option>
                         </select>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_bahan_baku.php">Batal</a>
                         <input class="btn btn-success" type="submit" name="tambah" value="Tambah">
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

 <!-- koding php -->
<?php
// untuk proses input
if (isset($_POST['tambah'])) {

  $kdbar = $_POST['inpkode'];
  $nma   = $_POST['inpnma'];
  $jmlh  = $_POST['inpjmlh'];
  $hrga  = $_POST['inphrga'];
  $stuan = $_POST['inpsatuan'];

  $query  = "INSERT INTO dta_bahan_baku (id_bahan_baku, nama, jumlah, harga, satuan) VALUES ('$kdbar', '$nma', '$jmlh', '$hrga', '$stuan')";
  $result = $mysqli->query($query);

    if ($result == true) {
        echo "<script>window.location = (href = 'dt_bahan_baku.php?&simpan')</script>";
    } else {
        echo "<script>window.alert('Barang Dengan Kode = ".$kdbar." Sudah Ada !');window.location = (href = 'dt_bahan_baku.php')</script>";
    }

}
?>
