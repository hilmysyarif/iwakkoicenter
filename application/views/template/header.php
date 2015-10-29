<div class="header navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="header-inner">
      <!-- BEGIN LOGO -->
      <a class="navbar-brand" href="index.html">
         <!-- <img src="<?php echo base_url(); ?>public/img/logo.png" alt="logo" class="img-responsive" /> -->
      </a>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="<?php echo base_url(); ?>public/img/menu-toggler.png" alt="" />
      </a>
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <?php $this->load->view('template/notification'); ?>
      <!-- END TOP NAVIGATION MENU -->
   </div>
   <!-- END TOP NAVIGATION BAR -->
</div>

