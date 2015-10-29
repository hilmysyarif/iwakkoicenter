<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Detail Karyawan
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Karyawan</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Detail Karyawan</a></li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:#ffffff; height:155px">
            <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/tambah'">
                <div class="tile-body">
                    <i class="icon-plus-sign"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Tambah
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/data'">
                <div class="tile-body">
                    <i class="icon-list"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Daftar
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
            <div class="tile double bg-yellow pull-right" style="cursor:default">
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
                    <i><?php echo $count; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-group"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Karyawan Terdaftar
                    </div>
                    <div class="number">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Detail Karyawan</div>
        <!-- <div class="actions">
            <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
            <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
        </div> -->
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal" role="form">
            <div class="form-body">
                <h3 class="form-section">Account</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->name; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Registered:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo tanggalIndo(@$paramedik->registered); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->jabatan; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->code; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. KTP:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->identification_number; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo tanggalIndo(@$paramedik->born_date); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. Telp.:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->phone; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->email; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$paramedik->address; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <h3 class="form-section">Gaji</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Gaji Pokok:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo format_rupiah(@$paramedik->gaji); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Bonus:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo format_rupiah(@$paramedik->bonus); ?></p>
                            </div>
                        </div>
                    </div> -->
                    <!--/span-->
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-offset-3 col-md-9">
                            <button onclick="actEdit()" type="button" class="btn green"><i class="icon-pencil"></i> Edit</button>
                            <button onclick="actCancel()" type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>

<script type="text/javascript">
   
    function actCancel()
    {
        window.location="<?php echo base_url($this->cname).'/data'; ?>";
    }

    function actEdit()
    {
        window.location="<?php echo base_url($this->cname).'/tambah/'.$paramedik->id; ?>";
    }

</script>