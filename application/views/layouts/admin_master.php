<html class="no-js"><!--<![endif]--><head><style></style><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <title><?php echo isset($title) ? "$title":NULL; ?></title>
        <meta content="" name="description">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <style>.file-input-wrapper { overflow: hidden; position: relative; cursor: pointer; z-index: 1; }.file-input-wrapper input[type=file], .file-input-wrapper input[type=file]:focus, .file-input-wrapper input[type=file]:hover { position: absolute; top: 0; left: 0; cursor: pointer; opacity: 0; filter: alpha(opacity=0); z-index: 99; outline: 0; }.file-input-name { margin-left: 8px; }</style><link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic">
        <!-- needs images, font... therefore can not be part of ui.css -->
        <link href="<?php echo base_url(); ?>assets/role_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/role_assets/bower_components/weather-icons/css/weather-icons.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/role_assets/custom/css/styles.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/role_assets/flat-icon/flaticon.css">


        <!-- end needs images -->

            <link href="<?php echo base_url(); ?>assets/role_assets/styles/main.css" rel="stylesheet">

    <style></style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style id="holderjs-style" type="text/css"></style></head>
   <body data-ng-app="app" id="app" data-custom-background="" data-off-canvas-nav="">
        <!--[if lt IE 9]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div data-ng-controller="AppCtrl">
            <div data-ng-hide="isSpecificPage()" data-ng-cloak="">
                <section id="header" class="top-header">
                    <?php include('admin_header.php');?>
                </section>

                <aside id="nav-container">
                    <?php include('admin_nav.php');?>
                </aside>
            </div>

            <div class="view-container">
                <section id="content" class="animate-fade-up">
                    <?php $this->load->view($content); ?>
                </section>
            </div>
        </div>
        <script src="<?php echo base_url();?>assets/role_assets/scripts/vendor.js"></script>
        <script src="<?php echo base_url();?>assets/role_assets/scripts/ui.js"></script>
        <script src="<?php echo base_url();?>assets/role_assets/scripts/app.js"></script>
    </body>    </html>
    
