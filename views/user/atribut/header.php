<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title">
      <a href="admin.php" class="site_title"><i class="fa fa-user"></i> <span>User</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu samping -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li>
            <a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
          </li>
          <li>
            <a href="profil.php"><i class="fa fa-user"></i>Profil</a>
          </li>
          <li>
            <a href="dt_barang.php"><i class="fa fa-cubes"></i>Data Barang</a>
          </li>
          <li>
            <a href="pemesanan_history.php"><i class="fa fa-history"></i>History Pemesanan</a>
          </li>
          <li><a><i class="fa fa-truck"></i>Transaksi<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li>
                <a href="pemesanan_barang.php">Pemesanan Barang</a>
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
            <?=$_SESSION['inpuser']?>
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
