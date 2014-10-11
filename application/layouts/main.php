<html>
<head>
  <title>Ozylog{title}</title>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tinyEditor/style.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/styles.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="UTF-8">
  <style type="text/css">

/*    .navbar-fixed-top, .navbar-fixed-bottom
    {
      position: relative;
    }*/


    
    #center {
        text-align: center;
    }

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
<body style="color: #413F3F;background-color: #EFF4F5;margin:auto;font-family: 'Ubuntu', sans-serif;">


    <div id="header">

    <!--Navigation Bar -->   
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url(); ?>">Brand</a>
  </div>
  <div class="navbar-collapse collapse navbar-inverse-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Active</a></li>
      <li><a href="<?php echo site_url('post/story'); ?>">Write Story</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Dropdown header</li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left">
      <input type="text" class="form-control col-lg-8" placeholder="Search">
    </form>
    <ul class="nav navbar-nav navbar-right">

    <?php 
      $user = getCurrentUser();
      if($user['logged_in']==true)
      {
    ?>

        <li><a href="#">Welcome <?php echo $user['user_name']; ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('user/logout'); ?>">Log Out</a></li>
          </ul>
        </li>


    <?php
      }
      else
      {
    ?>
        <li><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
        <li><a href="<?php echo site_url('user/register'); ?>">Register</a></li>

    <?php
      }
    ?>

    </ul>
  </div>
</div>
	<!-- End of navigation bar -->

	<!-- Header Container -->
	<div class="container-fluid" >
  	<span class="hidden-xs">
      <div class="row" id="center" style="background-color:#D0DDD8;padding-top: 75px;padding-bottom: 10px;">
          <div class="col-xs-4 col-lg-4 col-md-4" style="color:#0C9C74;"><i class="fa fa-search fa-5x fa-border" style="border: solid 1px #0C9C74;"></i><br><h4>Search </h4></div>
          <div class="col-xs-4 col-lg-4 col-md-4" style="color:#0C9C74;"><i class="fa fa-file-text-o fa-5x fa-border" style="border: solid 1px #0C9C74;"></i><br><h4>Read </h4></div>
          <div class="col-xs-4 col-lg-4 col-md-4" style="color:#0C9C74;"><i class="fa fa-bell-o fa-5x fa-border" style="border: solid 1px #0C9C74;"></i><br><h4>Ring </h4></div>
      </div>
    </span>
    <span class="hidden-md hidden-sm hidden-lg" >
      <div class="row" id="center" style="background-color:#D0DDD8;padding-top: 70px;padding-bottom: 0px;">
          <div class="col-xs-4 col-lg-4 col-md-4" style="color:#0C9C74;"><i class="fa fa-search fa-3x fa-border" style="border: solid 1px #0C9C74;"></i><br><h6>Search</h6></div>
          <div class="col-xs-4 col-lg-4 col-md-4" style="color:#0C9C74;"><i class="fa fa-file-text-o fa-3x fa-border" style="border: solid 1px #0C9C74;"></i><br><h6>Read</h6></div>
          <div class="col-xs-4 col-lg-4 col-md-4" style="color:#0C9C74;"><i class="fa fa-bell-o fa-3x fa-border" style="border: solid 1px #0C9C74;"></i><br><h6>Ring</h6></div>
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
  <div class="container-fluid" style="margin-bottom:10px;" >
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Library</a></li>
      <li class="active">Data</li>
    </ol>
  </div>
  <!-- End of Breadcrumb -->

    <div>
    	{body}
    </div>
  <!-- Footer content --> 
    <div class="container-fluid" style="background-color:#51BA77;margin-top:10px;padding-top:20px;padding-bottom: 20px;">
      <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3" style="color:#FFF">

          <h4><i class="fa fa-bullhorn">&nbsp;&nbsp;Popular Posts</i></h4>
            <div style="margin-left:27px">
              List group item heading <br>
              List group item heading <br>
              List group item heading <br>
              List group item heading <br> 
            </div> 
        </div style="margin-left:27px">

        <div class="col-lg-3 col-md-3 col-sm-3" style="color:#FFF">
          <h4><i class="fa fa-file-text">&nbsp;&nbsp;Posts By Users</i></h4>
            <div style="margin-left:27px">
              List group item heading <br>
              List group item heading <br>
              List group item heading <br>
              List group item heading <br> 
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3" style="color:#FFF">
          <h4><i class="fa fa-users">&nbsp;&nbsp;Top Ringers</i></h4>
          <div style="margin-left:27px">
            <i class="fa fa-user">&nbsp;&nbsp;Seegan</i><br>
            <i class="fa fa-user">&nbsp;&nbsp;Mahesh</i><br>
            <i class="fa fa-user">&nbsp;&nbsp;Karthick</i><br>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3" style="color:#FFF">
          <h4><i class="fa fa-umbrella">&nbsp;&nbsp;Follow us on</i></h4>
          <div style="margin-left:27px">
            <i class="fa fa-facebook-square">&nbsp;&nbsp;Facebook</i><br>
            <i class="fa fa-twitter-square">&nbsp;&nbsp;Twitter</i><br>
            <i class="fa fa-pinterest-square">&nbsp;&nbsp;Pinterest</i><br>
            <i class="fa fa-umbrella">&nbsp;&nbsp;Follow us on</i><br>
          </div>

        </div>
      </div>
      </div>
    </div>

    <div class="container-fluid" style="background-color:#31976E;padding:10px;height:35px;color:#FFF">
      <div class="row text-center"><i class="fa fa-copyright">&nbsp;&nbsp;All Rights are reserved by axaxa.com 2014.</i></div>
    </div>
  <!-- End of Footer content --> 
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/tinyEditor/tinyeditor.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/custom_script.js"></script>
  <script type="text/javascript">
new TINY.editor.edit('editor',{
  id:'input',
  cssclass:'te',
  controlclass:'tecontrol',
  rowclass:'teheader',
  dividerclass:'tedivider',
  controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
        'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
        'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo'],
  footer:false,
  fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
  xhtml:true,
  cssfile:'style.css',
  bodyid:'editor',
  footerclass:'tefooter',
  toggle:{text:'show source',activetext:'show wysiwyg',cssclass:'toggle'},
  resize:{cssclass:'resize'}
});
</script>

</body>
</html>