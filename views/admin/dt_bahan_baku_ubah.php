<!-- untuk bagian head -->
<?php include_once 'atribut/head.php'; ?>

<!-- untk pemberian kode otomatis -->
<?php
$id   = $_GET['id_bahan_baku'];
$sql  = "SELECT * FROM dta_bahan_baku WHERE id_bahan_baku = '$id'";
$qry  = $mysqli->query($sql);
$rows = $qry->fetch_array(MYSQLI_ASSOC);
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
               <h3>Detail Bahan Baku</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Detail Bahan Baku</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Bahan Baku</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpkode" value="<?= $rows['id_bahan_baku'] ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bahan <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnma" value="<?= $rows['nama'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpjmlh" value="<?= $rows['jumlah'] ?>" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" name="inphrga" value="<?= $rows['harga'] ?>" required>
                       </div>
                     </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan Barang <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="inpsatuan" required="required">
                           <option value="<?= $rows['satuan'] ?>"><?= $rows['satuan'] ?></option>
                           <option value="Buah">Buah</option>
                           <option value="Botol">Botol</option>
                         </select>
                      </div>
                    </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_bahan_baku.php">Batal</a>
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

 <!-- koding php -->
<?php
// untuk proses input
if (isset($_POST['ubah'])) {

  $kdbar = $_POST['inpkode'];
  $nma   = $_POST['inpnma'];
  $jmlh  = $_POST['inpjmlh'];
  $hrga  = $_POST['inphrga'];
  $stuan = $_POST['inpsatuan'];

  $query  = "UPDATE dta_bahan_baku SET nama = '$nma', jumlah = '$jmlh', harga = '$hrga', satuan = '$stuan' WHERE id_bahan_baku = '$kdbar'";
  $result = $mysqli->query($query);

    if ($result == true) {
        echo "<script>window.location=(href='dt_bahan_baku.php?&ubah')</script>";
    } else {
        echo "<script>window.alert('Barang Dengan Kode=".$kdbar."Sudah Ada !');window.location=(href='dt_bahan_baku.php')</script>";
    }

}
?>
