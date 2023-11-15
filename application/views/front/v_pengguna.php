<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QuickSTART | Pengguna</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/QuiCkSTART.png'?>">
<!-- Bootstrap -->
<link href="<?php echo base_url().'assets/gentela/vendors/bootstrap/dist/css/bootstrap.min.css'?>" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url().'assets/gentela/vendors/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url().'assets/gentela/vendors/nprogress/nprogress.css'?>" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url().'assets/gentela/vendors/bootstrap-daterangepicker/daterangepicker.css'?>" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?php echo base_url().'assets/gentela/build/css/custom.min.css'?>" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="index.html" class="site_title">  <img src="<?php echo base_url().'assets/images/QuiCkSTART.png'?>"></a>
        </div>

        <div class="clearfix"></div>

        <?php
            $id_admin=$this->session->userdata('idadmin');
            $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
            $c=$q->row_array();
        ?>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="<?php echo base_url().'assets/images/'.$c['photo'];?>" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo $c['nama'];?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
          <h3>QuiCkSTART</h3>
            <ul class="nav side-menu">


                            <li><a href="<?php echo base_url().'backend/post'?>"><i class="fa fa-desktop"></i> Input Data <span class="fa fa-chevron-right"></span></a>

                            </li>

                            <li><a href="<?php echo base_url().'backend/pengguna'?>"><i class="fa fa-bar-chart-o"></i> Diagram Peserta  <span class="fa fa-chevron-right"></span></a>

                            </li>

                            <li><a href="<?php echo base_url().'backend/inbox'?>"><i class="fa fa-desktop"></i> Tampil Data <span class="fa fa-chevron-right"></span></a>

                            </li>
                          </ul>
                        </div>


                      </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->

        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo base_url().'assets/images/'.$c['photo'];?>" alt=""><?php echo $c['nama'];?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">

                <li><a href="<?php echo base_url().'administrator/logout'?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>


          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">


        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Target <small>Activity report</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>


                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="profile_title">
                    <div class="col-md-6">
                      <h2>User Activity Report</h2>
                    </div>
                    <div class="col-md-6">

                    </div>
                  </div>
                  <!-- start of user-activity-graph -->
                  <div id="graph_bar" style="width:100%; height:280px;"></div>
                  <!-- end of user-activity-graph -->


                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        <img src="<?php echo base_url().'assets/images/QuiCkSTART.png'?>" alt="logo">
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url().'assets/gentela/vendors/jquery/dist/jquery.min.js'?>"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url().'assets/gentela/vendors/bootstrap/dist/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/gentela/vendors/fastclick/lib/fastclick.js'?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url().'assets/gentela/vendors/nprogress/nprogress.js'?>"></script>
<!-- morris.js -->
<script src="<?php echo base_url().'assets/gentela/vendors/raphael/raphael.min.js'?>"></script>
<script src="<?php echo base_url().'assets/gentela/vendors/morris.js/morris.min.js'?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url().'assets/gentela/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url().'assets/gentela/vendors/moment/min/moment.min.js'?>"></script>
<script src="<?php echo base_url().'assets/gentela/vendors/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url().'assets/gentela/build/js/custom.min.js'?>"></script>
<!-- Custom Theme Scripthghffs -->
<script src="<?php echo base_url().'assets/gentela/build/js/custom.js'?>"></script>
</body>
</html>
