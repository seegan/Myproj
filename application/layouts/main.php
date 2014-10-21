<html>
<head>
  <title>Ozylog{title}</title>
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/styles.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="UTF-8">
  <style type="text/css">

/*    .navbar-fixed-top, .navbar-fixed-bottom
    {
      position: relative;
    }*/
   
    .ico-information {
        display: inline-block;
    }
    #footer
    {
        height: 50px;
        width: 100%;
        margin-bottom: 0px;
    }
    .container-full {
      margin: 0 auto;
      width: 100%;
    }
    div.list-group-item:hover,
    div.list-group-item:focus {
      color: #555;
      text-decoration: none;
      background-color: #f5f5f5;
    }
  </style>
</head>
<body style="color: #413F3F;background-color: #EFF4F5;margin:auto;">

<div class="menu_bar">
    <ul>
      <li class="brand-name"><a href="#"><i class="fa fa-bell"></i> RingTheBell</a></li>
      <li class="btn-menu"><a href="#"><i class="fa fa-th"></i></a></li>
      <li class="btn-search"><a href="#"><i class="fa fa-search"></i></a></li>
      <li class="btn-category"><a href="#"><i class="fa fa-th-list"></i></a></li>
    </ul>
  </div>
    <div class="search_bar">
      <div class="search-form">
      <input type="text">
      <button><i class="fa fa-search"></i></button>
      </div>
    </div>
    <div class="category_list">
      <div id="cssmenu" style="margin-bottom:10px">
      <ul style="overflow-y: auto;height: 68%;">
         <li class=""><a href="#"><span>Category List</span></a></li>
         <li class="has-sub"><a href="#"><span>Products</span></a>
            <ul style="display: none;">
               <li><a href="#"><span>Product 1</span></a></li>
               <li><a href="#"><span>Product 2</span></a></li>
               <li class="last"><a href="#"><span>Product 3</span></a></li>
            </ul>
         </li>
         <li class="has-sub"><a href="#"><span>About</span></a>
            <ul style="display: none;">
               <li><a href="#"><span>Company</span></a></li>
               <li class="last"><a href="#"><span>Contact</span></a></li>
            </ul>
         </li>
         <li class="last"><a href="#"><span>Contact</span></a></li>
      </ul>
    </div>
    </div>
  <header>
    <nav>
      <ul>
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-list"></i> Category</a></li>
        <li><a href="#"><i class="fa fa-plus-square"></i> New Stories</a></li>
        <li><a href="<?php echo site_url('post/story'); ?>"><i class="fa fa-file-text"></i> Write Story</a></li>
        <?php 
        $user = getCurrentUser();
        if($user['logged_in']==true)
        {?>
        <li><a href="<?php echo site_url('user/logout'); ?>"><i class="fa fa-file-text"></i>Log Out</a></li>
        <?php
        }
        else
        {?>
           <li><a href="<?php echo site_url('user/register');?>"><i class="fa fa-umbrella"></i> Register</a></li>
        <li><a href="<?php echo site_url('user/login');?>"><i class="fa fa-sign-in"></i> Login</a></li>
       <?php }
        ?>
       
        <li class="lg-search-form"><a href="#"> 
      <input type="text">
      <button><i class="fa fa-search"></i></button>
      </a></li>
       
      </ul>
    </nav>
  </header>


	<!-- Header Container -->
	<div class="container-fluid" >
  	<span class="hidden-xs">
      <div class="row header-bg-image"> 
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 header-logo-content"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="100%"></div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 header-icon-content"><i class="fa fa-search fa-4x fa-border"></i><br><h4>SEARCH</h4></div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 header-icon-content"><i class="fa fa-file-text-o fa-4x fa-border"></i><br><h4>READ</h4></div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 header-icon-content"><i class="fa fa-bell-o fa-4x fa-border"></i><br><h4>RING</h4></div>
      </div>
    </span>
    <span class="hidden-md hidden-sm hidden-lg" >
      <div class="row mobile-header-bg-image"> 
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mobile-header-icon-content"><i class="fa fa-search fa-2x fa-border"></i><br>SERACH</div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mobile-header-icon-content"><i class="fa fa-file-text-o fa-2x fa-border"></i><br>READ</div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mobile-header-icon-content"><i class="fa fa-bell-o fa-2x fa-border"></i><br>RING</div>
      </div>
    </span>
  </div>
	<!-- End of Header Container -->

  <!-- Info message -->
  <?php if($this->session->flashdata('success')) { ?>
    <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success');  ?></div>
  <?php } if($this->session->flashdata('info')) { ?>
    <div class="alert alert-info" role="alert"><?php echo $this->session->flashdata('info');  ?></div>
  <?php } if($this->session->flashdata('warning')) { ?>
    <div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('warning');  ?></div>
  <?php } if($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error');  ?></div>
  <?php } ?>
  <!-- End of info message -->

  <!-- Breadcrumb -->
  <div class="container-fluid" style="margin-bottom:10px;padding-left:0px;padding-right:0px;" >
    <ol class="breadcrumb" style="background-color: rgba(107, 185, 240, 0.37);">
      <li><a href="#">Home</a></li>
      <li><a href="#">Library</a></li>
      <li class="active">Data</li>
      <span style="float:right">Hi!!! 
        <?php 
        $user = getCurrentUser();
        if($user['logged_in']==true)
        {
          echo $user['user_name'];
        }
        else
        {
          echo "Guest";
        }
        ?>
      </span>
    </ol>
  </div>
  <!-- End of Breadcrumb -->

    <div>
    	{body}
    </div>
  <!-- Footer content --> 
    <div class="container-fluid" style="background-color:#39A79E;margin-top:10px;padding-top:20px;padding-bottom: 20px;">
      <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 footer-popular-posts">
          <h5><i class="fa fa-bullhorn">  Popular Posts</i></h5>
            <ul>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
            </ul>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 footer-user-posts">
          <h5><i class="fa fa-file-text"> Posts By Users</i></h5>
            <ul>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
              <li><a href="#">அறிவிப்பட்டது தொடர்பாக எழுந்த</a></li>
            </ul>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 footer-top-ringers">
          <h5><i class="fa fa-users">  Top Ringers</i></h5>
          <ul>
            <li><a href="#">Mahesh</a></li>
            <li><a href="#">Seegan</a></li>
            <li><a href="#">Karthick</a></li>
            <li><a href="#">Rajesh</a></li>
            <li><a href="#">Admin</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 footer-social" style="color:#FFF;background-color: 0B8D8D;border: solid 7px #076572;border-radius: 6;">
          <h5><i class="fa fa-umbrella">  Follow us on</i></h5>
          <ul>
            <li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
            <li><a href="#"><i class="fa fa-google-plus-square"></i> Google+</a></li>
            <li><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
          </ul>

        </div>
      </div>
      </div>
    </div>

    <div class="container-fluid" style="background-color:#1EAAAA;padding:10px;height:35px;color:#FFF">
      <div class="row text-center"><i class="fa fa-copyright">&nbsp;&nbsp;All Rights are reserved by axaxa.com 2014.</i></div>
    </div>
  <!-- End of Footer content --> 
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/custom_script.js"></script>
</body>
</html>