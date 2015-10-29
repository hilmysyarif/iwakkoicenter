<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Kasir <small>Menu awal</small>
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li class="btn-group">
            <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            <span>Actions</span> <i class="icon-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
               <li><a href="<?php echo base_url().'kasir/cashdraw/tutup_kasir' ?>">Tutup Kasir</a></li>
            </ul>
         </li>
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url().'kasir' ?>">Kasir</a>
         </li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="tiles">
   <a href="<?php echo base_url().'kasir/meja' ?>" class="tile double bg-green">
      <div class="tile-body">
         <i class="icon-signin"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Dine in
         </div>
         <div class="number">
            D
         </div>
      </div>
   </a>
   <a href="<?php echo base_url().'kasir/pesan/Take-away'; ?>" class="tile double bg-blue">
      <div class="tile-body">
         <i class="icon-signout"></i>
      </div>
      <div class="tile-object">
         <div class="name">
            Take away
         </div>
         <div class="number">
            T
         </div>
      </div>
   </a>
</div>
<!-- END PAGE CONTENT-->