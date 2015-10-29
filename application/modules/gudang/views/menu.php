<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Gudang
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url(); ?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="#">Gudang</a></li>
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
<!--
<div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/pembelian'">
   <div class="tile-body">
      <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/pembellian.png" /></i>
   </div>
   <div class="tile-object">
      <div class="name">
         Pembelian
      </div>
      <div class="number">
    
      </div>
   </div>
</div>
-->
   <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/spoil'">
      <div class="tile-body">
         <i class="icon-trash"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Spoil Stok
         </div>
         <div class="number">
         </div>
      </div>
   </div>
   <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/opname'">
      <div class="tile-body">
         <i class="icon-stackexchange"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Stok Opname
         </div>
         <div class="number">
         </div>
      </div>
   </div>
   <!-- <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->module); ?>/retur_internal'">
      <div class="tile-body">
         <i class="icon-truck"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Retur Internal
         </div>
         <div class="number">
         </div>
      </div>
   </div> -->
  <!-- <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/retur'">
      <div class="tile-body">
         <i class="icon-truck"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Retur Supplier
         </div>
         <div class="number">
         </div>
      </div>
   </div>
   -->
   <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/stock/load_stok'">
      <div class="tile-body">
         <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/stock gudang.png" /></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Total Stock
         </div>
         <div class="number">
         </div>
      </div>
   </div>
    <!--
     <div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/stock/load_min_stok'">
      <div class="tile-body">
         <i class="icon-check"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Minimum Stock
         </div>
         <div class="number">
         </div>
      </div>
   </div>
  
    <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->module); ?>/stock_cabang/load_stok'">
      <div class="tile-body">
         <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/stock gudang.png" /></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Total Stock Cabang
         </div>
         <div class="number">
         </div>
      </div>
   </div>
    <div class="tile double bg-blue" onclick="window.location='<?php echo base_url($this->module); ?>/stock_cabang/load_min_stok'">
      <div class="tile-body">
         <i class="icon-check"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Minimum Stock Cabang
         </div>
         <div class="number">
         </div>
      </div>
   </div>
   <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->module); ?>/distribusi'">
      <div class="tile-body">
         <i class="icon-comments-alt"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Bahan Khusus
         </div>
         <div class="number">
         </div>
      </div>
   </div> -->
</div>