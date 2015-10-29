<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Menu Resepsionis
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url($this->module);?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="#">Menu Resepsionis</a></li>
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
   <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->module).'/pos/reguler';?>'">
      <div class="tile-body">
         <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/kasir.png" /></i>
      </div>
      <div class="tile-object">
         <div class="name">
            POS (Penjualan)
         </div>
         <div class="number">
            <!-- (H) -->
         </div>
      </div>
   </div>
   <div class="tile double bg-blue" onclick="window.location='<?php echo base_url($this->module).'/pengiriman';?>'">
      <div class="tile-body">
         <i class="icon-truck"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Jadwal Pengiriman
         </div>
         <div class="number">
            <!-- (H) -->
         </div>
      </div>
   </div>
   <!-- <div class="tile double bg-red" onclick="window.location='<?php echo base_url($this->module); ?>/kas'">
      <div class="tile-body">
         <i class="icon-user"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Buka / Tutup Kasir
         </div>
         <div class="number">
         </div>
      </div>
   </div>
   <div class="tile double bg-blue" onclick="window.location='<?php echo base_url($this->module); ?>/retur'">
      <div class="tile-body">
         <i class="icon-truck"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Retur Konsumen
         </div>
         <div class="number">
         </div>
      </div> -->
   </div>
</div>