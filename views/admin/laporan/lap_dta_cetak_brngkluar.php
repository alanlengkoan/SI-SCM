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
    <h2>Laporan Data Penjualan</h2>
    <p>MyLovaShop</p>
    <p><em>Indonesia, Sulawesi Selatan, Makassar</em> </p>
    <hr>
  </div>

  <!-- tabel barang masuk -->
  <table border="1" align="center">
    <thead>
      <tr>
          <th>No</th>
          <th>ID Transaksi</th>
          <th>Nama Supplier</th>
          <th>Nama Barang</th>
          <th>Jumlah <br> Barang Keluar</th>
          <th>Harga Barang</th>
          <th>Total</th>
          <th>Status</th>
          <th>Waktu</th>
      </tr>
      </thead>
      <tbody>

          <?php
          $sql    = "SELECT dta_pemesanan.*, dta_user.nama AS nama_user, dta_barang.nama AS nama_barang, dta_barang.satuan, dta_barang.kondisi FROM dta_pemesanan LEFT JOIN dta_barang ON dta_pemesanan.kd_barang = dta_barang.kd_barang LEFT JOIN dta_user ON dta_pemesanan.id_user = dta_user.id_user";
          $result = $mysqli->query($sql);
          $no = 1;
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $row['id_pemesanan']; ?></td>
              <td><?php echo $row['nama_user']; ?></td>
              <td><?php echo $row['nama_barang']; ?></td>
              <td align="center"><?php echo $row['jumlah']; ?></td>
              <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
              <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
              <td><?php if ($row['status'] == 'lunas') {echo 'Lunas';} else if ($row['status'] == 'pelunasan') {echo 'Pelunasan';} else {echo 'Konfirmasi Pembayaran';} ?></td>
              <td><?php echo $row['waktu']; ?></td>
          </tr>
          <?php } ?>

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
$html2pdf->Output('Laporan Barang Keluar.pdf');

 ?>
