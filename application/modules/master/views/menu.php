<?php
$user = $this->session->userdata('astrosession');
$operator = $user[0]->jabatan;
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Master Data
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url($this->module);?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Master Data</a></li>
            <li class="pull-right">
                <div style="display:block; background-color:#271000 ; color:#fff; margin-right:-30px; padding:10px; top:-9px; position:relative">
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
    <div class="tile double" onclick="window.location='produk'">
        <div class="tile-body">
            <i class="icon-barcode"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Bahan
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <div class="tile double" onclick="window.location='karyawan'">
        <div class="tile-body">
            <i class="icon-group"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Karyawan
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <div class="tile double" onclick="window.location='pengguna'">
        <div class="tile-body">
            <i class="icon-user"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Pengguna
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <div class="tile double" onclick="window.location='suplier'">
        <div class="tile-body">
            <i class="icon-truck"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Supplier
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <!-- <div class="tile double bg-purple" onclick="window.location='pelanggan'">
        <div class="tile-body">
            <i class="icon-credit-card"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Pelanggan
            </div>
            <div class="number">
            </div>
        </div>
    </div> -->
    <div class="tile double" onclick="window.location='menu'">
        <div class="tile-body">
            <i class="glyphicon glyphicon-cutlery"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Produk
            </div>
            <div class="number">
            </div>
        </div>
    </div>

    <div class="tile double" onclick="window.location='rak_gudang'" >
        <div class="tile-body" >
            <i class="glyphicon" style="background:url('<?php echo base_url();?>public/img/icon/rak.png') no-repeat center;">&nbsp;</i>
        </div>
        <div class="tile-object">
            <div class="name">
                Rak
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <!-- <div class="tile double bg-green" onclick="window.location='meja'">
        <div class="tile-body">
            <img style="margin-top:0px; margin-left:75px; height:80px; width:auto;" src="<?php echo base_url('assets/image/kosong.png');?>" >
        </div>
        <div class="tile-object">
            <div class="name">
                Meja
            </div>
            <div class="number">
            </div>
        </div>
    </div> -->
   

   <!-- 
   
   <?php if($operator=='Administrator' || $operator=='Superuser'){ ?>
    <div class="tile double bg-green" onclick="window.location='posisi'">
        <div class="tile-body">
            <i class="icon-sitemap"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Posisi
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <?php } ?>

    -->


<div class="tile double" onclick="window.location='brand'">
    <div class="tile-body">
        <i class="icon-refresh"></i>
    </div>
    <div class="tile-object">
        <div class="name">
            Konversi Stok
        </div>
        <div class="number">
        </div>
    </div>
</div>
</div>