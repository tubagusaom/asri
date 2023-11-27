
	<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">

 	<!--banner-->
	<div class="banner">
		<h2>
			<?php $this->load->view('front/atas');?>
			<span>Login HRIS</span>
		</h2>
	</div>
	<!--//banner-->

	<!--gallery-->
	<div class="content-mid" style="min-height:850px">

	<div class="mid-content-top">
                
                <div class="row">
                    <!-- <div class="four">
                        <img src="<?php echo base_url().'web/images/404.png'?>" alt="" />
                        <p>Connect To HRIS ASRI <i class="fa fa-server"></i></p>
                        <a href="<?=base_url('backend/hris')?>" class="hvr-shutter-in-horizontal">Connect <i class="fa fa-plug"></i></a>
                    </div> -->

                    <div class="switch-holder">
                        <div class="switch-label">
                            <span>Connect To HRIS ASRI</span> <i class="fa fa-server"></i>
                        </div>
                        <div class="switch-toggle">
                            <input type="checkbox" id="server">
                            <label for="server"></label>
                        </div>
                    </div>

                </div>

			</div>
            
			<!-- <div class="clearfix"></div> -->
		
	<form id="form-loginhris" action="<?=base_url('backend/hris')?>" method="POST">
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
			<input id="email" type="text" class="form-control" name="user" placeholder="User">
		</div>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
			<input id="password" type="password" class="form-control" name="password" placeholder="Password">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-block btn-primary" style="border-radius:4px;">
				Connect <i class="fa fa-plug"></i>
			</button>
		</div>

	</form>

	</div>

	<script>
		var formLogin = $('#form-loginhris');
		formLogin.hide();

		$("#server").change(function() {
			if($(this).prop('checked')) {
				formLogin.show();
			} else {
				formLogin.hide();
			}
		});
		
	</script>
