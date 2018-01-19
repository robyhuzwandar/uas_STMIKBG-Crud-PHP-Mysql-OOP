<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height: 60px">
            <div class="pull-left image">
                <img src="../<?php echo Session::get('foto') ?>" class="img-circle" alt="User Image"
                     style=" height:50px; width:auto important!;">
            </div>
            <div class="pull-left info">
                <p><?php echo Session::get('nama') ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="pencarian.php" method="get" class="sidebar-form">
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
            <li class="">
                <a href="../index.php">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview
                   <?php
            if ($menu == "pegawai") { ?>
                        active menu-open
                     <?php
            }
            ?>
                ">
                <a href="#">
                    <i class="fa  fa-users"></i>
                    <span>Pegawai</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="
                    <?php
                    if ($submenu == "listpegawai") { ?>
                        active
                     <?php
                    }
                    ?>
                      "><a href="../view/listPegawai.php"><i class="fa fa-circle-o"></i>List Pegawai</a>
                    </li>
                    <li class="
                        <?php
                    if ($submenu == "addpegawai") { ?>
                            active
                            <?php
                    }
                    ?>"
                    ><a href="../view/addPegawai.php"><i class="fa fa-circle-o"></i>Tambah Pegawai</a></li>
                </ul>
            </li>

            <li class="treeview
                   <?php
            if ($menu == "staf") { ?>
                                active open-menu
                             <?php
            }
            ?>
                ">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Staf</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="
                         <?php
                    if ($submenu == "liststaf") { ?>
                                active
                             <?php
                    }
                    ?>
                    "><a href="../view/listStaf.php"><i class="fa fa-circle-o"></i>List Staf</a></li>
                    <?php
                    if (Session::get('role') == 0) {
                        ?>
                        <li
                                class="
                        <?php
                                if ($submenu == "addstaf") { ?>
                        active
                     <?php
                                }
                                ?>
                        "
                        ><a href="../view/addStaf.php"><i class="fa fa-circle-o"></i>Tambah Staf</a></li>
                    <?php } ?>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>
