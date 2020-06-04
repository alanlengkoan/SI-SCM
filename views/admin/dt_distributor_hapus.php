<?php
// untuk koneksi
session_start();
include_once ('../../configs/koneksi.php');

$idsup = $_GET['id_distributor'];
$sql   = "DELETE FROM dta_distributor WHERE id_distributor = '$idsup'";
$query = $mysqli->query($sql);

if ($query) {
    echo "<script>window.location=(href='dt_distributor.php?hapus')</script>";
}

 ?>
