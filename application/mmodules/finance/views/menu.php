<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Keuangan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url($this->module);?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="#">Keuangan</a></li>
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
   <div class="tile double bg-blue" onclick="window.location='accounting'">
      <div class="tile-body">
         <i class="icon-bar-chart"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Transaksional
         </div>
         <div class="number">
            <!-- (A) -->
         </div>
      </div>
   </div>
   <!-- <div class="tile double bg-green" onclick="window.location='hutang'">
      <div class="tile-body">
         <i class="icon-dropbox"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Hutang
         </div>
         <div class="number">
            <!-- (A)
         </div>
      </div>
   </div> --> -->
   <div class="tile double bg-yellow" onclick="window.location='kasbon'">
      <div class="tile-body">
         <i class="icon-dropbox"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Kasbon Karyawan
         </div>
         <div class="number">
            <!-- (A) -->
         </div>
      </div>
   </div>
   <div class="tile double bg-red" onclick="window.location='pendapatan'">
      <div class="tile-body">
         <i class="icon-dropbox"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Pendapatan Non Transaksi
         </div>
         <div class="number">
            <!-- (A) -->
         </div>
      </div>
   </div>   
</div>