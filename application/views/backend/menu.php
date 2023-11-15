<ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'backendadmin/post/add_post'?>"><i class="fa fa-thumb-tack"></i> Add New</a></li>
            <li class="active"><a href="<?php echo base_url().'backendadmin/post'?>"><i class="fa fa-list"></i> Post List</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url().'backendadmin/pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
       
        <li>
          <a href="<?php echo base_url().'backendadmin/wisata'?>">
            <i class="fa fa-map-signs"></i> <span>Wisata</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i>
            <span>Tour</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'backendadmin/paket_tour'?>"><i class="fa fa-gift"></i> Paket Tour</a></li>
            <li><a href="<?php echo base_url().'backendadmin/kategori'?>"><i class="fa fa-hashtag"></i> Kategori</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-camera"></i>
            <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'backendadmin/album'?>"><i class="fa fa-clone"></i> Album</a></li>
            <li><a href="<?php echo base_url().'backendadmin/galeri'?>"><i class="fa fa-picture-o"></i> Photos</a></li>
          </ul>
        </li>
       

        

       
         <li>
          <a href="<?php echo base_url().'admin/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
      </ul>