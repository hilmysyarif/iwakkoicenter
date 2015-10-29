<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Detail Mutasi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Mutasi</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Detail Mutasi</a></li>
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
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div id="add_produk" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Detail Mutasi</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Kode Mutasi</span>
                            <span id="reference_no" class="pull-right"><?php echo $reference['code']; ?></span>
                            <span style="display:none" id="urut" class="pull-right"><?php echo $reference['order']; ?></span>
                            <span style="display:none" id="operator" class="pull-right"><?php echo 'bambang'; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-truck"></i>&nbsp;&nbsp;&nbsp;Kode Outlet</span>
                            <span id="outlet_code" class="pull-right"><?php $config = $this->config->item('astro'); echo $config['bas_code_dept']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"><?php echo tanggalIndo(date('Y-m-d')); ?></span>
                            <span id="date" class="pull-right" style="display:none"><?php echo date('Y-m-d'); ?></span>
                        </div>
                    </div>
                    <br/>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Product Code</th>
                                <th width="75px">Qty</th>
                                <th>Room Number</th>
                                <th width="150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="daftar_tmp_mutasi">
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

<script language="javascript">

function begin(){
  daftar_layanan();
}
function daftar_layanan(){
    var url = '<?php echo base_url($this->cname); ?>/daftar_produk';
    $.ajax({
        type: "POST",
        url: url,
        data: {
          purchase_code:$('#code').html(),
          edit:'edit'
        },
        success: function(msg) {
            data = msg.split('||||');
            $('#daftar_tmp_purchase').html(data[0]);
        }
    });
    return false;
}
$(document).ready(function(){
    begin();  
});
</script>