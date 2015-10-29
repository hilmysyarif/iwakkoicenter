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
         <li><a href="#">Pembelian</a></li>
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
<div class="tile double" onclick="window.location='<?php echo base_url($this->cname); ?>/tambah'">
   <div class="tile-body">
   <i class="icon-shopping-cart"></i>
   </div>
   <div class="tile-object">
      <div class="name">
         Pembelian Bahan
      </div>
      <div class="number">
      </div>
   </div>
</div>
<div class="tile double" onclick="window.location='<?php echo base_url($this->module); ?>/opname'">
   <div class="tile-body">
      <i class="icon-shopping-cart"></i>
   </div>
   <div class="tile-object">
      <div class="name">
         Pembelian Produk
      </div>
      <div class="number">
      </div>
   </div>
</div>

</div>