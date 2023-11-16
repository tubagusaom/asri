
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
	<div class="content-mid">
		
	<form>
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
