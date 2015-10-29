<?php 
   $user = $this->session->userdata('astrosession');
   $module = json_decode($user[0]->module);
   // print_r($module);exit;
?>
<div class="page-sidebar navbar-collapse collapse" >
   <!-- BEGIN SIDEBAR MENU -->        
   <ul class="page-sidebar-menu">
      <li>
         <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
         <div class="sidebar-toggler hidden-phone"></div>
         <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
      </li>
      <br>
      <li style="margin:0px 10px 0px 10px">
         <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
         <img src="<?php echo base_url(); ?>public/img/logo-iwakkoi.jpg" alt="logo" class="img-responsive">
         <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
      </li>
      <br/>
      <li class="<?php echo @$sidebar_active=='dashboard'?'start active':''; ?>">
         <a href="<?php echo base_url().'dashboard';?>">
         <i class="icon-home"></i> 
         <span class="title">Dashboard</span>
         <span class="selected"></span>
         </a>
      </li>
      <?php if(in_array('master', $module)){ ?>
      <li class="<?php echo @$sidebar_active=='master'?'start active':''; ?>">
         <a href="<?php echo base_url().'master/menu_master';?>">
         <i class="icon-hdd"></i> 
         <span class="title">Master Data</span>
         </a>
      </li>
       <?php } if(in_array('kasir', $module)){ ?>
      <li class="<?php echo @$sidebar_active=='kasir'?'start active':''; ?>">
         <a href="<?php echo base_url().'kasir';?>">
         <i class="icon-shopping-cart"></i> 
         <span class="title">Kasir</span>
         </a>
      </li>
       <?php }?>
      <li class="<?php echo @$sidebar_active=='pembelian'?'start active':''; ?>">
         <a href="<?php echo base_url().'gudang/pembelian';?>">
         <i class="icon-shopping-cart"></i> 
         <span class="title">Pembelian</span>
         </a>
      </li>
      <li class="<?php echo @$sidebar_active=='stok_bahan'?'start active':''; ?>">
         <a href="<?php echo base_url().'stok_bahan';?>">
         <i class="icon-list"></i> 
         <span class="title">Stok Bahan</span>
         </a>
      </li>
      <li class="<?php echo @$sidebar_active=='stok_produk'?'start active':''; ?>">
         <a href="<?php echo base_url().'stok_produk';?>">
         <i class="icon-list"></i> 
         <span class="title">Stok Produk</span>
         </a>
      </li>
      <li class="<?php echo @$sidebar_active=='produksi'?'start active':''; ?>">
         <a href="<?php echo base_url().'master/produksi';?>">
         <i class="icon-archive"></i> 
         <span class="title">Produksi</span>
         </a>
      </li>
      <?php  if(in_array('finance', $module)){ ?>
      <li class="<?php echo @$sidebar_active=='keuangan'?'start active':''; ?>">
         <a href="<?php echo base_url(); ?>finance">
         <i class="icon-money"></i> 
         <span class="title">Keuangan</span>
         </a>
      </li>
      <?php } if(in_array('laporan', $module)){ ?>
      <li class="<?php echo @$sidebar_active=='laporan'?'start active':''; ?>">
         <a href="<?php echo base_url().'laporan';?>">
         <i class="icon-copy"></i> 
         <span class="title">Laporan</span>
         </a>
      </li>
      <?php } if(in_array('config', $module)){ ?>
      <li class="<?php echo @$sidebar_active=='config'?'start active':''; ?>">
         <a href="<?php echo base_url().'config';?>">
         <i class="icon-cog"></i> 
         <span class="title">Pengaturan</span>
         </a>
      </li>
      <?php  }  ?>
      <li class="<?php echo @$sidebar_active=='support'?'start active':''; ?>">
         <a href="<?php echo base_url().'support';?>">
         <i class="icon-wrench"></i> 
         <span class="title">Tech. Support</span>
         </a>
      </li>
   </ul>
   <!-- END SIDEBAR MENU -->
</div>