
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?> - <?php echo $main_title ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php
          U::loadStyles($stylesheets);
          U::loadScripts($javascripts);
        ?>


    </head>
    <body class="skin-red">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?=base_url()?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Sportive
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
        
                </div>
            </nav>
        </header>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=base_url()?>assets/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $nama_pemilik ?></p>

                            <a href="<?php echo base_url("home/logout")?>"><i class="fa  fa-sign-out text-error"></i> Logout</a>
                        </div>
                    </div>
                    
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <!-- Sidebar Kri berisi menu Content -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?=base_url("admin/main")?>">
                                <i class="glyphicon glyphicon-home"></i> <span>Beranda</span>
                            </a>
                        </li>
                       <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-calendar"></i> <span>Booking</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li>
                                     <a href="<?=base_url("admin/booking/cek_booking")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Cek Booking</span>
                                    </a>
                                </li>
                                <li>
                                     <a href="<?=base_url("admin/booking/cek_jadwal")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Cek Jadwal</span>
                                    </a>
                                </li>

                                <li>
                                     <a href="<?=base_url("admin/booking/booking_offline")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Booking</span>
                                    </a>
                                </li>
                                
                                 <li>
                                     <a href="<?=base_url("admin/booking/bayar")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Bayar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> <span>Manajemen</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                     <a href="<?=base_url("admin/manajemen/laporan")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Laporan</span>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-cog"></i> <span>Pengaturan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                     <a href="<?=base_url("admin/settings/info")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Info</span>
                                    </a>
                                </li>

                                <li>
                                     <a href="<?=base_url("admin/settings/jadwal")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Jadwal</span>
                                    </a>
                                </li>
                                
                                 <li>
                                     <a href="<?=base_url("admin/settings/harga")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Harga</span>
                                    </a>
                                </li>

                                 <li>
                                     <a href="<?=base_url("admin/settings/lapangan")?>">
                                        <i class="fa fa-angle-double-right"></i> <span>Lapangan</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side" id="contentwraper" style="margin-bottom:150px;">
                 <section class="content-header">
                    <h1>
                        <?php echo $title ?>

                        <small><?php echo $main_title ?></small>
                    </h1>
                    <!-- <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol> -->
                </section>
                <section class="content">
                    <?php echo $content ?>
                </section>

                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <?php
          U::loadScripts($local_javascripts);
        ?>


        <input type="hidden" value="<?=base_url()?>" id="base_url"></input>
    </body>
</html>