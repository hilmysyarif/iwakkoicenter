<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Menu Bahan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
         <li><a href="">Bahan</a></li>
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
   <div class="tile double bg-green" onclick="window.location='data'">
      <div class="tile-body">
         <i class="icon-list"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Bahan
         </div>
         <div class="number">
            <!-- (H) -->
         </div>
      </div>
   </div>
   
</div>
