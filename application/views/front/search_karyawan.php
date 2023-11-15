<!DOCTYPE HTML>
<html>
<head>
<title>asri-connect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url().'web/css/bootstrap.min.css'?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url().'web/css/style.css'?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url().'web/css/_all-skins.min.css'?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url().'web/css/font-awesome.css'?>" rel="stylesheet">
<script src="<?php echo base_url().'web/js/jquery.min.js'?>"> </script>
<script src="<?php echo base_url().'web/js/bootstrap.min.js'?>"> </script>

<!-- Mainly scripts -->
<script src="<?php echo base_url().'web/js/jquery.metisMenu.js'?>"></script>
<script src="<?php echo base_url().'web/js/jquery.slimscroll.min.js'?>"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo base_url().'web/css/custom.css'?>" rel="stylesheet">
<script src="<?php echo base_url().'web/js/custom.js'?>"></script>
<script src="<?php echo base_url().'web/js/screenfull.js'?>"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});



		});
		</script>



</head>
<body class="skin-blue">
  <?php
           $id_admin=$this->session->userdata('idadmin');
           $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
           $c=$q->row_array();
					 $photo=$c['photo'];
       ?>
<div id="wrapper">
      <!----->
			<nav class="navbar-default navbar-static-top" role="navigation">
					 <div class="navbar-header">

						 <img width="296px" height="58px" src="<?php echo base_url().'gambar/putih.png'?>" alt="logo" />
			 </div>
		 <div class=" border-bottom">



					<!-- Brand and toggle get grouped for better mobile display -->

		 <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="drop-men" >
					<ul class=" nav_1">


				<li class="dropdown">
								<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $c['username'];?><i class="caret"></i></span><img src=""></a>
								<ul class="dropdown-menu " role="menu">

									<li><a href="<?php echo base_url().'administrator/logout'?>"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>

								</ul>
							</li>

					</ul>
			 </div><!-- /.navbar-collapse -->
		<div class="clearfix">

	 </div>

			<div class="navbar-default sidebar" role="navigation">
				<div class="profile_info">
						<span>Welcome,</span>
						<h2><?php echo $c['username'];?></h2>
					</div>
						 <aside class="main-sidebar">
 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">

   <!-- /.search form -->
   <!-- sidebar menu: : style can be found in sidebar.less -->
   <ul class="sidebar-menu">
    
     <li>
       <a href="<?php echo base_url().'backend/profil'?>">
         <i class="fa fa-users"></i> <span>Profil</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
     <li>
       <a href="<?php echo base_url().'backend/post'?>">
         <i class="fa fa-bullhorn"></i> <span>News</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
      <li>
       <a href="<?php echo base_url().'backend/event'?>">
         <i class="fa fa-calendar"></i> <span>Event Calender</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
      <li class="active">
       <a href="<?php echo base_url().'backend/karyawan'?>">
         <i class="fa fa fa-group"></i> <span>Employee Directory</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
      <li>
       <a href="<?php echo base_url().'backend/library'?>">
         <i class="fa fa-book"></i> <span>Library</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
      <li>
       <a href="<?php echo base_url().'backend/inbox'?>">
         <i class="fa fa-commenting-o"></i> <span>Discussion Forum</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
      <li>
       <a href="<?php echo base_url().'backend/hris'?>">
         <i class="fa fa-folder-open-o"></i> <span>Login HRIS</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>
      <li>
       <a href="<?php echo base_url().'backend/ticketing'?>">
         <i class="fa fa-headphones"></i> <span>Ticketing</span>
         <span class="pull-right-container">
           <small class="label pull-right"></small>
         </span>
       </a>
     </li>


   </ul>
   <div class="profile_info">

								<a href="<?php echo base_url().'administrator/logout'?>">Log Out</a>
							</div>
 </section>
 <!-- /.sidebar -->
</aside>
					
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		    <div class="banner">
		    	<h2>
				 <?php $this->load->view('front/atas');?>
				<span>Employee Directory</span>
				</h2>
		    </div>

		<!--//banner-->
		<div class="content-top">
		<div class="col-md-6">


		<form action="<?php echo base_url().'backend/karyawan/search'?>" method="post">
										<div class="input-group input-group-in">
												<input type="text" name="keyword" class="form-control2 input-search" placeholder="Search...">
												<span class="input-group-btn">
														<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
												</span>
										</div><!-- Input Group -->
								</form>
							</div>
								<div class="col-md-6">
									<div class="float-right">

																	


									</div>
										</div>
<!--//banner-->
<div class="clearfix"></div>
	</div>

    <div class="gallery">
     
 <?php
                                            foreach ($sorting as $b) {

                                        ?>
            

                 


        
    <div class="col-md" >
      <div class="profile-zonk">

        <div class="profile-zonk-top">
          <div class="col-md-2 profile-zonk-img">
          <img src="<?php echo base_url().'gambar/'.$b->photo;?>" alt="">
        </div>
        <div class="col-md-10 profile-text">
          <h6><?php echo $b->username?></h6>
          <table>
						<tr><td>Departement</td>
	          <td>:</td>
	          <td><?php echo $b->dept?></td></tr>

          <tr><td>Jabatan</td>
          <td>:</td>
          <td><?php echo $b->jabatan?></td></tr>

          <tr>
          <td>Email</td>
          <td> :</td>
          <td><?php echo $b->email?></td>
          </tr>

          <tr>
          <td>No Hp </td>
          <td>:</td>
          <td><?php echo $b->hp?></td>
          </tr>

          </table>
        </div>
        <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>




      </div>
  </div>
  <?php };?>
  </div>
 	 <!--gallery-->

	<!--//gallery-->
		<!---->
<?php
    $this->load->view('front/footer');
  ?>

<!---->

<script src="<?php echo base_url().'web/js/jquery.nicescroll.js'?>"></script>
<script src="<?php echo base_url().'web/js/scripts.js'?>"></script>
<!--//scrolling js-->

</body>
</html>
