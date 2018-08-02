 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $url_admin ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <a href="<?php echo $url_admin ?>#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="<?php echo $url_admin ?>#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li><a href="<?php echo $url_admin ?>index.php?module=datalahan"><i class="fa fa-book"></i> <span>Data Lahan</span></a></li>
        <li><a href="<?php echo $url_admin ?>index.php?module=beforedss"><i class="fa fa-book"></i> <span>Penghitungan DSS</span></a></li>
        <li><a href="<?php echo $url_admin ?>index.php?module=report"><i class="fa fa-book"></i> <span>Laporan</span></a></li>
        <li class="header">LABELS</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>