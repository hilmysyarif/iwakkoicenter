<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Stok Datang dari Gudang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
            <li><a href="">Data</a></li>
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
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Stok Datang</div>                
                <div class="btn-group pull-right" id="back-btn">
                    <a onclick="list_stock()" data-toggle="tooltip" title="Personal" class="btn green btn-xs btn-default"><i class="icon-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="portlet-body" id="panel_stock">
                <div class="table-responsive">
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        sync_stock();
        list_stock();
    });

    function actTerima(Object){
        var url = "<?php echo base_url($this->cname);?>/distribusi";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id : Object
            },
            success: function(msg) {
                if (msg > 0) {
                    alert('Berhasil mencatat penerimaan stok.');
                    list_stock();
                } else {
                    alert('Gagal mencatat penerimaan stok.');
                    list_stock();
                }
            }
        });
    }

    function actDetail(Object){
        var url = "<?php echo base_url($this->cname);?>/table_stock_detail";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                reference : Object
            },
            success: function(msg) {
                // alert(msg);
                $('#print').show();
                $('#panel_stock').show();
                $('#back-btn').show();
                $('#example_datatable').html(msg);
            }
        });
    }

    function list_stock(){
        var url = "<?php echo base_url($this->cname);?>/table_stock_datang";
        $.ajax({
            type: "POST",
            url: url,
            success: function(msg) {
                // alert(msg);
                $('#print').show();
                $('#panel_stock').show();
                $('#back-btn').hide();
                $('#example_datatable').html(msg);
            }
        });
    }

    function sync_stock(){
        var query;
        var success;
        var table = "atombizz_warehouses_stok";
        var url = "http://mochi.cloud-astro.com/get.php";
        var where = "AND cabang = 'pusat'";
        $.ajax({
            async: false,
            type: "POST",
            url: url,
            data: {table:table,where:where},
            success: function(msg) {
                query = msg;
            }
        });
        var url = "<?php echo base_url($this->cname);?>/sync";
        $.ajax({
            async: false,
            type: "POST",
            url: url,
            data: {query:query},
            success: function(msg) {
                success = msg;
                if (msg != '0') {
                    alert('success');
                } else {
                    alert('up to date');
                }
            }
        });
        if (success) {
            var url = "http://mochi.cloud-astro.com/update.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {data:success},
                success: function(msg) {
                    
                }
            });
        }
    }
</script>


