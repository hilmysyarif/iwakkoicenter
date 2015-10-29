<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Daftar Spoil
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Retur Spoil</a><i class="icon-angle-right"></i></li>
            <li><a href="">Retur Spoil</a></li>
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
                        Spoil
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
        <div id="product_form" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Transaksi Spoil</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <span id="flash_message"></span>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <a class="btn green pull-right" onclick="addTransaksiButton()">
                                    <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Produk
                                </a> -->
                                <table id="" class="table table-striped table-bordered table-advance table-hover">
                                    <tbody>
                                        <form id="formAdd">
                                        <tr>
                                            <td style="background-color:#39B3D7;">
                                                <select type="text" id="search" name="search" class="form-control select2me" data-placeholder="Pilih Bahan"></select>
                                            </td>
                                            <td width="75px" style="background-color:#39B3D7;">
                                                <input type="hidden" id="ident" name="ident" class="form-control">
                                                <input type="hidden" id="kode" name="kode" class="form-control">
                                                <input type="hidden" id="nama" name="nama" class="form-control">
                                                <input type="hidden" id="hpp" name="hpp" class="form-control">
                                                <input type="text" id="qty" name="qty" class="form-control" placeholder="qty">
                                            </td>
                                            <td width="100px" style="background-color:#39B3D7;">
                                                <select type="text" id="satuan" name="satuan" class="form-control select2me" data-placeholder="Pilih Satuan"></select>
                                            </td>
                                            <td width="150px" style="background-color:#39B3D7;">
                                                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="keterangan">
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
                                            <th style="background-color:#39B3D7; color:white" class="text-center">Kode Bahan</th>
                                            <th style="background-color:#39B3D7; color:white" class="text-center">Nama Bahan</th>
                                            <th style="background-color:#39B3D7; color:white" class="text-center" width="50px">Qty</th>
                                            <th style="background-color:#39B3D7; color:white" class="text-center" width="175px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_produk">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left:0px;">
                        <div style="height:80px; padding: 20px 10px 0px 10px; margin-bottom:5px">
                            <span id="reference" style="font-size:21px;" class="pull-right">-</span>                    
                        </div>
                        <div style="height:80px; padding: 20px 10px 0px 10px; margin-bottom:5px">
                            <span id="date_show" style="font-size:21px;" class="pull-right">-</span>
                            <span id="tgl" style="display:none"><?php echo date('Y-m-d'); ?></span>
                            <span id="urut_faktur" style="display:none"></span>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form" name="disc_form" id="disc_form">
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
<script type="text/javascript">

function clear(Object){
    if(Object=='save'){
        $('#produk_id').val('');
        $('#kode').val('');
        $('#nama').val('');
        $('#hpp').val('');
        $('#qty').val('');
        $('#keterangan').val('');
        $('#ident').val('');
        $('#search-div').hide();
        $('#selling-div').show();
        $('#total_akhir').html('0');
        $('#total_akhir_rupiah').html('Rp 0,00');
        $('#search').val('');
        $('#search').select2().trigger('change');
        // $('#nota').val('');
        listProduk();
    } else if(Object=='delete'){
        $('#id-delete').val('');
    }
}

function cekTemp(){
    var url = "<?php echo base_url($this->cname); ?>/cek_temp_spoil";
    $.ajax({
        type: "POST",
        url: url,
        success: function(msg)
        {
            // alert(msg);
            if(msg==0){
                begin();
            } else {
                data = JSON.parse(msg);
                $('#reference').html(data.reference);
                // $('#note').html(data.nota);
                $('#date_show').html(data.date_show);
                $('#urut_faktur').html(data.urut);
                $('#tgl').html(data.tgl);
                listProduk();
            }
        }
    });
    return false;
}
function actEdit(Object){
    var url = "<?php echo base_url($this->cname); ?>/detail_spoil";
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
            $('#kode').val(data.kode);
            $('#nama').val(data.nama);
            $('#qty').val(data.qty);
            $('#search').val(data.kode);
            $('#search').select2().trigger('change');
            $('#keterangan').val(data.keterangan);
            $('#modal-produk').modal('show');
        }
    });
    return false;
}
function res_total(){
    var total = $('#total_akhir').html();
    var url = "<?php echo base_url($this->cname); ?>/total_nominal";
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

function actDel(Object){
    $('#id-delete').val(Object);
    $('#modal-confirm').modal('show');
}


function delData() {
    var id = $('#id-delete').val();
    var url = '<?php echo base_url($this->cname); ?>/delete_produk_spoil';
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
    var reference = $('#reference').html();
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
            $('#total_akhir').html(data[1]);
            $('#total_akhir_rupiah').html(data[4]);
            if(data[2]!=''&& data[3]!=''){
                $('#supplier_code').html(data[2]);
                $('#supplier_name').html(data[3]);
                $('#modal-add').modal('hide');
            }
            res_total();
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
            $('#search').html(msg);
        }
    });
    return false;
}

function pilihProduk(Object){
    var data = document.getElementById(Object).getAttribute('data-category');
    // alert(data);
    val = data.split('|');
    $('#produk_id').val(val[0]);
    $('#produk_code').val(val[1]);
    $('#nama').val(val[2]);
    $('#modal-add').modal('show');
    $('#quantity').focus();
}

function paymentButton(){
    var total = $('#total_akhir').html();
    if(total>0){
        $('#search-div').hide();
        $('#payment-div').show();
        $('#selling-div').hide();
    } else {
        alertify.alert('Maaf, total pembelian masih 0.');
    }
}
function prosesPembelian(){
    var reference = $('#reference').html();
    var tgl = $('#tgl').html();
    var urut = $('#urut_faktur').html();
    var total_akhir = $('#total_akhir').html();
    // var nota = $('#note').html();
    // var distributor_name = $('#distributor_name').val();
    // var distributor_phone = $('#distributor_phone').val();

    var url = "<?php echo base_url($this->cname); ?>/proses_spoil";
    var form_data = {
        reference: reference,
        tgl: tgl,
        urut: urut,
        total_akhir: total_akhir
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
            // $('#distributor_name').html('');
        //  $('#distributor_phone').html('');
            setTimeout(function() {$("#flash_message").hide(); window.location='data';}, 1000);
        }
    });
    return false;
}
function begin(){
    var url = "<?php echo base_url(); ?>stok_bahan/spoil/faktur_spoil";
    $.ajax({
        type: "POST",
        url: url,
        success: function(msg)
        {
            // alert(msg);
            var data = JSON.parse(msg);
            $('#reference').html(data.faktur);
            $('#date_show').html(data.tanggal);

            $('#urut_faktur').html(data.urut_faktur);       }
    });
    
    return false;
}

function addTransaksiButton(){
    clear('save');
    $('#modal-produk').modal('show');
    optFacility();
    $('#search').focus();
}

$(document).ready(function(){
    cekTemp();
    optFacility();
    // listProduk();
    $('#jatuh_tempo').change(function(){
        var tgl = ""+$('#jatuh_tempo').val();
        var url = "<?php echo base_url($this->cname); ?>/konvert_tanggal?tgl="+tgl;
        $.ajax({
            type: "POST",
            url: url,
            success: function(msg)
            {
                $('#tanggal_jatuh_tempo').html(msg);
            }
        });
        return false;
    });

    $('#search').on('change',function(){
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
                    msg = msg.split('|');
                    $('#satuan').html(msg[1]);
                    // alert(msg);
                    if(msg[0]!='null'){
                        data = JSON.parse(msg[0]);
                        $('#kode').val(data.code);
                        $('#nama').val(data.name);
                        $('#produk_id').val(data.id);
                        $('#hpp').val(data.cost);

                        $('#submit_add').prop('disabled',false);
                        // $('#quantity').focus();
                    }
                    else{
                        $('#kode').val('Produk tidak ditemukan!');
                        $('#nama').val('Produk tidak ditemukan!');
                        $('#qty').val('');
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
        // var nota = $('#note').html();
        var reference = $('#reference').html();
        var tgl = $('#tgl').html();
        var kode = $('#kode').val();
        var nama = $('#nama').val();
        var qty = $('#qty').val();
        var keterangan = $('#keterangan').val();
        var urut = $('#urut_faktur').html();
        var satuan = $('#satuan').val();
        qty = qty*satuan;

        var url = "<?php echo base_url($this->cname); ?>/spoil_produk";
        var form_data = {
            ident: ident,
            reference: reference,
            // nota: nota,
            tgl: tgl,
            kode: kode,
            nama: nama,
            qty: qty,
            keterangan: keterangan,
            urut: urut
        };
        // alert(ident);

        $('#modal-produk').modal('hide');
        $('#modal-add').modal('hide');
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
                //setTimeout(function() {$("#flash_message").hide();}, 5000);
            }
        });
        return false;
    });
});
</script>