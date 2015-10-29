<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Pendaftaran
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->module);?>">Resepsionis</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->cname);?>">Pelanggan</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="">Pendaftaran Pelanggan</a>
            </li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:#eee; height:155px">
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
                    <i><?php echo $patient.' / '.$member; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-user"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Pelanggan Terdaftar / Member
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
        <div class="caption"><i class="icon-list"></i>&nbsp;Detail Pelanggan</div>
        <!-- <div class="actions">
            <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
            <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
        </div> -->
    </div>
    <div class="portlet-body form">
        <form class="horizontal-form" name="guest_form" id="guest_form">
            <div class="form-body">
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->name; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No. KTP :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->code; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender :</label>
                            <label class="control-label col-md-9"><?php if($pelanggan->gender == 'M') echo 'Laki-laki'; else echo 'Perempuan'; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->job; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kebangsaan :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->nationality; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Member :</label>
                            <label class="control-label col-md-9"><?php if($pelanggan->member == 'yes') echo 'Member'; else echo 'Non Member'; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="form-section">Contact</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->address; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Pos :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->postcode; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kota :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->city; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Provinsi :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->province; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">E-mail :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->email; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Telephone :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->phone; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">HP :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->mobile; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Fax :</label>
                            <label class="control-label col-md-9"><?php echo @$pelanggan->fax; ?></label>
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </div>
            <div class="form-actions right">
                <button onclick="actCancel()" type="button" class="btn default">Cancel</button>
                <button type="button" class="btn blue" onclick="actEdit()"><i class="icon-ok"></i> Edit</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
   
    function actCancel()
    {
        window.location="<?php echo base_url($this->cname).'/data'; ?>";
    }

    function actEdit()
    {
        window.location="<?php echo base_url($this->cname).'/tambah/'.$pelanggan->code; ?>";
    }

</script>