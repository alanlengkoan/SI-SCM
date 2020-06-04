<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title">
      <a href="admin.php" class="site_title"><i class="fa fa-user"></i> <span>Admin</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu samping -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li>
            <a href="admin.php"><i class="fa fa-dashboard"></i>Dashboard</a>
          </li>
          <li><a><i class="fa fa-database"></i>Master Data<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li>
                <a href="dt_bahan_baku.php">Data Bahan Baku</a>
              </li>
              <li>
                <a href="dt_barang.php">Data Barang</a>
              </li>
              <li>
                <a href="dt_distributor.php">Data Distributor</a>
              </li>
              <li>
                <a href="dt_supplier.php">Data Supplier</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="dt_barangmasuk.php"><i class="fa fa-sign-in"></i>Barang Masuk Bahan Baku</a>
          </li>
          <li>
            <a href="dt_barangkeluar.php"><i class="fa fa-sign-out"></i>Barang Keluar</a>
          </li>
          <li><a><i class="fa fa-truck"></i>Transaksi<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li>
                <a href="brng_masuk.php">Barang Masuk Bahan Baku</a>
              </li>
              <li>
                <a href="brng_keluar.php">Barang Keluar</a>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-file-pdf-o"></i>Laporan<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li>
                <a href="lap_pemasukkan.php">Data Pemasukkan</a>
              </li>
              <li>
                <a href="lap_penjualan.php">Data Penjualan</a>
              </li>
              <li>
                <a href="lap_barang.php">Data Barang</a>
              </li>
              <li>
                <a href="lap_bahan_baku.php">Data Bahan Baku</a>
              </li>
              <li>
                <a href="lap_distributor.php">Data Distributor</a>
              </li>
              <li>
                <a href="lap_supplier.php">Data Supplier</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- menu samping -->

  </div>
</div>

<!-- awal navigation atas -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle">
          <i class="fa fa-bars"></i>
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            admin
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li>
              <a href="../keluar.php"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- akhir navigation bawah -->
