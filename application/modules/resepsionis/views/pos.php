<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Menu POS
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li>
            <a href="<?php echo base_url($this->module);?>">Menu Resepsionis</a>
            <i class="icon-angle-right"></i>
        </li>
         <li><a href="#">Menu POS</a></li>
         <li class="pull-right">
            <div style="display:block; background-color:#271000 ; color:#fff; margin-right:-30px; padding:10px; top:-10px; position:relative">
               <i class="icon-calendar"></i>
               <span><?php echo tanggalIndo(date('Y-m-d'));?></span>
            </div>
         </li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->

<div class="tiles">
   <!-- <div class="tile bg-purple" onclick="window.location='<?php echo base_url($this->module).'/pelanggan';?>'">
      <div class="tile-body">
         <i class="icon-user"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Pendaftaran User
         </div>
         <div class="number">
         </div>
      </div>
   </div>
   <div class="tile double bg-blue" onclick="window.location='<?php echo base_url($this->module).'/dashboard';?>'">
      <div class="tile-body">
         <i class="icon-home"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Dashboard Room View
         </div>
         <div class="number">
         </div>
      </div>
   </div> -->
   <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->cname).'/reguler';?>'">
      <div class="tile-body">
         <i class="icon-shopping-cart"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            POS Reguler
         </div>
         <div class="number">
            <!-- (H) -->
         </div>
      </div>
   </div>
   <div class="tile double bg-yellow" onclick="window.location='<?php echo base_url($this->cname); ?>/paramedik'">
      <div class="tile-body">
         <i class="icon-user"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            POS Paramedik
         </div>
         <div class="number">
            <!-- (K) -->
         </div>
      </div>
   </div>
</div>