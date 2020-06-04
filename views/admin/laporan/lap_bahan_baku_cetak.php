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
    <h2>Laporan Data Barang</h2>
    <p>MyLovaShop</p>
    <p><em>Indonesia, Sulawesi Selatan, Makassar</em> </p>
    <hr>
  </div>

  <!-- tabel barang masuk -->
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Jumlah Barang</th>
      <th>Harga Barang</th>
    </tr>
    <?php
    $query  = "SELECT * FROM dta_bahan_baku";
    $result = $mysqli->query($query);
    $no = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) :
    ?>
      <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id_bahan_baku']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td align="center"><?php echo $row['jumlah']; ?></td>
          <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
      </tr>
    <?php endwhile; ?>
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
$html2pdf->Output('Laporan Barang.pdf');

 ?>
