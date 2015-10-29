<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Gaji Karyawan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Gaji Karyawan</a></li>
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

<div class="row">
   <div class="col-md-12">
      <div class="tiles" style="padding:10px; margin-right:0px; background-color:#eee; height:155px">
         <div class="tile bg-green" onclick="window.location='payment'">
            <div class="tile-body">
               <i class="icon-dollar"></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Penggajian
               </div>
               <div class="number">
                  <!-- (P) -->
               </div>
            </div>
         </div>
         <div class="tile bg-blue" onclick="window.location='debt'">
            <div class="tile-body">
               <i class="icon-bar-chart"></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Kasbon
               </div>
               <div class="number">
                  <!-- (K) -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

