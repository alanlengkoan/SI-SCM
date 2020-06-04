    <!-- untuk bagian head -->
    <?php include_once 'atribut/head.php'; ?>

    <!-- untk pemberian kode otomatis -->
    <?php

    $sql    = "SELECT id_transaksi FROM dta_trnsaksi_brng_masuk";
    $carkod = $mysqli->query($sql);
    $datkod = $carkod->fetch_array(MYSQLI_ASSOC);
    $jumdat = $carkod->num_rows;

    if ($datkod) {
      $nilkod  = substr($jumdat[0], 1);
      $kode    = (int) $nilkod;
      $kode    = $jumdat + 1;
      $kodeoto = "TRSBM-".str_pad($kode, 4, "0", STR_PAD_LEFT);
    } else {
      $kodeoto = "TRSBM-0001";
    }
     ?>

     <body class="nav-md" onload="setInterval('reloadwaktu()');">

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
                   <h3>Transaksi Barang Masuk Bahan Baku</h3>
                 </div>
               </div>

               <div class="clearfix"></div>

               <!-- untuk bagian waktu -->
               <div class="row">
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="tile-stats">
                     <div class="waktu">
                       <p id="getwaktu"></p>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- akhir row waktu -->

               <!-- untuk bagian tabel dan awal row tabel -->
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <h2>Form Barang Masuk Bahan Baku</h2>
                       <div class="clearfix"></div>
                     </div>
                     <div class="x_content">

                       <!-- form tambah barang -->
                       <form class="form-horizontal form-label-left" action="brng_masuk.php" method="post">

                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Transaksi</label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input class="form-control col-md-7 col-xs-12" type="text" name="inpidtrans" value="<?php echo $kodeoto; ?>" readonly>
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Distributor <span class="required">*</span></label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control" name="inpiddistributor" required>
                               <option>- Pilih Distributor -</option>
                               <?php
                               // ambil data dari database untuk ID Supplier
                               $sql      = "SELECT * FROM dta_distributor";
                               $supplier = $mysqli->query($sql);
                               while ($row = $supplier->fetch_array(MYSQLI_ASSOC)) : ?>
                                 <option value="<?php echo $row['id_distributor'] ?>"><?php echo $row['nama']; ?></option>
                               <?php endwhile; ?>
                             </select>
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Baku <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control" name="inpidbhn" onchange="namabarang(this.value);" required>
                               <option>- Pilih Bahan Baku -</option>
                               <?php
                                // ambil data dari database untuk Kode Barang
                                $sql    = "SELECT * FROM dta_bahan_baku";
                                $barang = $mysqli->query($sql);
                                $jsarray2 = "var kdbar = new Array();";
                                while ($row = $barang->fetch_array(MYSQLI_ASSOC)) : ?>
                                  <option value="<?php echo $row['id_bahan_baku'] ?>"><?php echo $row['nama']; ?></option>
                                  <?php $jsarray2 .= "kdbar['".$row['id_bahan_baku']."'] = {hargabar: '".addslashes($row['harga'])."'};"; ?>
                               <?php endwhile; ?>
                             </select>
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang Masuk <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input id="jmlah" class="form-control col-md-7 col-xs-12" type="number" name="inpjumlah" onkeyup="jumlah();" required>
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                             <input id="setharga" class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inphrga" onkeyup="jumlah();" placeholder="Harga Barang" readonly>
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Total <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                             <input id="total" class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inptotal" placeholder="Total Harga" readonly>
                           </div>
                         </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div class="col-md-6 col-md-offset-3">
                             <input class="btn btn-warning" type="reset" name="kosongkan" value="Kosongkan">
                             <input class="btn btn-success" type="submit" name="masuk" value="Masuk">
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

       <!-- koding javascript -->
       <script type="text/javascript">

        // prose penjumlahan
        function jumlah() {
          var txt1  = document.getElementById('jmlah').value;
          var txt2  = document.getElementById('setharga').value;
          var hasil = parseInt(txt1) * parseInt(txt2);
          if (!isNaN(hasil)) {
            document.getElementById('total').value = hasil;
          }
        }

        // menampilkan nama dan harga barang
        <?php echo $jsarray2; ?>
        function namabarang(kodebar) {
          document.getElementById('setharga').value = kdbar[kodebar].hargabar;
        }
        
        // pengambilan waktu
        function reloadwaktu() {
          var waktu = new Date();
          var tanggal = waktu.getDate();
          var bulan   = waktu.getMonth();
          var tahun   = waktu.getFullYear();
          var jam     = waktu.getHours();
          var menit   = waktu.getMinutes();
          var detik  = waktu.getSeconds();
          document.getElementById('getwaktu').innerHTML =
          "Tanggal, Waktu : " + tanggal + "/" + bulan + "/" + tahun + ", "
          + jam + ":" + menit + ":" + detik;
        }
       </script>

       <!-- untuk bagian foot -->
       <?php include_once 'atribut/foot.php'; ?>

        <!-- koding php -->
        <?php
        // untuk proses input
        if (isset($_POST['masuk'])) {

          $idtrns = $_POST['inpidtrans'];
          $iddis  = $_POST['inpiddistributor'];
          $idbhn  = $_POST['inpidbhn'];
          $jmlah  = $_POST['inpjumlah'];
          $hrga   = $_POST['inphrga'];
          $total  = $_POST['inptotal'];
          // waktu zona asia jakarta
          date_default_timezone_set('Asia/Jakarta');
          $waktu  = date("Y-m-d H.i.s");

          $query  = "INSERT INTO dta_trnsaksi_brng_masuk (id_transaksi, id_distributor, id_bahan_baku, jumlah, harga, total, waktu) VALUES ('$idtrns', '$iddis', '$idbhn', '$jmlah', '$hrga', '$total', '$waktu')";
          $result = $mysqli->query($query) or die('MySQL Salah ! '.mysqli_error($mysqli));

          if ($result == true) {
            echo "<script>window.location=(href='dt_barangmasuk.php?&simpan')</script>";
          } else {
            echo "<script>window.alert('Transaksi Dengan ID = ".$idtrns." Sudah Di Proses !');window.location=(href='brng_masuk.php')</script>";
          }
        }
        ?>
