
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
			foreach ($event as $b) {
			$isi=$limit_event[$b['idevent']];
		?>

		<div class="profil-bottom">
			<div class="profile-bottom-top">
				<!-- <div class="col-md-2 profile-hari">
					<h6 style="font-size:16px"><?= $b['hari'] . ', ' .$b['tglpelaksanaan']; ?></h6>
				</div> -->
				<div class="col-md-8 profile-text">
					<h6 style="font-size:22px"><?=$b['judul']; ?></h6>
					<h6 class="text-date">
						<i class="fa fa-calendar"></i>
						<?= $b['hari'] . ', ' .$this->terabytee->tgl_indo($b['tglpelaksanaan']); ?>
					</h6>
					<p>
						<?=$isi; ?>
						<a class="btn btn-link" href="<?= base_url().'backend/event/detail_event/'.$b['idevent'];?>" >
							Read More <i class="fa fa-angle-double-right "></i>
						</a>
					</p>
					<!-- <div class="profile-btn">
						<a href="<?= base_url().'backend/event/detail_event/'.$b['idevent'];?>" >Read More >></a>
					</div> -->
				</div>

				<div class="col-md-4 profile-bottom-img">
					<img width="340px" height="300px" src="<?= base_url().'assets/gambars/'.$b['gambar'];?>" alt="" />
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<?php }; ?>

	</div>
		