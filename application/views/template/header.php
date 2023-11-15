<!DOCTYPE HTML>
<html>

<head>
	<title><?=$this->session->userdata('dept')?> | asri-connect</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="description" content="IT portal ASRI">
	<meta name="keywords" content="terabytee" />
	<meta name="author" content="aom.my.id">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url().'gambar/icon.png'?>" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo base_url().'gambar/icon.png'?>">

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="<?php echo base_url().'web/css/bootstrap.min.css'?>" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="<?php echo base_url().'web/css/style.css'?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url().'web/css/_all-skins.min.css'?>" rel='stylesheet' type='text/css' />

	<!-- Select2 -->
 	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">

	<link href="<?php echo base_url().'web/css/font-awesome.css'?>" rel="stylesheet">
	
	<!-- Mainly scripts -->
	<script src="<?php echo base_url().'web/js/jquery.metisMenu.js'?>"></script>
	<script src="<?php echo base_url().'web/js/jquery.slimscroll.min.js'?>"></script>
	<!-- Custom and plugin javascript -->
	<link href="<?php echo base_url().'web/css/custom.css'?>" rel="stylesheet">

	<script src="<?php echo base_url().'web/js/custom.js'?>"></script>
	<script src="<?php echo base_url().'web/js/screenfull.js'?>"></script>
	<script src="<?php echo base_url().'web/js/jquery.min.js'?>"> </script>
	<script src="<?= base_url().$bootstrapjs?>"> </script>

	<script>
		$(function() {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}


			$('#toggle').click(function() {
				screenfull.toggle($('#container')[0]);
			});

		});
	</script>

	<!----->


	<!--skycons-icons-->
	<script src="<?php echo base_url().'web/js/skycons.js'?>"></script>
	<!--//skycons-icons-->
</head>
<?php
           function limit_words($string, $word_limit){
               $words = explode(" ",$string);
               return implode(" ",array_splice($words,0,$word_limit));
           };

       ?>

			 <body class="skin-blue">

			 	<div id="wrapper">
