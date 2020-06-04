<?php
// untuk koneksi
include_once ('../../configs/koneksi.php');

$idtrns = $_GET['id_pemesanan'];
$sql    = "DELETE FROM dta_pemesanan WHERE id_pemesanan = '$idtrns'";
$query  = $mysqli->query($sql);
$tes = $mysqli->query("DELETE FROM dta_pembayaran WHERE id_pemesanan = '$idtrns'");

if ($query) {
  header('location:'.'dt_barangkeluar.php?&hapus');
}

 ?>
