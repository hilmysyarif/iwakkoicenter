<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Daftar Pembelian
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Pembelian</a><i class="icon-angle-right"></i></li>
            <li><a href="">Tambah Pembelian</a></li>
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
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:24px; font-family:arial; font-weight:bold">
                    <i><?php echo $count; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/pembellian.png" width="65px"/></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Pembelian Bulan
                    </div>
                    <div class="number">
                        <?php echo BulanIndo(date('n')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div id="add_produk" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Transaksi Pembelian</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;KD Pembelian</span>
                            <span id="reference_no" class="pull-right"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Supplier</span>
                            <span id="supplier_name" class="pull-right"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Referensi Nota</span>
                            <span id="nota" class="pull-right"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <span id="urut_faktur" style="display:none"></span>
                        <span id="date" style="display:none"></span>
                        <span id="user_id" style="display:none"><?php echo $user[0]->uname; ?></span>
                        <span id="supplier_code" style="display:none"></span>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Operator</span>
                            <span id="user_name" class="pull-right"><?php echo @$user[0]->nama; ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="flash_message"></span>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered table-advance table-hover">
                        <tbody>
                            <form id="formAdd">
                            <tr>
                                <td style="background-color:#39B3D7;">
                                    <select type="text" id="search" name="search" class="form-control select2me" data-placeholder="Pilih Bahan"></select>
                                </td>
                                <td width="175px" style="background-color:#39B3D7;">
                                    <select id="brand" name="brand" class="form-control select2me" data-placeholder="brand"></select>
                                </td>
                                <td width="75px" style="background-color:#39B3D7;">
                                    <input type="hidden" id="ident" name="ident" class="form-control">
                                    <input type="hidden" id="produk_code" name="produk_code" class="form-control">
                                    <input type="hidden" id="produk_name" name="produk_name" class="form-control">
                                    <input type="hidden" id="produk_id" name="produk_id" class="form-control">
                                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="qty">
                                </td>
                                <td width="125px" style="background-color:#39B3D7;">
                                    <select id="unit" name="unit" class="form-control select2me" data-placeholder="satuan"></select>
                                </td>
                                <td width="125px" style="background-color:#39B3D7;">
                                    <input type="text" id="unit_price" name="unit_price" class="form-control" placeholder="Harga per Satuan">
                                </td>
                                <td width="100px"style="background-color:#39B3D7;" >
                                    <button type="submit" class="btn btn-small btn-default"><i class="icon-plus"></i> Tambahkan</button>
                                </td>
                            </tr>
                            </form>
                        </tbody>
                    </table>
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th style="background-color:#39B3D7; color:white" class="text-center" width="50px">No.</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Nama Bahan</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Qty</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Harga Satuan</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Total</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center" width="175px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list_produk">
                        </tbody>
                        <tfoot>
                        <tr>
                            <td align="center" colspan="4">SUBTOTAL</td>
                            <td align="right"><span id="total_pembelian_currency"></span></td>
                            <span hidden id="total_pembelian"></span>
                        </tr>
                        <tr>
                            <td align="center" colspan="4">DISKON</td>
                            <td align="right"><span id="jumlah_diskon_currency"></span></td>
                            <span hidden id="jumlah_diskon"></span>
                        </tr>
                        <tr>
                            <td align="center" colspan="4">TOTAL</td>
                            <td align="right"><span id="total_pembelian_akhir_currency"></span></td>
                            <span hidden id="total_pembelian_akhir"></span>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Discount</label>
                                    <div class="input-group">
                                        <input value="" type="text" id="discount" name="discount" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                        <span class="input-group-addon">
                                            <b>%</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Discount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <b>Rp.</b>
                                        </span>
                                        <input value="" type="text" id="nominal_discount" name="nominal_discount" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Cara Pembayaran</label>
                                    <select id="cara" name="cara" class="form-control select2me input-lg" readonly>
                                            <option value="cash">Cash</option>
                                            <option value="credit">Credit</option>
                                        </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <!--/span-->
                            <div id="div-dp" style="display:none" class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Uang Muka</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <b>Rp.</b>
                                        </span>
                                        <input value="" type="text" id="dp" name="dp" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                    </div>
                                </div>
                            </div>
                            <div id="div-tanggal" style="display:none" class="col-md-3">
                                <label>Jatuh Tempo</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="icon-calendar"></i>
                                    </span>
                                    <input id="jatuh_tempo" name="jatuh_tempo" class="form-control date-picker" placeholder="Jatuh Tempo" data-date-format="yyyy-mm-dd" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button onclick="actCancel()" type="button" class="btn default">Batal</button>
                        <button onclick="prosesPembelian()" type="button" class="btn blue"><i class="icon-ok"></i> Simpan</button>
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
                <button onclick="cancel()" class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-regular" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" onclick="window.location='<?php echo base_url($this->module); ?>/pembelian'" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Transaksi Pembelian untuk Supplier</h4>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <div id="edit_hide" class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Suplier</label>
                                <?php echo form_dropdown('opt_supplier', @$opt_supplier, @$val['opt_supplier'], 'class="form-control select2me" id="opt_supplier"'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nota</label>
                                <input type="text" id="input_nota" name="input_nota" class="form-control" placeholder="Nota">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input id="input_tanggal" name="input_tanggal" class="form-control input-datepicker text-center" value="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" placeholder="Tanggal" type="text" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button onclick="cancel()" class="btn blue" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button id="pilih_supplier" type="submit" class="btn green">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script language="javascript">
function clear(Object){
    if(Object=='save'){
        $('#produk_id').val('');
        $('#produk_code').val('');
        $('#produk_name').val('');
        $('#quantity').val('');
        $('#unit_price').val('');
        $('#unit').val('');
        $('#tax').val('');
        $('#discount').val('');
        $('#satuan').val('');
        $('#rak_code').val('');
        $('#nominal_discount').val('');
        $('#search').val('');
        $('#search').select2().trigger('change');
        $('#dp').val('');
        $('#ident').val('');
        $('#jatuh_tempo').val('');
        $('#cara').val('cash');
        $('#search-div').hide();
        $('#selling-div').show();
        $('#disc_non_reg_1').val('0');
        $('#disc_non_reg_2').val('0');
        $('#total_non_reg_1').val('0');
        $('#total_non_reg_2').val('0');
        $('#total_akhir').html('0');
        listProduk();
    } else if(Object=='delete'){
        $('#id-delete').val('');
    }
}
function cekTemp(){
    var operator = $('#user_id').html();
    var url = "<?php echo base_url($this->cname); ?>/cek_temp_pembelian";
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
                $('#reference_no').html(data.reference_no);
                $('#date_show').html(data.date_show);
                $('#supplier_name').html(data.supplier_name);
                $('#nota').html(data.note);
                $('#urut_faktur').html(data.urut);
                $('#date').html(data.date);
                $('#supplier_code').html(data.supplier_code);
                listProduk();
            }
        }
    });
    return false;
}
function optFacility(){
    var url = '<?php echo base_url($this->cname); ?>/opt_produk';
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function(msg) {
            // alerts(msg);
            $('#search').html(msg);
        }
    });
    return false;
}

function addTransaksiButton(){
    clear('save');
    $('#modal-add').modal('show');
    optFacility();
    $("#search").focus();
}

function actCancel(){
    window.location = "<?php echo base_url($this->cname).'/data'; ?>";
}
function cancel(){
    $('#modal-add').modal('hide');
    $('#modal-confirm').modal('hide');
}

function actEdit(Object){
    var url = "<?php echo base_url($this->cname); ?>/detail_pembelian";
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
            $('#unit_price').val(data.unit_price);
            $('#modal-add').modal('show');
            $('#search').val(data.product_code);
            $('#search').select2().trigger('change');
            // $('#brand').val(data.brand_code);
            // $('#brand').select2().trigger('change');
            if(data.brand_code!=''){
                get_merk(data.brand_code);
            }
        }
    });
    return false;
}

function actDel(object){
  $('#modal-confirm').modal('show');
  $('#id-delete').val(object);
}

function delData(){
    var url = '<?php echo base_url($this->cname); ?>/delete_produk_pembelian';
    $.ajax({
        type: "POST",
        url: url,
        data: {id:$('#id-delete').val()},
        success: function(msg) {

            $('#modal-confirm').modal('hide');
            data = msg.split("|");
            if(data[0]==1){
                clear('save');
                listProduk();
            }
            $("#flash_message").show();
            $("#flash_message").html(data[1]);
            setTimeout(function() {$("#flash_message").hide();}, 5000);
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
            data = msg.split('|');
            $("#list_produk").html(data[0]);
            $('#total_pembelian').html(data[1]);
            $('#total_pembelian_currency').html(data[4]);
            $('#total_pembelian_akhir').html(data[1]);
            $('#total_pembelian_akhir_currency').html(data[4]);
            $('#jumlah_diskon').html('0');
            $('#jumlah_diskon_currency').html('Rp 0,00');
            if(data[2]!=''&& data[3]!=''){
                $('#supplier_code').html(data[2]);
                $('#supplier_name').html(data[3]);
                $('#modal-regular').modal('hide');
            }
            // res_total();
        }
    });
    return false;
}

function prosesPembelian(){
    var reference_no = $('#reference_no').html();
    var note = $('#nota').html();
    var supplier_code = $('#supplier_code').html();
    var supplier_name = $('#supplier_name').html();
    var date = $('#date').html();
    var operator = $('#user_id').html();

    var disc_reg_1 = $('#discount').val();
    var nom_reg_1 = $('#nominal_discount').val();
    var subtotal = $('#total_pembelian').html();
    var total = $('#total_pembelian_akhir').html();
    var urut = $('#urut_faktur').html();
    var cara = $('#cara').val();
    var dp = $('#dp').val();
    var jatuh_tempo = $('#jatuh_tempo').val();

    // alert('cikidaw');
    var url = "<?php echo base_url($this->cname); ?>/proses_pembelian";
    var form_data = {
        reference_no: reference_no,
        note: note,
        supplier_code: supplier_code,
        supplier_name: supplier_name,
        date: date,
        operator: operator,
        disc_reg_1: disc_reg_1,
        nom_reg_1: nom_reg_1,
        subtotal:subtotal,
        total:total,
        cara:cara,
        dp:dp,
        jatuh_tempo:jatuh_tempo,
        urut:urut
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg)
        {

            // alert(msg);
            data = msg.split("|");
            if(data[0]==1){
                clear('save');
            }
            listProduk();
            $("#flash_message").show();
            $("#flash_message").html(data[1]);
            setTimeout(function() {$("#flash_message").hide(); window.location.reload();}, 1000);
        }
    });
    return false;
}
function begin(){
    $('#modal-regular').modal('show');
    $('#opt_supplier').select2('open');
}

function get_satuan() {
    var url = "<?php echo base_url($this->cname) ?>/get_satuan";
    var bahan = $('#search').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {bahan:bahan},
        success: function(msg){
            if(msg){
                $('#unit').html(msg);
                $('#unit').select2().trigger('change');
            }
        }
    });
}

function get_merk(Object){
    var url = "<?php echo base_url($this->cname) ?>/get_merk";
    var bahan = $('#search').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {bahan:bahan},
        success: function(msg){
            if(msg){
                $('#brand').html(msg);
                if(Object){
                    $('#brand').val(Object);
                }
                $('#brand').select2().trigger('change');
            }
        }
    });
}

function get_satuan_brand(){
    var url = "<?php echo base_url($this->cname) ?>/get_satuan_brand";
    var bahan = $('#brand').val();
    if(bahan){
        $.ajax({
            type: 'POST',
            url: url,
            data: {bahan:bahan},
            success: function(msg){
                if(msg){
                    $('#unit').html(msg);
                    $('#unit').select2().trigger('change');
                }
            }
        });
    }
}

$(document).ready(function(){
    cekTemp();
    listProduk();
    optFacility();

    $('#modal-regular').modal({backdrop: 'static', keyboard: false})

    $('#search').on('change',function(){
        get_satuan();
        get_merk();
    });

    $('#brand').on('change',function(){
        get_satuan_brand();
    });

    $('#cara').change(function(){
        var cara = $('#cara').val();
        if (cara=='credit') {
            document.getElementById('div-dp').style.display = "block";
            document.getElementById('div-tanggal').style.display = "block";
        } else if(cara=='cash'){
            $('#dp').val('');
            $('#jatuh_tempo').val('');
            document.getElementById('div-dp').style.display = "none";
            document.getElementById('div-tanggal').style.display = "none";           
        }
    });

    $('#discount').keyup(function(){
        var disc = $('#discount').val();
        if (disc == '') {
            var disc = 0;
        }
        var total = $('#total_pembelian').html();
        var hasil = (parseFloat(disc)*parseFloat(total))/100;
        var grandtotal = parseFloat(total)-parseFloat(hasil);
        $('#jumlah_diskon').html(hasil);
        $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/rupiah",
                data:{total:$('#jumlah_diskon').html()},
                success: function(msg)
                {
                    // alert(msg);
                    $('#jumlah_diskon_currency').html(msg);
                }
            });
        $('#total_pembelian_akhir').html(grandtotal);
        $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/rupiah",
                data:{total:$('#total_pembelian_akhir').html()},
                success: function(msg)
                {
                    // alert(msg);
                    $('#total_pembelian_akhir_currency').html(msg);
                }
            });
        $('#nominal_discount').val(hasil);
    });
    $('#nominal_discount').keyup(function(){
        var disc = $('#nominal_discount').val();
        if (disc == '') {
            var disc = 0;
        }
        var total = $('#total_pembelian').html();
        var hasil = (parseFloat(disc)/parseFloat(total))*100;
        var grandtotal = parseFloat(total)-parseFloat(disc);
        $('#jumlah_diskon').html(disc);
        $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/rupiah",
                data:{total:$('#jumlah_diskon').html()},
                success: function(msg)
                {
                    // alert(msg);
                    $('#jumlah_diskon_currency').html(msg);
                }
            });

        $('#total_pembelian_akhir').html(grandtotal);

        $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/rupiah",
                data:{total:$('#total_pembelian_akhir').html()},
                success: function(msg)
                {
                    // alert(msg);
                    $('#total_pembelian_akhir_currency').html(msg);
                }
            });
        $('#discount').val(hasil);
    });
    $('#pilih_supplier').on('click',function(){
        var code = $('#opt_supplier').val();
        var date = $('#input_tanggal').val();
        var nota = $('#input_nota').val();
        var name = $('#opt_supplier option:selected').text();
        var url = "<?php echo base_url($this->cname); ?>/faktur_pembelian";
        if(code && date && nota){
            $.ajax({
                type: "POST",
                url: url,
                data:{code:code,date:date},
                success: function(msg)
                {
                    // alert(msg);
                    var data = JSON.parse(msg);
                    
                    $('#reference_no').html(data.faktur);
                    $('#urut_faktur').html(data.urut_faktur);
                    $('#date_show').html(data.tanggal);

                    $('#supplier_code').html(code);
                    $('#supplier_name').html(name);
                    $('#nota').html(nota);
                    $('#date').html(date);

                    $('#input_nota').val('');
                    $('#opt_supplier').val('');

                    $('#modal-regular').modal('hide');
                }
            });
        }
        return false;
    });
    $('#search').on('change',function(){
        var keyword = $('#search').val();
        var url = "<?php echo base_url($this->cname); ?>/mencari";
        if(keyword){
            $.ajax({
                type: "POST",
                url: url,
                data:{keyword:keyword},
                success: function(msg)
                {
                    // alert(msg);
                    if(msg!='null'){
                        data = JSON.parse(msg);
                        $('#produk_code').val(data.code);
                        $('#produk_name').val(data.name);
                        $('#produk_id').val(data.id);
                        $('#unit').val(data.unit);
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

    $('#formAdd').submit(function(){
        var ident = $('#ident').val();
        var produk_id = $('#produk_id').val();
        var produk_code = $('#produk_code').val();
        var produk_name = $('#produk_name').val();
        var quantity = $('#quantity').val();
        var unit_price = $('#unit_price').val();
        var unit = $('#unit').val();
        var reference = $('#reference_no').html();
        var supplier_code = $('#supplier_code').html();
        var supplier_name = $('#supplier_name').html();
        var date = $('#date').html();
        var nota = $('#nota').html();
        var operator = $('#user_id').html();
        var urut = $('#urut_faktur').html();
        var brand = $('#brand').val();

        var url = "<?php echo base_url($this->cname); ?>/pembelian_produk";
        var form_data = {
            product_id: produk_id,
            product_code: produk_code,
            product_name: produk_name,
            quantity: quantity,
            reference_no: reference,
            supplier_code: supplier_code,
            supplier_name: supplier_name,
            date: date,
            ident:ident,
            note: nota,
            operator: operator,
            unit_price: unit_price,
            unit:unit,
            urut: urut,
            brand_code:brand

        };
        // alert(ident);
        $('#modal-add').modal('hide');
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg)
            {
                // alert(msg);
                data = msg.split("|");
                if(data[0]==1){
                    clear('save');
                    listProduk();
                }
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {$("#flash_message").hide();}, 5000);
            }
        });
        return false;
    });

});

function getkey(e) {
    if (window.event)
        return window.event.keyCode;
    else if (e)
        return e.which;
    else
        return null;
}

function goodchars(e, goods, field) {
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;

    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();

    // check goodkeys
    if (goods.indexOf(keychar) != -1)
        return true;
    // control keys
    if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
        return true;

    if (key == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
                break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
    };
    // else return false
    return false;
}

</script>