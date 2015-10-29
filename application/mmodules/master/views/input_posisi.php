<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Tambah Posisi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Posisi</a><i class="icon-angle-right"></i></li>
            <li><a href="">Tambah Posisi</a></li>
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
                    <i class="icon-sitemap"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Posisi Terdaftar
                    </div>
                    <div class="number">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Posisi</div>
                <!-- <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div> -->
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php echo $this->session->flashdata('flash_message'); ?>
                <form id="form-add" class="horizontal-form" action="<?php echo base_url($this->cname); ?>/tambah" method="post">
                    <div class="form-body">
                        <h3 class="form-section">Informasi Posisi</h3>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label >Nama</label>
                                    <input type="hidden" id="id" name="id" value="<?php echo @$val['id']; ?>" class="form-control">
                                    <input type="text" id="group" name="group" value="<?php echo @$val['group']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label >Keterangan</label>
                                    <textarea id="information" name="information" class="form-control"><?php echo @$val['information']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <h3 class="form-section">Dapat Mengakses</h3>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="">Module</label>
                                    <div class="checkbox-list">
                                        <?php
                                        foreach ($module->result() as $key => $value) {
                                        ?>
                                        <label>
                                            <input type="checkbox" name="module[]" onchange="moduleSelect(this.id)" id="<?php echo @$value->module; ?>" value="<?php echo @$value->module; ?>" <?php echo @in_array($value->module, $module_access) ? 'checked' : ''  ?> > <?php echo $value->module; ?>
                                        </label>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="">Sub module</label>
                                    <div class="row">
                                        <?php
                                        foreach ($module_list->result() as $key => $value) {
                                        ?>
                                        <div class="<?php echo $value->module; ?> komponen checkbox-list col-md-3">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="produk[]" value="<?php echo @$value->kode; ?>" <?php echo @in_array($value->kode, $access) ? 'checked' : ''  ?> > <?php echo $value->alias; ?>
                                            </label>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($val['id'])){
                    echo form_hidden('id', $val['id']);
                    ?>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="submit" class="btn green"><i class="icon-ok"></i> Edit</button>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
                    </div>
                    <?php
                    }
                    ?>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function begin(){
var uri = "<?php echo $this->uri->segment(4); ?>";
if(uri){
$('.komponen').show();
} else {
$('.komponen').hide();
}
}
function moduleSelect(Object){
    var status = document.getElementById(Object);
    if(status.checked){
        // alertify.alert(status);  
        $('.'+Object).show();
    } else {
        // alertify.alert('unchecked'); 
        $('.'+Object).hide();
    }
    
}
$(document).ready(function(){
begin();
});
</script>