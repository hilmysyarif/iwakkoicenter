<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Daftar Retur Konsumen
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Resepsionis</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Retur Konsumen</a><i class="icon-angle-right"></i></li>
            <li><a href="">Retur Konsumen</a></li>
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
                    <i><?php //echo $count; ?></i>
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
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Transaksi Retur Pelanggan</div>
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
                            <span id="date" style="display:none"></span>
                            <span id="urut_faktur" style="display:none"></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Cashdraw</span>
                            <span id="note" class="pull-right"></span>
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
                    <table id="general-table" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th width="75px">Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="list_produk">

                        </tbody>
                       <!--  <tfoot>
                        <tr>
                            <td align="center" colspan="6">TOTAL</td>
                            <td align="right"><span id="total" style="display:none"></span><span id="total_rupiah"></span></td>
                        </tr>
                        </tfoot> -->
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form" name="disc_form" id="disc_form">
                    <div class="form-actions right">
                        <button onclick="paymentButton()" type="button" class="btn green"><i class="icon-ok"></i> Proses</button>
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
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data paket layanan tersebut ?</span>
                <input id="id-delete" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button onclick="clear('delete')" class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
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
                <h4 class="modal-title" style="color:#fff;">Retur dari Customer</h4>
            </div>
            <form id="form-add" class="horizontal-form">
                <div class="modal-body">
                    <div class="form-body">
                        <div id="edit_hide" class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nota</label>
                                    <input id="nota" name="nota" class="form-control" placeholder="Nota" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                    <input id="input_tanggal" name="input_tanggal" class="form-control text-center" value="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" placeholder="Tanggal" readonly>
                                    <input id="user" type="hidden" value="<?php echo $user[0]->uname; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:#eee">
                    <button onclick="clear('save')" class="btn red" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button id="get_faktur" type="submit" class="btn green">Tambahkan</button>
                </div>
            </form>
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
                                    <input type="text" id="product_code" name="product_code" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nama Produk</label>
                                    <input type="text" id="product_name" name="product_name" class="form-control" readonly>
                                    <span id="hpp" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Quantity (satuan terkecil)</label>
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
        $('#product_id').val('');
        $('#product_code').val('');
        $('#product_name').val('');
        $('#quantity').val('');
        $('#ident').val('');
        $('#search').val('');
        $('#nota').val('');
        listProduk();
    } else if(Object=='delete'){
        $('#id-delete').val('');
    }
}

function cekTemp(){
    var operator = $('#user_id').html();
    var url = "<?php echo base_url($this->cname); ?>/cek_temp_retur_in";
    $.ajax({
        type: "POST",
        url: url,
        data:{operator:operator},
        success: function(msg)
        {
            if(msg==0){
                begin();
            } else {
                data = JSON.parse(msg);
                $('#reference_no').html(data.reference);
                $('#note').html(data.nota);
                $('#date_show').html(data.date_show);
                $('#date').html(data.date);
                $('#user_id').html(data.operator);
                listProduk();
            }
        }
    });
    return false;
}
function addTransaksiButton(){
    clear('save');
    $('#modal-produk').modal('show');
    $('#search').focus();
}
function actEdit(Object){
    var url = "<?php echo base_url($this->cname); ?>/detail_retur_in";
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
            $('#product_id').val(data.product_id);
            $('#product_code').val(data.product_code);
            $('#product_name').val(data.product_name);
            $('#quantity').val(data.quantity);
            $('#modal-produk').modal('show');
            $('#submit_add').prop('disabled',false);
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
            setTimeout(function() {
                window.location.reload();
            }, 3000);
        }
    });
    return false;
}

function listProduk(){
    var reference = $('#reference_no').html();
    var url = "<?php echo base_url($this->cname); ?>/list_produk";
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
            
            $("#list_produk").html(msg);
            $('#modal-add').modal('hide');
            
            
        }
    });
    return false;
}

function paymentButton(){
    var reference = $('#reference_no').html();
    var urut = $('#urut_faktur').html();
    var date = $('#date').html();
    var operator = $('#user_id').html();
    var nota = $('#note').html();

    var url = "<?php echo base_url($this->cname); ?>/proses";
    $.ajax({
            type: "POST",
            url: url,
            data:{
                reference:reference,
                date:date,
                urut:urut,
                operator:operator,
                nota:nota
            },
            success: function(msg)
            {
                $("#flash_message").show();
                $("#flash_message").html(msg);
                setTimeout(function() {window.location.reload();}, 3000);
            }
        });
    return false;
}
function begin(){
    $('#modal-add').modal('show');
}
$(document).ready(function(){
    cekTemp();
    $('#modal-add').modal({backdrop: 'static', keyboard: false});
    $('#get_faktur').on('click',function(){
        var nota = $('#nota').val();
        var date = $('#input_tanggal').val();
        var user = $('#user').val();

        var url = "<?php echo base_url($this->cname); ?>/faktur_retur_in";
        $.ajax({
            type: "POST",
            url: url,
            data:{nota:nota,date:date,user:user},
            success: function(msg)
            {
                // alert(msg);
                var data = JSON.parse(msg);
                if(data.kd_status==1){
                    $('#reference_no').html(data.faktur);
                    $('#date_show').html(data.tanggal);
                    $('#urut_faktur').html(data.urut_faktur);
                    $('#date').html(date);
                    $('#note').html(nota);
                    $('#modal-add').modal('hide');
                } else {
                    $('#modal-add').modal('hide');
                    $("#flash_message").show();
                    $("#flash_message").html(data.keterangan);
                    $("#nota").val('');
                    setTimeout(function() {location.reload()}, 1500);
                    // begin();
                }
            }
        });
        return false;
    });

    $('#search').on('keyup',function(){
        var keyword = $('#search').val();
        var nota = $('#note').html();
        var url = "<?php echo base_url($this->cname); ?>/mencari";
        if(keyword){
            $.ajax({
                type: "POST",
                url: url,
                data:{keyword:keyword,nota:nota},
                success: function(msg)
                {
                    // alert(msg);
                    if(msg!='null'){
                        data = JSON.parse(msg);
                        $('#product_code').val(data.product_code);
                        $('#product_name').val(data.product_name);
                        $('#hpp').val(data.hpp);

                        $('#submit_add').prop('disabled',false);
                        // $('#quantity').focus();
                    }
                    else{
                        $('#product_code').val('Produk tidak ditemukan!');
                        $('#product_name').val('Produk tidak ditemukan!');
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
        var nota = $('#note').html();
        var reference_no = $('#reference_no').html();
        var date = $('#date').html();
        var product_code = $('#product_code').val();
        var product_name = $('#product_name').val();
        var quantity = $('#quantity').val();
        var operator = $('#user_id').html();
        var urut = $('#urut_faktur').html();
        var hpp = $('#hpp').val();


        var url = "<?php echo base_url($this->cname); ?>/retur_in_produk";
        var form_data = {
            ident: ident,
            reference: reference_no,
            nota: nota,
            date: date,
            product_code: product_code,
            product_name: product_name,
            quantity: quantity,
            operator: operator,
            urut: urut,
            hpp: hpp
        };
        // alert(ident);
        $('#modal-produk').modal('hide');
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg)
            {
                // alert(msg);
                data = msg.split("|");
                clear('save');
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {$("#flash_message").hide();}, 5000);
            }
        });
        return false;
    });

    function back(){
        window.location='<?php echo base_url($this->module); ?>';
    }
});
</script>