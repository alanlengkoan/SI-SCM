<?php
// untuk koneksi
session_start();
include_once ('../../configs/koneksi.php');
if (empty($_SESSION['inpuser'])) {
  echo "<script>window.alert('Anda Harus Masuk Dahulu !');</script>";
  echo "<script>window.location=(href='../../pages/index.php')</script>";
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistem Informasi SCM</title>

    <!-- Pemanggilan Bootstrap -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <!-- Pemanggilan Icon dan Gambar -->
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">
    <!-- Pemanggilan DataTables -->
    <link rel="stylesheet" href="../../assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css">
    <!-- Tema CSS -->
    <link rel="stylesheet" href="../../assets/css/custom.min.css">

  </head>
