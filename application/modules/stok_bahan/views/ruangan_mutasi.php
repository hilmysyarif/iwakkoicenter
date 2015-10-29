<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Mutasi Toko Ke stok_bahan
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Mutasi</a><i class="icon-angle-right"></i></li>
            <li><a href="">Toko Ke stok_bahan</a></li>
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
            <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/ruangan'">
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Transaksi Mutasi</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Kode Mutasi</span>
                            <span id="reference_no" class="pull-right"><?php echo $reference['code']; ?></span>
                            <span style="display:none" id="urut" class="pull-right"><?php echo $reference['order']; ?></span>
                            <span style="display:none" id="operator" class="pull-right"><?php $operator = $this->session->userdata('astrosession'); echo $operator[0]->uname; ?></span>
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-lg green pull-right" onclick="actTambah()" style="margin-right:5px">
                            <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Produk
                        </a>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Rak Tujuan</th>
                                <th>Rak Asal</th>
                                <th>Jumlah</th>
                                <th width="150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="daftar_tmp_mutasi">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form" name="disc_form" id="disc_form">
                    <div class="form-actions right">
                        <button onclick="save()" type="button" class="btn blue"><i class="icon-ok"></i> Save</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Konfirmasi Hapus Data</h4>
            </div>
            <div class="modal-body">
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data produk tersebut ?</span>
                <input id="id-delete" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Tambah Produk</h4>
            </div>
            <form id="form-add" class="horizontal-form">
            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Rak Tujuan</label>
                                <select id="rak_code" name="rak_code" class="form-control select2me">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Produk</label>
                                <select id="product_code" name="product_code" class="form-control select2me">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Quantity</label>
                                <input type="text" id="quantity" name="quantity" class="form-control">
                                <input type="hidden" id="id" name="id" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn blue" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button type="submit" class="btn green">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script language="javascript">
function begin(){
    optRoom();
    // optProduct();
    daftar_mutasi();
}
function actTambah(){
    clear('save');
    $('#modal-add').modal('show');
}
function optRoom(){
    var url = '<?php echo base_url($this->cname); ?>/opt_room';
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function(msg) {
            $('#rak_code').html(msg);
        }
    });
    return false;
}
function optProduct(Object){
    var url = '<?php echo base_url($this->cname); ?>/opt_product_ruangan';
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function(msg) {
            // alert(msg);
            $('#product_code').html(msg);
            $('#product_code').val('');
            $('#product_code').select2().trigger('change ');
            if(Object){
                $('#product_code').val(data.product_code);
                $('#product_code').select2().trigger('change ');
            }
        }
    });
    return false;
}
function daftar_mutasi(){
    var url = '<?php echo base_url($this->cname); ?>/daftar_mutasi';
    $.ajax({
        type: "POST",
        url: url,
        data: {operator:$('#operator').html() , status : 'ruang'},
        success: function(msg) {
            $('#daftar_tmp_mutasi').html(msg);
        }
    });
    return false;
}
function actEdit(Object){
    var url = '<?php echo base_url($this->cname); ?>/ambil_data_mutasi';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: Object
        },
        success: function(msg) {
            data = JSON.parse(msg);
            $('#id').val(data.id);
            $('#rak_code').val(data.gudang_code);
            optProduct(msg);
            // selectProduct(data.product_code);
            $('#rak_code').select2().trigger('change ');
            $('#quantity').val(data.quantity);
            $('#modal-add').modal('show');
        }
    });
    return false;
}
function actDelete(Object){
    $('#id-delete').val(Object);
    $('#modal-confirm').modal('show');
}
function delData() {
    var id = $('#id-delete').val();
    var url = '<?php echo base_url($this->cname); ?>/hapus_data_mutasi';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id
        },
        success: function(msg) {
            $('#modal-confirm').modal('hide');
            // alert(id);
            data = msg.split('|');
            if (data[0] == 1) {
                daftar_mutasi();
            }
            clear('delete');
            $('#flash_message').html(data[1]);
            setTimeout(function() {
                window.location.reload();
            }, 3000);
        }
    });
    return false;
}
function clear(Object){
    if(Object=='save'){
        $('#product_code').val('');
        $('#product_code').select2().trigger('change');
        $('#quantity').val('');
        $('#id').val('');
        $('#rak_code').val('');
        $('#rak_code').select2().trigger('change');
    } else if(Object=='delete'){
        $('#id-delete').val('');
    }
}
function save(){
    var url = '<?php echo base_url($this->cname); ?>/simpan_mutasi_ruangan';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            reference:$('#reference_no').html()
        },
        success: function(msg) {
            // data = msg.split('|');
            $('#flash_message').html(msg);
            setTimeout(function(){window.location.reload();},3000);
        }
    });
    return false;
}
$(document).ready(function(){
    begin();
    $('#rak_code').on('change',function(){
        optProduct();
    });
    $('#form-add').submit(function(){
        var form_data = $('#form-add').serializeArray();
        form_data.push({name:"reference",value:$('#reference_no').html()});   
        form_data.push({name:"date",value:$('#date').html()});             
        form_data.push({name:"urut",value:$('#urut').html()});
        form_data.push({name:"operator",value:$('#operator').html()});
        $.ajax({
            type: "POST",
            url: "<?php echo base_url($this->cname); ?>/mutasi_ruangan",
            data: form_data,
            success: function(msg)
            {      
                $('#modal-add').modal('hide');
                data = msg.split('|');
                if(data[0]==1){
                    daftar_mutasi();
                }
                clear('save');
                $('#flash_message').html(data[1]);
                setTimeout(function(){$('#flash_message').html('');},3000);
            }
        });
        return false;
    });
});
</script>