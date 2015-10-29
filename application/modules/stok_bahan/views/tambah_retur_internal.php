<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Daftar Retur Internal
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Retur Internal</a><i class="icon-angle-right"></i></li>
            <li><a href="">Retur Internal</a></li>
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
                        Retur
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
          <!--   <div class="tile double bg-yellow pull-right" style="cursor:default">
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
                    <i><?php echo $count; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-barcode"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Pembelian Bulan
                    </div>
                    <div class="number">
                        <?php echo BulanIndo(date('n')); ?>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div id="product_form" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Transaksi Retur Internal</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Invoice</span>
                            <span id="reference_no" class="pull-right"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"></span>
                            <span id="date" style="display:none"><?php echo date('Y-m-d'); ?></span>
                            <span id="urut_faktur" style="display:none"></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Operator</span>
                            <span id="user_name" class="pull-right"><?php echo $user[0]->nama; ?></span>
                            <span id="user_id" style="display:none"><?php echo $user[0]->uname; ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <span id="flash_message"></span>
                    </div>
                    <div class="col-md-3">
                        <a class="btn green pull-right" onclick="addTransaksiButton()">
                            <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Produk
                        </a>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>HPP</th>
                                <th>Subtotal</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="list_produk">
                        </tbody>
                        <tfoot>
                        <tr>
                            <td align="center" colspan="4">TOTAL</td>
                            <td align="right"><span id="total_akhir" style="display:none"></span><span id="total_akhir_rupiah"></span></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form">
                    <div class="form-actions right">
                        <button onclick="prosesPembelian()" type="button" class="btn green"><i class="icon-ok"></i> Proses</button>
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
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data tersebut ?</span>
                <input id="id-delete" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button onclick="clear('delete')" class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-produk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Quantity Barang</h4>
            </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div id="edit_hide" class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Search</label>
                                    <input type="text" id="search" name="search" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <form id="formAdd" class="horizontal-form">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Kode Produk</label>
                                    <input type="hidden" id="ident" name="ident" class="form-control">
                                    <input type="hidden" id="produk_id" name="produk_id" class="form-control">
                                    <input type="text" id="produk_code" name="produk_code" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nama Produk</label>
                                    <input type="text" id="produk_name" name="produk_name" class="form-control" readonly>
                                    <span id="hpp" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:#eee">
                    <button onclick="clear('save')" class="btn red" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button id="submit_add" type="submit" class="btn green">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">


function clear(Object){
    if(Object=='save'){
        $('#produk_id').val('');
        $('#produk_code').val('');
        $('#produk_name').val('');
        $('#quantity').val('');
        $('#ident').val('');
        $('#search').val('');
        $('#total_akhir').html('0');
        $('#total_akhir_rupiah').html('Rp 0,00');
        $('#nota').val('');
        // $('#nota').val('');
        listProduk();
    } else if(Object=='delete'){
        $('#id-delete').val('');
    }
}


function cekTemp(){
    var operator = $('#user_id').html();
    var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/cek_temp_retur_in";
    $.ajax({
        type: "POST",
        url: url,
        data:{operator:operator},
        success: function(msg)
        {
            // alert(msg);
            if(msg==0){
                begin();
            } else {
                data = JSON.parse(msg);
                $('#reference_no').html(data.reference);
                $('#note').html(data.nota);
                $('#date_show').html(data.date_show);
                $('#branch_name').html(data.branch_name);
                $('#urut_faktur').html(data.urut);
                $('#date').html(data.date);
                $('#user_id').html(data.operator);
                $('#branch_code').html(data.branch_code);
                listProduk();
            }
        }
    });
    return false;
}
function actEdit(Object){
    var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/detail_retur_in";
    var form_data = {
        id: Object
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg)
        {
            data = JSON.parse(msg);
            $('#ident').val(data.id);
            $('#produk_id').val(data.product_id);
            $('#produk_code').val(data.product_code);
            $('#produk_name').val(data.product_name);
            $('#quantity').val(data.quantity);
            $('#search').val('');
            $('#modal-produk').modal('show');
        }
    });
    return false;
}

function actDel(Object){
    $('#id-delete').val(Object);
    $('#modal-confirm').modal('show');
}


function delData() {
    var id = $('#id-delete').val();
    var url = '<?php echo base_url($this->cname); ?>/delete_produk_retur_in';
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
                listProduk();
            }
            clear('delete');
            $('#flash_message').html(data[1]);
            setTimeout(function() {$("#flash_message").hide();}, 5000);
        }
    });
    return false;
}

function res_total(){
    var total = $('#total_akhir').html();
    var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/total_nominal";
    $.ajax({
        type: "POST",
        url: url,
        data: {total:total},
        success: function(msg)
        {
            // alert(msg);
            $('#total_retur_nominal').html(msg);
        }
    });
    return false;
}

function listProduk(){
    var reference = $('#reference_no').html();
    var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/list_produk";
    var form_data = {
        reference:reference
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg)
        {
            // alert(msg);
            data = msg.split('|');
            $("#list_produk").html(data[0]);
            $('#total_akhir').html(data[1]);
            $('#total_akhir_rupiah').html(data[4]);

            res_total();
        }
    });
    return false;
}

function addTransaksiButton(){
    clear('save');
    $('#modal-produk').modal('show');
    $('#search').focus();
}

function prosesPembelian(){
    var reference_no = $('#reference_no').html();
    var date = $('#date').html();
    var operator = $('#user_id').html();
    var urut = $('#urut_faktur').html();
    var total_akhir = $('#total_akhir').html();
    // var distributor_name = $('#distributor_name').val();
    // var distributor_phone = $('#distributor_phone').val();

    var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/proses_retur_in";
    var form_data = {
        reference: reference_no,
        date: date,
        operator: operator,
        urut: urut,
        total_akhir: total_akhir,
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg)
        {
            // alert(msg);
            data = msg.split("|");
            $("#flash_message").show();
            $("#flash_message").html(data[1]);
            $('#search-div').hide();
            $('#payment-div').hide();
            $('#selling-div').show();

            $('#total_akhir').html('0');
            $('#total_akhir_rupiah').html('Rp. 0,00');
            $('#distributor_name').html('');
            $('#distributor_phone').html('');
            $('#opt_branch').val('');
            setTimeout(function() {$("#flash_message").hide(); window.location='data';}, 1000);
        }
    });
    return false;
}
function begin(){
    var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/faktur_distribusi";
    $.ajax({
        type: "POST",
        url: url,
        success: function(msg)
        {
            // alert(msg);
            var data = JSON.parse(msg);
            $('#reference_no').html(data.faktur);
            $('#date_show').html(data.tanggal);

            $('#urut_faktur').html(data.urut_faktur);       }
    });
    
    return false;
}
$(document).ready(function(){
    cekTemp();
    // listProduk();

    $('#search').on('keyup',function(){
        var keyword = $('#search').val();
        var code = $('#supplier_code').html();
        var url = "<?php echo base_url($this->cname); ?>/mencari";
        if(keyword){
            $.ajax({
                type: "POST",
                url: url,
                data:{keyword:keyword,code:code},
                success: function(msg)
                {
                    // alert(msg);
                    if(msg!='null'){
                        data = JSON.parse(msg);
                        $('#produk_code').val(data.code);
                        $('#produk_name').val(data.name);
                        $('#produk_id').val(data.id);
                        $('#hpp').val(data.price);

                        $('#submit_add').prop('disabled',false);
                        // $('#quantity').focus();
                    }
                    else{
                        $('#produk_code').val('Produk tidak ditemukan!');
                        $('#produk_name').val('Produk tidak ditemukan!');
                        $('#quantity').val('');
                        $('#ident').val('');
                        $('#submit_add').prop('disabled',true);
                    }
                }
            });
        }
        return false;
    });

    $('#search').on('keydown',function(e){
        if(e.keyCode==13){
            e.preventDefault();
            $('#quantity').focus();
        }
    });
    $('#formAdd').submit(function(){
        var ident = $('#ident').val();
        var reference_no = $('#reference_no').html();
        var date = $('#date').html();
        var product_id = $('#produk_id').val();
        var product_code = $('#produk_code').val();
        var product_name = $('#produk_name').val();
        var quantity = $('#quantity').val();
        var operator = $('#user_id').html();
        var urut = $('#urut_faktur').html();

        var url = "<?php echo base_url(); ?>stok_bahan/retur_internal/retur_in_produk";
        var form_data = {
            ident: ident,
            reference: reference_no,
            date: date,
            product_id: product_id,
            product_code: product_code,
            product_name: product_name,
            quantity: quantity,
            operator: operator,
            urut: urut
        };
        // alert(ident);
        $('#modal-produk').modal('hide');
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg)
            {
                data = msg.split("|");
                clear('save');
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {$("#flash_message").hide();}, 5000);
            }
        });
        return false;
    });
});


</script>