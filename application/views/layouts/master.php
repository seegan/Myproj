<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo isset($title) ? "$title":NULL; ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
	<link href="<?php echo base_url(); ?>assets/main_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/main_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 	<link href="<?php echo base_url(); ?>assets/main_assets/custom/css/styles.css" rel="stylesheet">
	<?php echo isset($css) ? '<link href="'.base_url().'assets/main_assets/custom/css/'.$css.'" rel="stylesheet">' :NULL;?>
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<meta charset="UTF-8">
</head>
<body>
	
	<!--Header Content -->
	<?php include('header.php');?>
    <!-- End of Header Content-->	
    <?php $this->load->view($content); ?>
	<!-- Footer Content -->
	<?php include('footer.php');?>		
	<!-- End of footer content -->
	<script src="<?php echo base_url(); ?>assets/main_assets/custom/js/jquery-2.1.1.min.js"></script>
  	<script src="<?php echo base_url(); ?>assets/main_assets/bootstrap/js/bootstrap.min.js"></script>
  	<script src="<?php echo base_url(); ?>assets/main_assets/custom/js/custom_script.js"></script>
  	<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
  	<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
</body>
</html>