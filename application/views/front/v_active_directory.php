<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">
        
		<div class="banner">
			<h2>
				<?php $this->load->view('front/atas');?>
				<span>Active Directory</span>
			</h2>
		</div>

		<div class="content-mid" style="min-height:850px">

			<div class="mid-content-top">
                <!-- <form action="<?php echo base_url().'backend/post/search'?>" method="post">
					<div class="input-group input-group-in">
						<input type="text" name="keyword" class="form-control2 input-search" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form> -->

				<!-- <div class="four">
                        <img src="<?php echo base_url().'web/images/404.png'?>" alt="" />
                        <p>Connect To HRIS ASRI <i class="fa fa-server"></i></p>
                        <a href="<?=base_url('backend/hris')?>" class="hvr-shutter-in-horizontal">Connect <i class="fa fa-plug"></i></a>
                    </div> -->
                
                <div class="content">

                    <div class="switch-holder">
                        <div class="switch-label">
                            <span>Connect To HRIS ASRI</span> <i class="fa fa-server"></i>
                        </div>
                        <div class="switch-toggle">
                            <input type="checkbox" id="server">
                            <label for="server"></label>
							<!-- <button type="submit" class="btn btn-block btn-primary" style="border-radius:4px;">
								Connect <i class="fa fa-plug"></i>
							</button> -->
                        </div>
                    </div>

                </div>

				<!-- <div class="row"> -->
					<div id="form-loginhris">
						<div class="modal-content">
							<div class="modal-header">
								<button id="close-1" type="button" class="close">&times;</button>
								<h4 class="modal-title">Login To HRIS ASRI</h4>
							</div>

							<div class="modal-body">
								<form action="<?=base_url('backend/active_directory/auth_ad')?>" method="POST">
									<div class="input-group">
										<span class="input-group-addon">Domain</span>
										<input id="domain" type="text" class="form-control" name="domain" placeholder="Domain">
									</div>
									<div class="input-group">
										<span class="input-group-addon">Server &nbsp;&nbsp;</span>
										<input id="server" type="text" class="form-control" name="server" placeholder="Server">
									</div>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input id="user" type="text" class="form-control" name="user" placeholder="User">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input id="password" type="password" class="form-control" name="password" placeholder="Password">
									</div>
									
							</div>
							
							<div class="modal-footer">
								<div class="row col-md-10 float-left">
										<button type="submit" class="btn btn-block btn-primary" style="border-radius:4px;">
											Connect <i class="fa fa-plug"></i>
										</button>
									</div>

									<div class="row col-md-2 float-right">
										<button id="close-2" type="button" class="btn btn-block btn-default" style="border-radius: 4px;">Close</button>
									</div>
							</div>
							</form>
						</div>
					</div>
				<!-- </div> -->
				
                
				<!-- <div class="middle-content">
					<div class="top_place section_padding">
						<div class="row">Content Active Directory</div>
					</div>
				</div> -->

			</div>
            
			<!-- <div class="clearfix"></div> -->

		</div>

		<script>
			var btnSwitch = $('.switch-holder');
			var formLogin = $('#form-loginhris');
			formLogin.hide();

			$("#server").change(function() {
				if($(this).prop('checked')) {
					formLogin.show();
					btnSwitch.hide();
				} else {
					formLogin.hide();
				}
			});

			$("#close-1").click(function(){
				formLogin.hide();
				btnSwitch.show();
				$("#server").prop('checked',false);
			});

			$("#close-2").click(function(){
				formLogin.hide();
				btnSwitch.show();
				$("#server").prop('checked',false);
			});
			
		</script>

		