

<nav class="navbar-default navbar-static-top" role="navigation">
  <div class="navbar-header">
    <a href="<?=base_url('backend/post/')?>">
      <img width="296px" height="58px" src="<?php echo base_url().'gambar/putih.png'?>" alt="logo" />
    </a>
  </div>
  <div class=" border-bottom">

    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="drop-men">
      <ul class=" nav_1">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown">
          <img class="profil-img" src="<?= base_url().'gambar/'.$admin_detail['photo'];?>">
            <span class=" name-caret"><?php echo $admin_detail['username'];?>
              <i class="caret"></i>
            </span>
          </a>
          <ul class="dropdown-menu " role="menu">
            <li class="<?=$this->uri->segment(2) == 'profil' ? 'active':'' ?>"><a href="<?php echo base_url().'backend/profil'?>"><i class="fa fa-user pull-right"></i>Profil</a></li>
            <li><a href="<?php echo base_url().'administrator/logout'?>"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
    <div class="clearfix">

    </div>

    <div class="navbar-default sidebar" role="navigation">
      <div class="profile_info">
        <span>Welcome, <?php echo $admin_detail['username'];?></span>
      </div>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            
            <li class="<?=$this->uri->segment(2) == 'post' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/post'?>">
                <i class="fa fa-home"></i> <span>Home </span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'event' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/event'?>">
                <i class="fa fa-calendar"></i> <span>Event Calender</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'library' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/library'?>">
                <i class="fa fa-book"></i> <span>Library</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'karyawan' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/karyawan'?>">
                <i class="fa fa fa-group"></i> <span>Employee Directory</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'hris' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/hris'?>">
                <i class="fa fa-folder-open-o"></i> <span>Login HRIS</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'active_directory' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/active_directory'?>">
                <i class="fa fa-folder"></i> <span>Active Directory</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'ticketing' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/ticketing'?>">
                <i class="fa fa-headphones"></i> <span>Ticketing</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <li class="<?=$this->uri->segment(2) == 'inbox' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/inbox'?>">
                <i class="fa fa-commenting-o"></i> <span>Discussion Forum</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

            <!-- <li class="<?=$this->uri->segment(2) == 'profil' ? 'active':'' ?>">
              <a href="<?php echo base_url().'backend/profil'?>">
                <i class="fa fa-users"></i> <span>Profil</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li> -->


          </ul>
          <div class="profile_info">

            <a href="<?php echo base_url().'administrator/logout'?>" style="text-decoration:none">
              <i class="fa fa-sign-out"></i> Log Out
            </a>

          </div>
        </section>
        <!-- /.sidebar -->
      </aside>

    </div>
</nav>
