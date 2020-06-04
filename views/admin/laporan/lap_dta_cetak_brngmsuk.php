<?php
// untuk koneksi
include_once ('../../../configs/koneksi.php');

ob_start();
?>

<!-- koding CSS -->
<style media="screen">

.judul {
  padding: 4mm;
  text-align: center;
}

.admin {
  font-weight: bold;
}

.nama {
  text-decoration: underline;
}

</style>

<!-- koding HTML dan PHP query -->
<page>
  <div class="judul">
    <h2>Laporan Data Pemasukkan Bahan Baku</h2>
    <p>MyLovaShop</p>
    <p><em>Indonesia, Sulawesi Selatan, Makassar</em> </p>
    <hr>
  </div>

  <table border="1" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Transaksi</th>
        <th>Nama Distributor</th>
        <th>Nama Bahan</th>
        <th>Jumlah <br> Barang Masuk</th>
        <th>Harga Barang</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql    = "SELECT dta_trnsaksi_brng_masuk.*, dta_distributor.nama AS nama_distributor, dta_bahan_baku.nama AS nama_bahan_baku FROM dta_trnsaksi_brng_masuk INNER JOIN dta_distributor ON dta_trnsaksi_brng_masuk.id_distributor = dta_distributor.id_distributor INNER JOIN dta_bahan_baku ON dta_trnsaksi_brng_masuk.id_bahan_baku = dta_bahan_baku.id_bahan_baku";
      $result = $mysqli->query($sql);
      $no = 1;
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $row['id_transaksi']; ?></td>
          <td><?php echo $row['nama_distributor']; ?></td>
          <td><?php echo $row['nama_bahan_baku']; ?></td>
          <td align="center"><?php echo $row['jumlah']; ?></td>
          <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
          <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
        </tr>
        <?php
        $no++;
      }
      ?>

    </tbody>
</table>

  <p>Yang bertanda tangan dibawah ini :</p>
  <p class="admin">Administrator</p>
  <br>
  <br>
  <br>
  <p class="nama">Hardianti</p>

</page>

<?php
// proses untuk menampilkan file pdf
$content = ob_get_clean();
include_once('../../../vendors/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'en', 'utf-8');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Laporan Barang Masuk.pdf');

 ?>
