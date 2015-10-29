<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Menu Laporan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Laporan</a><i class="icon-angle-right"></i></li>
         <li><a href="">Menu Laporan</a></li>
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
      <div class="tiles">
         <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_omset'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/pos.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Omset
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_penjualan'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/laporan.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Lap. Penjualan
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/menu_stok'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/notif order.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Gudang
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         <!-- <div class="tile bg-purple" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_piutang'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/retur out.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Piutang
               </div>
               <div class="number">
               </div>
            </div>
         </div> -->
         <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_hutang'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/retur out.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Hutang
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_rl'">
            <div class="tile-body">
               <i class="icon-user"></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Laba/Rugi
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         <!--
         <div class="tile bg-green" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_debet'">
            <div class="tile-body">
               <i class="icon-credit-card"></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Debet
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         
         <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_compliment'">
            <div class="tile-body">
               <i class="icon-group"></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Compliment
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         -->
      </div>
   </div>
</div>

