<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Validasi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url().$this->module;?>">Validasi</a></li>
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
    <div class="tile double bg-green" onclick="window.location='<?php echo base_url($this->module); ?>/accounting'">
        <div class="tile-body">
            <i class="icon-book"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Validasi Keuangan
            </div>
            <div class="number">
                <!-- (A) -->
            </div>
        </div>
    </div>
    <div class="tile double bg-purple" onclick="window.location='<?php echo base_url($this->module); ?>/kasir'">
        <div class="tile-body">
            <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/pos.png" /></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Validasi Kasir
            </div>
            <div class="number">
                <!-- (K) -->
            </div>
        </div>
    </div>
    <div class="tile double bg-yellow" onclick="window.location='<?php echo base_url($this->module); ?>/opname'">
        <div class="tile-body">
            <i class="icon-stackexchange"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Validasi Opname
            </div>
            <div class="number">
                <!-- (K) -->
            </div>
        </div>
    </div>
</div>