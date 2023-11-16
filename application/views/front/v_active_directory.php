<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">
        
		<div class="banner">
			<h2>
				<?php $this->load->view('front/atas');?>
				<span>Active Directory</span>
			</h2>
		</div>

		<div class="content-mid">

			<div class="mid-content-top">
                <form action="<?php echo base_url().'backend/post/search'?>" method="post">
					<div class="input-group input-group-in">
						<input type="text" name="keyword" class="form-control2 input-search" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
                
                <div class=" profile">
                    <div class="four">
                        <!-- <img src="<?php echo base_url().'web/images/404.png'?>" alt="" /> -->
                        <p>Connect To HRIS ASRI <i class="fa fa-server"></i></p>
                        <a href="<?=base_url('backend/hris')?>" class="hvr-shutter-in-horizontal">Connect <i class="fa fa-plug"></i></a>
                    </div>
                </div>
                
				<!-- <div class="middle-content">
					<div class="top_place section_padding">
						<div class="row">Content Active Directory</div>
					</div>
				</div> -->

			</div>
            
			<div class="clearfix"></div>

			<!-- <div class="content-top">

				<div class="col-md-12">
					<div class="float-right">

						<div class="btn-group">
							Page
						</div>

					</div>
				</div>

				<div class="clearfix"></div>
			</div> -->

		</div>

		