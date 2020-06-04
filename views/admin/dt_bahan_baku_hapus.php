<?php
// untuk koneksi
include_once ('../../configs/koneksi.php');

$id    = $_GET['id_bahan_baku'];
$sql   = "DELETE FROM dta_bahan_baku WHERE id_bahan_baku = '$id'";
$query = $mysqli->query($sql);

if ($query) {
  header('location:'.'dt_bahan_baku.php?&hapus');
}

 ?>
