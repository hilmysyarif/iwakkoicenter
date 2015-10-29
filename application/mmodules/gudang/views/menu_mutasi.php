<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Menu Mutasi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->module); ?>">Gudang</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="">Menu Mutasi</a></li>
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
    <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/gudang'">
        <div class="tile-body">
            <i class="icon-retweet"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Gudang ke Toko
            </div>
            <div class="number">
                <!-- (G) -->
            </div>
        </div>
    </div>
    <div class="tile double bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/toko'">
        <div class="tile-body">
            <i class="icon-retweet"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Toko Ke Gudang
            </div>
            <div class="number">
                <!-- (R) -->
            </div>
        </div>
    </div>
</div>