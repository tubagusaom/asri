
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		    <div class="banner">
		    	<h2>
			  <?php $this->load->view('front/atas');?>
				<span>Event Calender</span>
				</h2>

		    </div>
				<div class="content-top">
				<div class="col-md-6">


				<form action="<?php echo base_url().'backend/event/search'?>" method="post">
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
 	 <!--gallery-->
 	 <div class=" profile">
		 <?php
		 			foreach ($event->result_array() as $b) {
		 					$idberita=$b['idevent'];
		 					$judul=$b['judul'];
		 					$isi=limit_words($b['isi'],15);
		 					$tglpost=$b['tglpost'];
		 					$gbr=$b['gambar'];
		 					$user=$b['user'];
		 					$hari=$b['hari'];
		 					 $tgl=$b['tglpelaksanaan'];
		 					 
		 	?>
		<div class="profil-bottom">

			<div class="profile-bottom-top">
				<div class="col-md-2 profile-hari">
				
				
														<h6><?php echo $tgl; ?></h6>
														<h6><?php echo $hari; ?></h6> 
															 

			</div>
			<div class="col-md-6 profile-text">
				<h6><?php echo $judul; ?></h6>
				<p><?php echo $isi; ?></p>
        <div class="profile-btn">
                  
                  <a href="<?php echo base_url().'backend/event/detail_event/'.$idberita;?>" >Read More >></a>

        </div>
			</div>

			<div class="col-md-4 profile-bottom-img">
		 <img width="340px" height="300px" src="<?php echo base_url().'assets/gambars/'.$gbr;?>" alt="" />
		</div>
			<div class="clearfix"></div>
			</div>
		</div>
<?php }; ?>

	</div>
	<!--//gallery-->
		