<!--Counter Inbox-->

<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">AC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Asri-Connect</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
              $c=$q->row_array();
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'gambar/'.$c['photo'];?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $c['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'gambar/'.$c['photo'];?>" class="img-circle" alt="">

                <p>
                  <?php echo $c['username'];?>
                  <?php if($c['level']=='1'):?>
                    <small>Karyawan</small>
                  <?php else:?>
                    <small>Admin</small>
                  <?php endif;?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#"  ><i class="fa fa-globe"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>