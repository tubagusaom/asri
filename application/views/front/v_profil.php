
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		    <div class="banner">
		    	<h2>
			 <?php $this->load->view('front/atas');?>
				<span>Profile</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--gallery-->
 	 <div class=" profile">

		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
				<div class="col-md-3 profile-bottom-img">
				<img width="80px" height="80px" src="<?php echo base_url().'gambar/'.$admin_detail['photo'];?>" alt="">
			</div>
			<div class="col-md-9 profile-text">
				<h6><?php echo $admin_detail['username'];?></h6>
				<table>
				<tr><td>Department</td>
				<td>:</td>
				<td><?php echo $admin_detail['dept'];?></td></tr>
				<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td> <?php echo $admin_detail['jabatan'];?></td>
				</tr>
				<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $admin_detail['email'];?></td>
				</tr>
				<tr>
				<td>No Hp </td>
				<td>:</td>
				<td><?php echo $admin_detail['hp'];?></td>
				</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>

		
		</div>
	</div>
	