<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Minimum Stok
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_produk</a><i class="icon-angle-right"></i></li>
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
                <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Minimum Stok</div>
            </div>
            <div class="portlet-body" id="panel_stock">
                <div class="table-responsive">
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Nama Rak</th>
                                <th>Jumlah Sekarang</th>
                                <th>Jumlah Minimal</th>
                            </tr>
                        </thead>
                        <tbody id="daftar_list_stock">
                            <!-- <option>Semua</option> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        list_stock();
    });

    function list_stock(){
        var url = "<?php echo base_url($this->cname);?>/table_stock_minimum";
        $.ajax({
            type: "POST",
            url: url,
            success: function(msg) {
                // alert(msg);
                $('#print').show();
                $('#panel_stock').show();
                $('#daftar_list_stock').html(msg);
            }
        });
    }
</script>


