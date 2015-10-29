<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Total Stok di Cabang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_produk</a><i class="icon-angle-right"></i></li>
            <li><a href="">Data Stok Cabang</a></li>
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
                <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Stok</div>
            </div>
            <div class="portlet-body form">
                <span id="flash_message"></span>
                <form id="form_gaji" class="horizontal-form" method="POST" action="<?php echo base_url($this->cname); ?>/pdf_setock" target="_blank">
                    <div class="form-body">
                        <h3 class="form-section">Data Daftar Stok Cabang</h3>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Cabang</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="dept" id="dept" class="select2me form-control">
                                        <option value="">Semua</option>
                                        <?php foreach ($cabang as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->dept;?>"><?php echo $value->dept;?></option>
                                       <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Rak</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="rak" id="rak" class="select2me form-control">
                                        <option value="">Semua</option>
                                        <?php foreach ($rak as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->rak_code;?>"><?php echo $value->rak_name;?></option>
                                       <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="produk" id="produk" class="form-control select2me">
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn green" onclick="list_stock()"><i class="icon-ok"></i> Tampilkan</button>
                        <button type="button" class="btn blue" onclick="sync_stock()"><i class="icon-ok"></i> Sync Stok</button>
                    </div>
                </form>
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
                                <th>Jumlah</th>
                                <th>Cabang</th>
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
    $('#print').hide();
    $('#panel_stock').hide();
    $('#ruang_opt').hide();
    
    // $('#rak').on('change',function(){
            var posisi = $('#rak').val();
       
            var rak = $('#rak').val();
            var url = "<?php echo base_url($this->cname); ?>/produk";
            $.ajax({
                type: "POST",
                url: url,
                data: {rak:rak},
                success: function(msg) {
                    // alert(msg);
                    $('#produk').html(msg);
                    // $('#ruang_opt').show();
                }
            });
        
    // });

    $('#ruang').on('change',function(){
        var pos = $('#posisi').val();
        var ruang = $('#ruang').val();
        var url = "<?php echo base_url($this->cname);?>/produk";
        $.ajax({
            type: "POST",
            url: url,
            data: {posisi:pos,ruang:ruang},
            success: function(msg) {
                // alert(msg);
                $('#name').html(msg);
                $('#name').select2().trigger();
            }
        });
    });

    function list_stock(){
        var rak = $('#rak').val();
        var produk = $('#produk').val();
        var dept = $('#dept').val();
        //var produk = $('#name').val();
        var url = "<?php echo base_url($this->cname);?>/table_stock";
        $.ajax({
            type: "POST",
            url: url,
            data: {rak:rak,produk:produk,dept:dept},
            success: function(msg) {
                // alert(msg);
                $('#print').show();
                $('#panel_stock').show();
                $('#daftar_list_stock').html(msg);
            }
        });
    }

    function sync_stock(){
        var query;
        var success;
        var table = "atombizz_warehouses_stok";
        var url = "http://mochi.cloud-astro.com/get.php";
        var where = "AND cabang != 'pusat'";
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


