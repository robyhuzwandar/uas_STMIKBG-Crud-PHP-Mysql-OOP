<?php
include '../lib/Session.php';
Session::checkSession();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>PT.</b>S</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>PT. </b>Suffah</span>
        </a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo Session::get('foto') ?>" class="user-image" alt="User Image">
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo Session::get('foto') ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo Session::get('nama') ?>
                                    <small><?php echo Session::get('email') ?></small>
                                </p>
                            </li>
                            <?php
                            if (isset($_GET['aksi']) && $_GET['aksi'] == "logout") {
                                Session::destroy();
                            }
                            ?>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="view/profil.php" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="?aksi=logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo Session::get('foto') ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo Session::get('nama') ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="view/pencarian.php" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="pencarian" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-th"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-users"></i>
                                <span>Pegawai</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="view/listPegawai.php"><i class="fa fa-circle-o"></i>List Pegawai</a></li>
                                <li><a href="view/addPegawai.php"><i class="fa fa-circle-o"></i>Tambah Pegawai</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Staf</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="view/listStaf.php"><i class="fa fa-circle-o"></i>List Staf</a></li>
                                <?php
                                if (Session::get('role') == 0) {
                                    ?>
                                    <li><a href="view/addStaf.php"><i class="fa fa-circle-o"></i>Tambah Staf</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Dashboard</h3>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-4 hidden-xs hidden-sm">
                                <table>
                                    <tr>
                                        <td>
                                            <img class="img-circle" height="300px"
                                                 src="../assets/img/logopc.png"
                                                 alt="User Pic">
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>
                                            <a href="http://robyhuzwandar.esy.es" target="_blank"
                                               class="btn btn-info">
                                                <i class="fa fa-external-link">
                                                    Lihat Selengkapnya...
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <div class="col-xs-2 col-xs-offset-2 hidden-md hidden-lg">
                                <table>
                                    <tr>
                                        <td>
                                            <img class="img-circle" height="200px"
                                                 src="../assets/img/logopc.png"
                                                 alt="User Pic">
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>
                                            <a href="http://robyhuzwandar.esy.es" target="_blank"
                                               class="btn btn-info">Lihat Selengkapnya
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2018-2019 <a href="http://robyhuzwandar.esy.es">PT. Suffah</a>.</strong> All rights
        Suffah
    </footer>
    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="assets/bower_components/Chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
</body>
</html>
