<?php
// untuk koneksi
session_start();
include_once ('../../configs/koneksi.php');

$idsup = $_GET['id_supplier'];
$sql   = "DELETE FROM dta_supplier WHERE id_supplier = '$idsup'";
$query = $mysqli->query($sql);
$sql_2   = "DELETE FROM dta_user WHERE id_user = '$idsup'";
$mysqli->query($sql_2);

if ($query) {
  header('location:'.'dt_supplier.php?&hapus');
}

 ?>
