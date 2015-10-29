<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Laporan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url(); ?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url().$this->module;?>">Laporan</a></li>
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
   <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/grafik'">
      <div class="tile-body">
         <i class="icon-bar-chart"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Grafik
         </div>
         <div class="number">
            <!-- (G) -->
         </div>
      </div>
   </div>
   <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/data'">
      <div class="tile-body">
         <i class="icon-file-text"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Data
         </div>
         <div class="number">
            <!-- (D) -->
         </div>
      </div>
   </div>
</div>