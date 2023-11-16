<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">

		<!--banner-->
		<!-- <div class="banner ">
						<h2>
							<?php $this->load->view('front/atas');?>
							<span>Latest News</span>
						</h2>
				</div> -->
		<!--//banner-->
		<!--content-->
		<div class="content-top">
			<!-- div class="col-md-6">
						<h3>Latest News</h3>
					</div> -->

			<div class="col-md-12">
				<form action="<?php echo base_url().'backend/post/search'?>" method="post">
					<div class="input-group input-group-in">
						<input type="text" name="keyword" class="form-control2 input-search" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>

			<!-- <div class="col-md-6">
						<div class="float-right">

							<div class="btn-group">
								<?php echo $page; ?>
							</div>

						</div>
					</div> -->

			<div class="clearfix"> </div>
		</div>
		<!---->


		<div class="content-mid">

			<div class="mid-content-top">
				<div class="middle-content">

					<!-- <h3>Latest News</h3> -->

					<!-- start content_slider -->
					<div class="top_place section_padding">
						<div class="row">

							<?php
										foreach ($data_berita as $b) {
											$idberita=$b['idberita'];
											$judul=$b['judul'];
											// $isi=limit_words($b['isi'],15);
											$isi=$berita[$b['idberita']];
											$tglpost=$b['tglpost'];
											$gbr=$b['gambar'];
											$user=$b['user'];
									?>

							<div class="col-md-6">
								<div class="single_place">
									<img widht="260" height="260" style="padding:15px"
										src="<?php echo base_url().'assets/gambars/'.$gbr;?>" alt="">
									<div class="hover_Text d-flex align-items-end justify-content-between">
										<div class="hover_text_iner">
											<p style="font-size:14px;"><?php echo $judul; ?></p> <br>
											

											<a href="<?php echo base_url().'backend/post/detail_berita/'.$idberita;?>"
												class="place_btn">Read More</a>
										</div>
										<div class="details_icon text-right">
											<i class="ti-share"></i>
										</div>
									</div>
								</div>
							</div>
							<?php }; ?>


						</div>

					</div>
				</div>

			</div>
			<div class="clearfix"> </div>

			<div class="content-top">

				<div class="col-md-12">
					<div class="float-right">

						<div class="btn-group">
							<?php echo $page; ?>
						</div>

					</div>
				</div>

				<div class="clearfix"> </div>
			</div>

		</div>
		<!----->

		<!--//content-->

		<div class="typo-grid">

			<div class="typo-1">
				<div class="grid_3 grid_5">
					<h3 class="head-top">Kategori Berita</h3>
					<div class="but_list">
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#home" id="home-tab" role="tab"
										data-toggle="tab" aria-controls="home" aria-expanded="true">Pengumuman</a>
								</li>
								<li role="presentation">
									<a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
										aria-controls="profile">Informasi</a>
								</li>
							</ul>

							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="home"
									aria-labelledby="home-tab">
									<table class="table">

										<tbody>
											<?php
											foreach ($berita_pengumuman as $fbp) {
												$isi_pengumuman= $limit_pengumuman[$fbp['idberita']];
								 		 	?>

											<tr class="table-row">
												<td class="table-img">
													<a
														href="<?php echo base_url().'backend/post/detail_berita/'.$fbp['idberita'];?>">
														<img width="200px" height="100px"
															src="<?php echo base_url().'assets/gambars/'.$fbp['gambar'];?>"
															alt="" /></a>
												</td>
												<td class="table-text">
													<a
														href="<?php echo base_url().'backend/post/detail_berita/'.$fbp['idberita'];?>">
														<h6><?=$fbp['judul']; ?></h6>
													</a>
													<p><?=$fbp['kategori']; ?></p>
												</td>

												<td class="march">
													<?=$fbp['tglpost']; ?>
												</td>

											</tr>
											<?php }; ?>

										</tbody>
									</table>
								</div>

								<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
									<table class="table">

										<tbody>

											<?php
								 		 			foreach ($berita_information as $fbi) {
														$isi_information=$limit_information[$fbi['idberita']];
								 		 	    ?>

											<tr class="table-row">
												<td class="table-img">
													<a
														href="<?= base_url().'backend/post/detail_berita/'.$fbi['idberita'];?>">
														<img width="200px" height="100px"
															src="<?= base_url().'assets/gambars/'.$fbi['gambar'];?>"
															alt="" /></a>
												</td>
												<td class="table-text">
													<a
														href="<?= base_url().'backend/post/detail_berita/'.$fbi['idberita'];?>">
														<h6><?= $fbi['judul']; ?></h6>
													</a>
													<p><?=$fbi['kategori']; ?></p>
												</td>

												<td class="march">
													<?=$fbi['tglpost']; ?>
												</td>

											</tr>
											<?php }; ?>

										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>