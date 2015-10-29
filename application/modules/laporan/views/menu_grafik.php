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
            <li><a href="<?php echo base_url().$this->module.'/grafik'; ?>">Grafik</a></li>
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
        
        <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_top_produk'">
            <div class="tile-body">
                <i class="icon-thumbs-up"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Top Produk
                </div>
                <div class="number">
                    <!-- (T) -->
                </div>
            </div>
        </div>
        
        <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_low_produk'">
            <div class="tile-body">
                <i class="icon-thumbs-down"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Low Produk
                </div>
                <div class="number">
                    <!-- (O) -->
                </div>
            </div>
        </div>
        <div class="tile" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_omset'">
            <div class="tile-body">
                <i class="icon-money"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Omset
                </div>
                <div class="number">
                </div>
            </div>
        </div>
        
    </div>
</div>