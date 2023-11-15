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
<script src="<?php echo base_url().'web/js/jquery.nicescroll.js'?>"></script>
<script src="<?php echo base_url().'web/js/scripts.js'?>"></script>


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
     <li >
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
      <li>
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
      <li class="active">
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
				<span> Detail Ticketing</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--gallery-->
    <div class="profile">
 	
    <div class="col-md-12 banner">
       <center><h3>Ticketing ID : <?php echo $all['id']; ?></h3></center></br>
       <center> <?php if (empty($all['priority'])){
                                echo "-";
                            }elseif($all['priority'] == "URGENT")
                            {
                              echo "<h2 class='label label-danger'>URGENT</h2>";
                            }elseif ($all['priority'] == "MEDIUM"){
                              echo "<h2 class='label label-warning'>MEDIUM</h2>";
                            }elseif ($all['priority'] == "EASY"){
                              echo "<h2 class='label label-success'>EASY</h2>";
                            }
                            
                            
                            ?>
       </center>
       <center><h1><?php echo $all['title']; ?></center>
        </div>
    
    </hr class="col-md-12">
    <div class="col-md-12 butak">
   <br>
   <?php
		 			foreach ($gambar->result_array() as $b) {
		 					$gbr=$b['gambar'];
 
		 	?>
    <div class="col-md-4 spasi">
      <center><a target="_blank" href="<?php echo base_url().'web/images/upload_tiket/'.$gbr;?>" >
    <img widht="200px" height="150px" src="<?php echo base_url().'web/images/upload_tiket/'.$gbr;?>" ></center>
    
           </a>
    </div>
    <?php }; ?>
    </div>
    </br>
   
   
    <div class="col-md-12 banner">
    <div class="col-md-12">
      <h4>Subject :</h4>
     
       <p><?php echo $all['subject']; ?></p>
       <hr>
       <br>
       <h4>Tiketing Owner : <?php echo $all['usernamecrt'];?></h4>
        <h4 style="color: red;" >Executor : <?= !empty($all['usernameexecutor']) ? $all['usernameexecutor'] : '-'; ?>
         <?php if($dept == "IT"){?>
                        <?php if(empty($all['usernameexecutor'])) {?>
                                 <button type="button" data-toggle="modal" data-target="#Modalupdate<?php echo $all['id'];?>" class="btn btn-warning">Update Status</button>
                        <?php } else {
                            echo "";
                        } ?>      
                               <?php }else{
                                    echo "";
                                }
                                ?>
        </h4>
        <h4 style="color: blue;">Handover : <?php echo $all['handover'];?></h4>
           </div>
        
      </div>

      <div class="col-md-12">
        
           </div>  
        
 
    </div>

	<!--//gallery-->
		<!---->
<?php
    $this->load->view('front/footer');
  ?>



<!-- ============ MODAL ADD ticketing =============== -->
<div class="modal fade" id="Modalupdate<?php echo  $all['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3 class="modal-title" id="myModalLabel">Update Status Ticketing</h3>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/ticketing/updateutama'?>" enctype="multipart/form-data">
              <div class="modal-body">

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Date</label>
                      <div class="col-xs-8">
                          <input  class="form-control" type="text" value="<?php date_default_timezone_set('Asia/Jakarta'); 
                            echo date('Y-m-d H:i:s'); ?>" readonly required>
                          <input  class="form-control" type="hidden" name="id" value="<?php echo  $all['id']; ?>" readonly required>
                      </div>
                  </div>
                  
                   <div class="form-group">
                      <label class="control-label col-xs-3" >Pilih Executor</label>
                      <div class="col-xs-8">
                      <select class="form-control" name="executor">
                        
                          <?php foreach ($divisi  as $div) 
                          { ?>
                            <option value="<?php echo $div['username']; ?>"><?php echo $div['username']; ?> - <?php echo $div['dept']; ?></option>
                          <?php	} ?>
                      </select>
                      </div>
                  </div>
                  
                   <div class="form-group">
                      <label class="control-label col-xs-3" >Priority</label>
                      <div class="col-xs-8">
                      <select class="select2" name="priority">
                            <option value="URGENT">Urgent</option>
                            <option value="MEDIUM">Medium</option>
                            <option value="EASY">Easy</option>
                        </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-xs-3" >Pilih Status</label>
                      <div class="col-xs-8">
                      <select class="select2" name="status">
                        <option value="1">Waiting ACC</option> 
                        <option value="2">On Progress</option>
                         <option value="3">Finish</option>
                        <option value="4">Hold</option>
                        <option value="5">Cancel</option>
                      </select>
                      </div>
                  </div>

              </div>

              <div class="modal-footer">
                
                  <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-primary btn-flat">Save</button>
              </div>
          </form>
          </div>
          </div>
      </div>
<!---->

  
<!--//scrolling js-->

</body>
</html>
