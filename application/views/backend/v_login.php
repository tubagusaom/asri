
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
<link href="<?php echo base_url().'web/css/font-awesome.css'?>" rel="stylesheet">
<script src="<?php echo base_url().'web/js/jquery.min.js'?>"> </script>
<script src="<?php echo base_url().'web/js/bootstrap.min.js'?>"> </script>
</head>
<body>
     <div class="atas">
            <img width="100%"  src="<?php echo base_url().'gambar/headerbaru.png'?>"  />  </div>
  <div class="col-md-6 gombor">
<img src="<?php echo base_url().'gambar/logoasri.png'?>" alt="logo" />
<h3>Thank you for connect to IT portal ASRI.<br>
Please login first to connect.
</h3>
  </div>
  <div class="col-md-6 gambar">

    <div>
         <p><?php echo $this->session->flashdata('msg');?></p>
        </div>
	<div class="login">


		<div class="login-bottom">

			 <form action="<?php echo base_url().'admin/auth'?>" method="post">
			<div class="col-md-12">
				<div class="login-mail">
					<input type="text" name="username" placeholder="User Name" required="">

				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">

				</div>



			</div>

      <div class="col-md-12 login-do">

         <a target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=new" onClick="return confirm ('Jika Lupa Password Silahkan Send Email Ke : admin@asriconnect.com')" >
            Forget Password?
            </a>
            <label class="hvr-shutter-in-horizontal login-sub">
              <input type="submit" value="Login">
              </label>
      </div>

			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->

<!---->
  </div>
  
  <div class="col-md-12 copy-right">
              <p> &copy; 2020 | Design by <a href="http://deelabs.com/" target="_blank">Deelabs</a> </p>	    </div>
<!--scrolling js-->
	<script src="<?php echo base_url().'web/js/jquery.nicescroll.js'?>"></script>
	<script src="<?php echo base_url().'web/js/scripts.js'?>"></script>
	<!--//scrolling js-->
</body>
</html>
