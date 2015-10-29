<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Menu Laporan Gudang
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Laporan</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>/menu_stok">Gudang</a><i class="icon-angle-right"></i></li>
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
         <div class="tile bg-blue" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_stok'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/pos.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Stok
               </div>
               <div class="number">
               </div>
            </div>
         </div>
         <!-- <div class="tile bg-red" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_data/load_pembelian'">
            <div class="tile-body">
               <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/laporan.png" /></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Laporan Data Transaksi
               </div>
               <div class="number">
               </div>
            </div>
         </div> -->
      </div>
   </div>
</div>

