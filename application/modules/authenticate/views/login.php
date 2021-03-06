<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0
Version: 1.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Halaman Login</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="<?php echo base_url(); ?>public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL STYLES --> 
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2_metro.css" />
   <!-- END PAGE LEVEL SCRIPTS -->
   <!-- BEGIN THEME STYLES --> 
   <link href="<?php echo base_url(); ?>public/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="<?php echo base_url(); ?>public/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
   <!-- BEGIN LOGO -->
   <div class="logo" style="margin-bottom:30px;">
     <!-- <img height="100px" src="<?php echo base_url(); ?>public/img/bg/atom.png" alt="" />-->
   </div>
   <!-- END LOGO -->
   <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
   <!-- BEGIN LOGIN -->
   <div class="content">
      <!-- BEGIN LOGIN FORM -->
      <form class="login-form" action="<?php echo base_url($this->cname).'/login'; ?>" method="post">         
         <div class="alert alert-error hide">
            <button class="close" data-dismiss="alert"></button>
            <span>Masukkan Username & Password</span>
         </div>
         <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
               <i class="icon-user"></i>
               <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="login-email"/>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
               <i class="icon-lock"></i>
               <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="login-password"/>
            </div>
         </div>
         <div class="form-actions">
            <!-- <label class="checkbox">
            <input type="checkbox" name="remember" value="1"/> Remember me
            </label> -->
            <button type="submit" class="btn red pull-right">
            Login <i class="m-icon-swapright m-icon-white"></i>
            </button>            
         </div>
      </form>
      
   </div>
   <!-- END LOGIN -->
   <!-- BEGIN COPYRIGHT -->
   <div class="copyright">
      2015 &copy; Cloud Astro.
   </div>   
   <script src="<?php echo base_url(); ?>public/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="<?php echo base_url(); ?>public/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="<?php echo base_url(); ?>public/plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <!--<script src="<?php echo base_url(); ?>public/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>-->
   <script src="<?php echo base_url(); ?>public/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/select2/select2.min.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="<?php echo base_url(); ?>public/scripts/app.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/scripts/login-soft.js" type="text/javascript"></script>      
   <!-- END PAGE LEVEL SCRIPTS --> 
   <script>
      jQuery(document).ready(function() {     
        App.init();
        // Login.init();
      });
   </script>
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
