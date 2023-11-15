

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

																		<div class="btn-group">
																			<?php echo $page; ?>
																		</div>


									</div>
										</div>
<!--//banner-->
<div class="clearfix"></div>
	</div>

    <div class="gallery" style="min-height:650px!important">
      <?php

             foreach($karyawan->result_array() as $a):

                 $photo=$a['photo'];
                 $user=$a['username'];
                 $email=$a['email'];
                 $pass=$a['password'];
                 $hp=$a['hp'];
								$jabatan=$a['jabatan'];
								$departement=$a['dept'];


         ?>
    <div class="col-md" >
      <div class="profile-zonk">

        <div class="profile-zonk-top">
          <div class="col-md-2 profile-zonk-img">
          <img src="<?php echo base_url().'gambar/'.$photo;?>" alt="">
        </div>
        <div class="col-md-10 profile-text">
          <h6><?php echo $user;?></h6>
          <table>
						<tr><td>Departement</td>
	          <td>:</td>
	          <td><?php echo $departement;?></td></tr>

          <tr><td>Jabatan</td>
          <td>:</td>
          <td><?php echo $jabatan;?></td></tr>

          <tr>
          <td>Email</td>
          <td> :</td>
          <td><?php echo $email;?></td>
          </tr>

          <tr>
          <td>No Hp </td>
          <td>:</td>
          <td><?php echo $hp?></td>
          </tr>

          </table>
        </div>
        <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>




      </div>
  </div>
  <?php endforeach;?>
  </div>
