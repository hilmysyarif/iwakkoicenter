<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Order Stok Barang Khusus
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_produk</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Barang Khusus</a><i class="icon-angle-right"></i></li>
            <li><a href="">Order Stok</a></li>
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
                        Transaksi
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
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Proses Order</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;KD Order Stok</span>
                            <span id="reference_no" class="pull-right"><?php echo $distribusi->reference_no; ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"><?php echo tanggalIndo($distribusi->date); ?></span>
                            <span id="date" style="display:none"><?php echo $distribusi->date; ?></span>
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
                                    <select type="text" id="search" name="search" class="form-control select2me" data-placeholder="Pilih Bahan">
                                    <?php echo $menu; ?>
                                    </select>
                                </td>
                                <td width="150px" style="background-color:#39B3D7;">
                                    <input type="hidden" id="ident" name="ident" class="form-control">
                                    <input type="hidden" id="produk_code" name="produk_code" class="form-control">
                                    <input type="hidden" id="produk_name" name="produk_name" class="form-control">
                                    <input type="hidden" id="produk_id" name="produk_id" class="form-control">
                                    <input type="hidden" id="hpp" name="hpp" class="form-control">
                                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="qty">
                                </td>
                                <td width="150px" style="background-color:#39B3D7;">
                                    <select id="unit" name="unit" class="form-control select2me" data-placeholder='satuan'></select>
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
                                <th style="background-color:#39B3D7; color:white" class="text-center" width="100px">Qty</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Unit</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list_produk">
                        <?php $no = 1; ?>
                        <?php foreach ($detail as $key => $value): ?>
                            <tr>
                                <td class="text-center" width="50px"><?php echo $no; ?></td>
                                <td class="text-center"><?php echo $value->product_code; ?></td>
                                <td class="text-center"><?php echo $value->product_name; ?></td>
                                <td class="text-center" width="50px"><?php echo $value->quantity; ?></td>
                                <td class="text-center"><?php echo $value->nama_satuan; ?></td>
                                <td class="text-center">
                                    <a onclick="actEdit('<?php echo $value->id ?>')" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <?php $no++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form" name="disc_form" id="disc_form">
                    <div class="form-actions right">
                        <button onclick="back()" type="button" class="btn red"><i class=" icon-arrow-left"></i> Kembali</button>
                        <button onclick="proses()" type="button" class="btn green"><i class="icon-ok"></i> Proses</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<script type="text/javascript">
function clear(Object){
    if(Object=='save'){
        $('#produk_id').val('');
        $('#produk_code').val('');
        $('#produk_name').val('');
        $('#quantity').val('');
        $('#description').val('');
        $('#ident').val('');
        $('#search-div').hide();
        $('#selling-div').show();
        $('#total_akhir').html('0');
        $('#total_akhir_rupiah').html('Rp 0,00');
        $('#search').val('');
        $('#search').select2().trigger('change');
        $('#unit').val('');
        listProduk();
    } else if(Object=='delete'){
        $('#id-delete').val('');
    }
}
function back(argument) {
    window.location = "<?php echo base_url($this->cname); ?>"
}
function proses(argument) {
    var reference = $('#reference_no').html();
    var url = "<?php echo base_url($this->cname); ?>/proses_distribusi";
    $.ajax({
        type: 'POST',
        data: {reference:reference},
        url:url,
        success: function(msg){
            // alert(msg);
            data = msg.split('|');
            if(data[0]==1){
                window.location = "<?php echo base_url($this->cname); ?>";
            }
        }
    });
    return false;
}

function get_satuan(Object) {
    var url = "<?php echo base_url($this->cname) ?>/get_satuan";
    var bahan = $('#search').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {bahan:bahan},
        success: function(msg){
            if(msg){
                $('#unit').html(msg);
                if(Object){
                    $('#unit').val(Object);
                }
                $('#unit').select2().trigger('change');
            }
        }
    });
}

function actEdit(Object){
    var url = "<?php echo base_url($this->cname); ?>/detail_distribusi";
    $.ajax({
        type: 'POST',
        data: {id:Object},
        url:url,
        success: function(msg){
            // alert(msg);
            data = JSON.parse(msg);
            $('#search').val(data.product_code);
            $('#search').select2().trigger('change');
            $('#ident').val(data.id);
            $('#produk_id').val(data.product_id);
            $('#produk_code').val(data.product_code);
            $('#produk_name').val(data.product_name);
            $('#quantity').val(data.quantity);
            get_satuan(data.unit);
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
            $("#list_produk").html(msg);
        }
    });
    return false;
}
$(document).ready(function(){
    $('#search').on('change',function(){
        get_satuan();
    });

    $('#formAdd').submit(function(){
        var ident = $('#ident').val();
        var reference_no = $('#reference_no').html();
        var date = $('#date').html();
        var penerima = $('#supplier_name').html();
        var product_id = $('#produk_id').val();
        var product_code = $('#produk_code').val();
        var product_name = $('#produk_name').val();
        var quantity = $('#quantity').val();
        var unit = $('#unit').val();
        var description = $('#description').val();
        var operator = $('#user_id').html();
        var urut = $('#urut_faktur').html();

        var url = "<?php echo base_url($this->cname); ?>/retur_out_produk";
        var form_data = {
            ident: ident,
            reference: reference_no,
            unit: unit,
            date: date,
            penerima: penerima,
            product_id: product_id,
            product_code: product_code,
            product_name: product_name,
            qty_dikirim: quantity,
            // description: description,
            operator: operator,
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
                data = msg.split('|');
                if(data[0]==1){
                    clear('save');
                    listProduk();
                }
                $('#flash_message').html(data[1]);
                setTimeout(function(){$('#flash_message').html('');},1500);
            }
        });
        return false;
    });
});
</script>