<?php
// untuk koneksi
include_once ('../../configs/koneksi.php');

$kdbar = $_GET['kd_barang'];
$sql   = "DELETE FROM dta_barang WHERE kd_barang = '$kdbar'";
$query = $mysqli->query($sql);

if ($query == true) {
  echo "<script>window.location=(href='dt_barang.php?&hapus')</script>";
} else {
  echo "<script>window.alert('Barang Dengan Kode = ".$kdbar." Tidak dapat dihapus!');</script>";
  echo "<script>window.location=(href='dt_barang.php')</script>";
}

 ?>
