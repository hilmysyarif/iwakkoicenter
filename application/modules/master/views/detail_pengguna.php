<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Detail Pengguna
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Pengguna</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Detail Pengguna</a></li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:none;height:155px">
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
                    <i class="icon-user"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Pengguna Terdaftar
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
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Detail Pengguna</div>
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
                            <label class="control-label col-md-3">Username:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->uname; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Password:</label>
                            <div class="col-md-9">
                                <p class="form-control-static">Classified</p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->nama; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. KTP:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->no_ktp; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo tanggalIndo(@$karyawan->tgl_lahir); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Compliment:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php if(@$karyawan->compliment==1) {echo 'Berhak';} else {echo 'Tidak Berhak';}  ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Posisi:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->jabatan; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->status == 1 ? 'aktif':'non-aktif'; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="form-section">Contact</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->alamat; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Telephone:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->telp; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">E-mail:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo @$karyawan->email; ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
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
        window.location="<?php echo base_url($this->cname).'/tambah/'.$karyawan->id; ?>";
    }

</script>