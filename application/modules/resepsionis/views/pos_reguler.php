<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">
            POS REGULER
        </h3>
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:0085c0; height:155px">
            <div class="tile bg-red" onclick="window.location='<?php echo base_url($this->module); ?>/kas/tutup'">
                <div class="tile-body">
                    <i class="icon-money"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Tutup Kasir
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->module); ?>/retur'">
                <div class="tile-body">
                    <i class="icon-truck"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Retur Konsumen
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile double bg-yellow pull-right" style="cursor:default">
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
                    <i class="total_transaksi">0</i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-shopping-cart"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Transaksi Hari Ini
                    </div>
                    <div class="number" id="transaksi_today">
                        <?php //echo BulanIndo(date('n')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div id="product_form" class="portlet box green" >
            <div class="portlet-body">
                <div class="row">
                    <div class="table-responsive col-md-9">
                        <div class="row">
                            <div class="col-md-4" >
                                <div class="top-news" style="background-color:0085c0">
                                    <a href="#" class="btn" style="background-color:0085c0">
                                        <span><strong class="dataNote"></strong></span>
                                        <em>CASHDRAW NUMBER</em>
                                        <i class="icon-file-text top-news-icon"></i>
                                        <span class="pull-right dataUrut" style="display:none"></span>
                                        <span class="pull-right dataOperator" style="display:none">&nbsp;<?php echo $user[0]->id; ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="top-news">
                                    <a href="#" class="btn" style="background-color:0085c0">
                                        <span><strong class="dataInvoice"></strong></span>
                                        <em>INVOICE NUMBER</em>
                                        <i class="icon-shopping-cart top-news-icon"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="top-news">
                                    <a href="#" class="btn" style="background-color:0085c0">
                                        <span><strong><?php echo tanggalIndo(date('Y-m-d')); ?></strong></span>
                                        <em>TANGGAL</em>
                                        <i class="icon-calendar top-news-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table id="" class="table table-striped table-bordered table-advance table-hover">
                            <tbody>
                                <form id="panelForm">
                                <tr>
                                    <td colspan="2" style="background-color:#229fcd;">
                                        <select id="produk_display" class="form-control select2me">
                                        <option value="">Pilih Produk</option>
                                        </select>
                                    </td>
                                    <td width="100px" style="background-color:#229fcd;"><input id="qty_display" placeholder="Qty" class="form-control qty"></td>
                                    <td width="100px"style="background-color:#229fcd;" ><button type="button" onclick="add_transaction()" class="btn btn-small btn-default"><i class="icon-plus"></i> Tambahkan</button></td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                        <!-- <br> -->
                        <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color:#229fcd; color:white" class="text-center" width="50px">No.</th>
                                    <th style="background-color:#229fcd; color:white" class="text-center">Nama Produk</th>
                                    <th style="background-color:#229fcd; color:white" class="text-center" width="50px">Qty</th>
                                    <th style="background-color:#229fcd; color:white" class="text-center" width="125px">Harga</th>
                                    <th style="background-color:#229fcd; color:white" class="text-center" width="75px">Diskon(%)</th>
                                    <th style="background-color:#229fcd; color:white" class="text-center" width="125px">Subtotal</th>
                                    <th style="background-color:#229fcd; color:white" class="text-center" width="175px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="dataSelling">
                            </tbody>
                            <tfoot>
                            <tr>
                                <td align="center" colspan="5">TOTAL</td>
                                <td align="right" class="totalSelling">Rp. 0,00</td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-large btn-danger" style="width:100%" onclick="cancel()">KOSONGKAN</button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-large btn-warning" style="width:100%" onclick="suspend()">PESAN</button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-large btn-info" style="width:100%" onclick="actBayar()">BAYAR</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left:0px;">
                        <div class="bg-yellow" style="height:40px; padding: 0px 10px 0px 10px; margin-bottom:5px">
                            <span style="font-size:26px; " class="pull-right totalTax">Rp 0,00</span>
                            <i style="font-size:56px; margin-top:5px"></i>
                            <p>PAJAK</p>
                        </div>
                        <div class="bg-blue" style="height:40px; padding: 0px 10px 0px 10px; margin-bottom:5px">
                            <span style="font-size:26px; " class="pull-right totalDiskon">Rp 0,00</span>
                            <i style="font-size:56px; margin-top:5px"></i>
                            <p>DISCOUNT</p>
                        </div>
                        <div class="bg-red" style="height:80px; padding: 20px 10px 0px 10px; margin-bottom:5px">
                            <span id="payback_show" style="font-size:21px;" class="pull-right totalSelling">Rp 0,00</span>
                            <i class="icon-money" style="font-size:54px; margin-top:5px"></i>
                            <p>TOTAL</p>
                        </div>
                        <div class="bg-green" style="height:55px; padding: 10px 10px 0px 10px; margin-top:35px">
                            <button class="btn btn-large btn-default" style="width:100%" onClick="list_suspend()">LIST PESANAN</button>
                        </div>
                    </div>
                </div>
                
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
                <button onclick="clear('hapus')" class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-suspend" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Data Pesanan</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Invoice</th>
                                <th>Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="dataSuspend">
                            <tr>
                                <td colspan="8" align="center" style="font-size:14px;font-weight:bold;">No Data Available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-bayar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Pembayaran</h4>
            </div>
            <form id="form-bayar" class="horizontal-form">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bg-red" style="height:80px; padding: 20px 10px 0px 10px; margin-bottom:5px">
                                    <span id="total" style="display:none;" class="pull-right"></span>
                                    <span id="kembali" style="display:none;" class="pull-right"></span>
                                    <span id="hutang" style="display:none;" class="pull-right"></span>
                                    <span style="display:none;" class="pull-right data-Total"></span>
                                    <span id="total_show" style="font-size:26px; " class="pull-right dataTotal">Rp 0,00</span>
                                    <i class="icon-money" style="font-size:56px; margin-top:5px"></i>
                                    <p>TOTAL</p>
                                </div>
                                <div class="bg-blue" style="height:80px; padding: 20px 10px 0px 10px; margin-bottom:5px">
                                    <span id="payment_show" style="font-size:26px; " class="pull-right dataBayar">Rp 0,00</span>
                                    <i class="icon-money" style="font-size:56px; margin-top:5px"></i>
                                    <p>DIBAYAR</p>
                                </div>
                                <div id="div-kembali" class="bg-green" style="height:80px; padding: 20px 10px 0px 10px; margin-bottom:5px">
                                    <span style="font-size:26px; " class="pull-right dataKembali">Rp 0,00</span>
                                    <i class="icon-money" style="font-size:56px; margin-top:5px"></i>
                                    <p>KEMBALIAN</p>
                                </div>
                                <div id="div-hutang" class="bg-green" style="height:80px; padding: 20px 10px 0px 10px; display:none; margin-bottom:5px">
                                    <span style="font-size:26px; " class="pull-right dataHutang">Rp 0,00</span>
                                    <i class="icon-money" style="font-size:56px; margin-top:5px"></i>
                                    <p>HUTANG</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-user-md"></i>
                                        </span>
                                        <select id="list_pelanggan" name="list_pelanggan" class="form-control select2me input-lg">
                                            <option>Pilih Pelanggan</option>
                                        </select>
                                    </div>
                                    <span class="help-block">* Pilih nama pelanggan (boleh kosong)</span>
                                </div>
                                <div id="div-cara" style="display:none" class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-credit-card"></i>
                                        </span>
                                        <select id="cara" name="cara" class="form-control select2me input-lg" readonly>
                                            <option value="cash">Cash</option>
                                            <option value="credit">Credit</option>
                                        </select>
                                    </div>
                                    <span class="help-block">* Pilih metode pembayaran</span>
                                </div>
                                <div id="div-tanggal" style="display:none" class="form-group">
                                    <label>Jatuh Tempo</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="icon-calendar"></i>
                                        </span>
                                        <input id="tgl_bayar" name="tgl_bayar" class="operate form-control date-picker" placeholder="Jatuh Tempo" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                                <div class="form-group" id="div-pengiriman" style="display:none">
                                    <label>Tanggal Pengiriman</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-money"></i>
                                        </span>
                                        <input type="date" id="pengiriman" name="pengiriman" class="date-picker form-control" placeholder="Tanggal Pengiriman" data-date-format="yyyy-mm-dd">
                                    </div>
                                    <span class="help-block">* Tanggal pengiriman (boleh kosong)</span>
                                </div>
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>%</i>
                                        </span>
                                        <input id="discount" name="discount" value="0" class="operate form-control" placeholder="Discount %">
                                    </div>
                                    <span class="help-block">* Di isi persentase diskon contoh: 10 (untuk 10%)</span>
                                </div>
                                <div class="form-group">
                                    <label>Pajak</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>%</i>
                                        </span>
                                        <input id="tax" name="tax" value="0" class="operate form-control" placeholder="Tax %">
                                    </div>
                                    <span class="help-block">* Di isi persentase pajak contoh: 10 (untuk 10%)</span>
                                </div>
                                <div class="form-group">
                                    <label>Bayar</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-money"></i>
                                        </span>
                                        <input id="bayar" name="bayar" class="operate form-control" placeholder="Nominal Pembayaran">
                                        <input id="grand_total" name="grand_total" class="form-control input-lg" type="hidden">
                                        <input id="payback" name="payback" class="form-control input-lg" type="hidden">
                                    </div>
                                    <span class="help-block">* Di isi nominal angka tanpa tanda titik atau koma contoh: 100000 (untuk Rp 100.000,00)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:#eee">
                    <button onclick="clear('bayar')" class="btn red" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn green">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-ubah" class="modal" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Ubah Qty</h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="form-horizontal">
                        <div class="form-group" style="display:none;">
                            <div class="col-md-12">
                                <input id="ident" name="ident" class="form-control ident" placeholder="Ident" type="text" style="height:45px;">
                                <input id="barcode-edit" name="barcode-edit" class="form-control barcode-edit" placeholder="barcode-edit" type="text" style="height:45px;">
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <div class="col-md-12">
                                <input id="price" name="price" readonly class="form-control price" placeholder="Price" type="text" style="height:45px;">
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <div class="col-md-12">
                                <input id="diskon" name="diskon" class="form-control diskon" placeholder="Discount" type="text" style="height:45px;">
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <div class="col-md-12">
                                <input id="pajak" name="pajak" class="form-control pajak" placeholder="Discount" type="text" style="height:45px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="qty_edit" name="qty_edit" class="form-control qty_edit" placeholder="Qty" type="text" style="height:45px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-sm-12">
                        <button onclick="edit_transaction();" class="btn btn-block btn-lg btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
function checking () {
    var url = "<?php echo base_url($this->cname); ?>/cashdraw_check";
    $.ajax({
        type: "POST",
        url: url,
        success: function(msg)
        {
            if(msg){
                // $('#modal-regular').modal('hide');
                data = msg.split('|');
                dataStatus = data[0];
                dataCash = data[1];
                $(".dataNote").html(dataCash);

                var urlMem = "<?php echo base_url($this->cname); ?>/ceksession_member";
                $.ajax({
                    type: "POST",
                    url: urlMem,
                    success: function(msg)
                    {
                        // asReguler();
                        if (msg=='member'){
                            window.location = "<?php echo base_url($this->module); ?>/pos/paramedik";
                        } else if (msg == '') {
                            // $('#modal-cekmember').modal('show');
                            // $('#code_member').focus();
                            asReguler();
                        } else {
                            $('#id_product').focus();
                        }
                    }
                });

                if(dataStatus=='temporary'){
                    var urlTmp = "<?php echo base_url($this->cname); ?>/temporary_check";
                    $.ajax({
                        type: "POST",
                        url: urlTmp,
                        data: {cash:$.trim(dataCash)},
                        success: function(msg)
                        {
                            if(msg){
                                var dataInvoice = msg;
                                $(".dataInvoice").html(dataInvoice);

                                var urlDataTmp = "<?php echo base_url($this->cname); ?>/get_temp_data";
                                $.ajax({
                                    type: "POST",
                                    url: urlDataTmp,
                                    data: {kas: $.trim(dataCash), inv: $.trim(dataInvoice)},
                                    success: function(temp) {
                                        // alert(temp);
                                        var data = temp.split("|");
                                        $(".dataSelling").html(data[0]);
                                        $(".totalSelling").html(data[4]);
                                        $(".totalDiskon").html(data[5]);
                                        $(".totalTax").html(data[7]);
                                        $(".data-Total").html(data[1]);
                                        $("#total").val(data[1]);
                                        $("#dumpTotal").val(data[1]);
                                        $(".dataTotal").html(data[4]);
                                        $(".dataUrut").html(data[6]);
                                    }
                                });

                                var urlDataSuspend = "<?php echo base_url($this->cname); ?>/get_suspend_data";
                                $.ajax({
                                    type: "POST",
                                    url: urlDataSuspend,
                                    data: {kas: $.trim(dataCash)},
                                    success: function(temp) {
                                        $(".dataSuspend").html(temp);
                                    }
                                });
                            } else {
                                var urlInv = "<?php echo base_url($this->cname); ?>/invoice_request";
                                $.ajax({
                                    type: "POST",
                                    url: urlInv,
                                    data: {kas: $.trim(dataCash)},
                                    success: function(inv)
                                    {
                                        // alert(inv);
                                        data = inv.split('|');
                                        $(".dataSelling").html('');
                                        $(".totalSelling").html('Rp. 0,00');
                                        $(".dataUrut").html(data[1]);
                                        $(".dataInvoice").html(data[0]);
                                    }
                                });

                                var urlDataSuspend = "<?php echo base_url($this->cname); ?>/get_suspend_data";
                                $.ajax({
                                    type: "POST",
                                    url: urlDataSuspend,
                                    data: {kas: $.trim(dataCash)},
                                    success: function(temp) {
                                        $(".dataSuspend").html(temp);
                                    }
                                });
                            }
                        }
                    });
                } else if(dataStatus=='closed'){
                    alertify.set({ labels: {
                        ok     : "Ya",
                        cancel : "Tidak"
                    } });
                    alertify.confirm("Kas anda masih belum di validasi oleh pihak management, sehingga anda tidak bisa melakukan transaksi, harap tunggu hingga kas anda di validasi.", function (e) {
                        if (e) {
                            window.location = "<?php echo base_url($this->module); ?>";
                        } else {
                            // user clicked "cancel"
                        }
                    });
                } else if(dataStatus=='valid'){
                    alertify.set({ labels: {
                        ok     : "Ya",
                        cancel : "Tidak"
                    } });
                    alertify.confirm("Kas anda sudah di validasi oleh pihak management, tetapi anda tidak bisa melakukan transaksi dengan akun tersebut di hari yang sama.", function (e) {
                        if (e) {
                            window.location = "<?php echo base_url($this->module); ?>";
                        } else {

                        }
                    });
                }
            } else {
                alertify.confirm("Anda belum membuka kas, silakan buka kas terlebih dahulu.", function (e) {
                    if (e) {
                        window.location = "<?php echo base_url($this->module).'/kas/buka'; ?>";
                    } else {
                        window.location = "<?php echo base_url($this->module); ?>";
                    }
                })
                
            }
            get_total_transaction(dataCash);
            // get_total_suspend(dataCash);
            // get_total_cancel(dataCash);
        }
    });
    return false;
}

function actTambah(){
    clear('produk');
    get_produk_racik();
    $('#modal-add').modal('show');
}

function asReguler() {
    $.ajax({
        url: "<?php echo base_url($this->cname); ?>/cek_member_reguler",
        success: function(msg)
        {
            $('#modal-cekmember').modal('hide');
            $("#id_product").focus();
        }
    });
    return false;
}

function cekmember(){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url($this->cname); ?>/cek_member",
        data: $('#formcekmember').serialize(),
        success: function(msg)
        {
            if(msg == 'Member Success'){
                $('#code_member').val('');
                $('#modal-cekmember').modal('hide');
            }
            alertify.alert(msg);
            $("#id_product").focus();
        }
    });
    return false;
}
function add_transaction(){
    var invoice = $.trim($(".dataInvoice").html());
    var cash = $.trim($(".dataNote").html());
    var barcode = $('#produk_display').val();
    var qty = $('#qty_display').val();
    var urut = $('.dataUrut').html();
    // alert(invoice+' '+cash+' '+barcode+' '+qty+' '+satuan_id+' '+satuan+' '+urut);
    if(invoice && cash && barcode && qty){
        var urlcek = "<?php echo base_url($this->cname); ?>/cek_saldo_produk_display";
        $.ajax({
            type: "POST",
            url: urlcek,
            data: {qty: $.trim(qty),barcode: $.trim(barcode)},
            success: function(data)
            {
                // alert(data);
                if (data == 'ada') {
                    var url = "<?php echo base_url($this->cname); ?>/add_transaction";
                    var form_data = {
                        inv: $.trim(invoice),
                        cash: $.trim(cash),
                        barcode: $.trim(barcode),
                        qty: $.trim(qty),
                        urut: urut
                    };
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form_data,
                        success: function(data)
                        {
                            // alert(data);
                            if (data==1){
                                clear('tambah produk');
                                checking();
                            }
                            else if(data==2){
                                addData();
                                clear('tambah produk');
                            }
                            else if(data==0){
                                addGagal();
                                clear('tambah produk');
                            }
                            else{
                                inpoServer();
                                clear('tambah produk');
                            }
                        }
                    });
                }else if(data == 'tidak cukup'){
                    alertify.error('Produk yang ada di dalam rak tidak cukup, silahkan ulangi kembali!');
                    $("#tambahkan_produk").data("aksi", "kurang");
                    $('#modal-add').modal('hide');
                    $("#id_product").focus();
                }
            }
        });
    }else{
        alertify.alert('Silahkan hubungi teknisi. [err_function = add_transaction]');
    }
    return false;
}

function cancel(){
    var cash = $(".dataInvoice").html();
    alertify.set({ labels: {
        ok     : "Ya",
        cancel : "Tidak"
    } });
    // confirm dialog
    alertify.confirm("Apakah Anda yakin akan membatalkan transaksi dengan kode : "+cash+" tersebut?", function (e) {
        if (e) {
            // user clicked "ok"
            $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/temp_count_check",
                data: {invoice: $.trim(cash)},
                success: function(msg)
                {
                    if(msg==0){
                        alertify.alert('Data transaksi sudah kosong.');
                    }else if(msg>=1){
                        var inv = $(".dataInvoice").html();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url($this->cname); ?>/cancel_transaction",
                            data: {invoice: $.trim(inv)},
                            success: function(data) {
                                // alert(data);
                                if(data == 1){
                                    alertify.success('Data berhasil dihapus');
                                    window.setTimeout(function(){window.location.reload();}, 1500);
                                }
                                else if(data == 0){
                                    alertify.error('Data gagal dihapus.');
                                    window.setTimeout(function(){window.location.reload();}, 1500);
                                }
                            }
                        });
                    }else{
                        alertify.alert('Software Error! Harap segera hubungi Admin atau Teknisi Outlet!');
                    }
                }
            });
        } else {
            // user clicked "cancel"
        }
    });
    return false;
}
function suspend(){
    var cash = $(".dataInvoice").html();
    alertify.set({ labels: {
        ok     : "Ya",
        cancel : "Tidak"
    } });
    // confirm dialog
    alertify.confirm("Pemesanan dengan kode : "+cash+" tersebut?", function (e) {
        if (e) {
            // user clicked "ok"
           $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/temp_count_check",
                data: {invoice : $.trim(cash)},
                success: function(msg)
                {
                    if(msg==0){
                        alertify.alert('Proses pemesanan gagal, karena tidak ada data dalam transaksi dengan kode : '+cash);
                    }else if(msg>=1){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url($this->cname); ?>/suspend_transaction",
                            data: {invoice: $.trim(cash)},
                            success: function(data) {
                                if(data == 1){
                                    alertify.success('Proses pemesanan pada kode '+cash+' berhasil dilakukan.');
                                    window.setTimeout(function(){window.location.reload();}, 1500);
                                }
                                else if(data == 0){
                                    alertify.error('Proses pemesanan pada kode '+cash+' gagal dilakukan.');
                                    window.setTimeout(function(){window.location.reload();}, 1500);
                                }
                            }
                        });
                    }else{
                        alert('Software Error! Harap segera hubungi Admin atau Teknisi Outlet!');
                    }
                }
            });
        } else {
            // user clicked "cancel"
        }
    });
    return false;
}
function get_total_transaction(dataCash){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url($this->cname); ?>/total_transaction",
        data: {kas:dataCash},
        success: function(data)
        {
            //alert(pesan);
            $(".total_transaksi").html(data);
        }
    });
}

function proses_suspend_back(id){
    var idsuspen = document.getElementById(id).getAttribute('invoice');
    $.ajax({
        type: "POST",
        url: "<?php echo base_url($this->cname).'/suspen_back?invoice=' ?>"+idsuspen,
        success: function(data)
        {
            alertify.alert(data);
            $("#modal-suspend").modal('hide');

            checking();
        }
    });
}


function moveData() {
    var inv = $(".dataInvoice").html();
    var kas = $('.dataNote').html();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url($this->cname); ?>/move_transaction",
        data: {invoice: $.trim(inv)},
        success: function(data) {
            // alert(data);
            if(data == 1){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url($this->cname); ?>/print_invoice",
                    data: "invoice="+inv+"&kas="+kas,
                    success: function(data) {
                        // alert(data);
                        if(data == 1){
                            
                        }
                        else if(data == 0){
                            
                        }
                    }
                });
                window.setTimeout(function(){window.location.reload();}, 1000);
            }
            else if(data == 0){
                //open_window('module/invoice/invoice.php?log='+inv,400,500);
                window.setTimeout(function(){window.location.reload();}, 1000);
            }
        }
    });
}
function del(ident){
    alertify.set({ labels: {
        ok     : "Ya",
        cancel : "Tidak"
    } });
    // confirm dialog
    alertify.confirm("Apakah Anda yakin akan menghapus produk ini?", function (e) {
        if (e) {
            // user clicked "ok"
            $.ajax({
                type: "POST",
                url: "<?php echo base_url($this->cname); ?>/delete_temp",
                data: { ident: ident, nota :$.trim($('.dataInvoice').html())},
                success: function(data) {
                    if (data == 1) {
                        delSukses();
                        checking();
                    } else if (data == 0) {
                        delGagal();
                    } else {
                        inpoServer();
                    }
                }
            });
        } else {
            // user clicked "cancel"
        }
    });
    return false;
}


function editqty(ident){
    var id = ident;
    if(id){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url($this->cname); ?>/view_detail_temp",
            data: {ident: $.trim(id)},
            success: function(data)
            {
                // req = data.split("|");
                req = JSON.parse(data);
                $(".ident").val(id);
                $(".price").val(req.price);
                $(".barcode-edit").val(req.code);
                $(".diskon").val(req.discount);
                $(".pajak").val(req.tax);
                $(".qty").val(req.qty);
                $('#modal-ubah').modal('show');
                $('.qty_edit').focus();
            }
        });
    }else{
        alertify.alert('Silahkan ulangi sekali lagi.');
    }
    return false;
}


function edit_transaction(){
    var ident = $('.ident').val();
    var price = $('.price').val();
    var discount = $('.diskon').val();
    var tax = $('.pajak').val();
    var code = $('.barcode-edit').val();
    // alert(code);
    if(discount){
        var discount = $('.diskon').val();
    }else{
        var discount = 0;
    }
    if(tax){
        var tax = $('.pajak').val();
    }else{
        var tax = 0;
    }
    var qty = $('.qty').val();
    var qty_edit = $('.qty_edit').val();

    var subtotal = parseInt(qty_edit) * parseInt(price);
    var diskon = (parseInt(subtotal) * parseInt(discount)) / 100;
    var pajak = (parseInt(subtotal) * parseInt(tax)) / 100;
    var subdiskon = subtotal - diskon + pajak;

    if(qty_edit){
        var url = "<?php echo base_url($this->cname); ?>/edit_transaction";
        var form_data = {
            qty:qty_edit,
            subtotal:subtotal,
            subdiscount:subdiskon,
            discount_nominal:diskon,
            tax_nominal:pajak,
            id:ident,
            code:code
        };
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(data)
            {
                // alert(data);
                if (data==1){
                    $('.qty_edit').val('');
                    $('#modal-ubah').modal('hide');
                    $("#id_product").focus();
                    editSukses();
                    checking();
                }
                else if(data==3){
                    $('.qty_edit').val('');
                    $('#modal-ubah').modal('hide');
                    $("#id_product").focus();
                    alertify.error('Produk yang ada di dalam rak tidak cukup, silahkan ulangi kembali!');
                }
                else if(data==0){
                    editGagal();
                }
                else{
                    inpoServer();
                }
            }
        });
    }else{
        $(".chosenValidate").show();
    }
    return false;
}

function get_produk_display()
{
    var url = "<?php echo base_url($this->cname); ?>/get_produk_display";
    $.ajax({
      type: "POST",
      url: url,
      success: function(msg)
      {
        // alert(msg);
        $("#produk_display").html(msg);
      }
    });
    return false;
}

function actBayar(){
    get_pelanggan();
    $('#modal-bayar').modal('show');
}

function get_pelanggan()
{
    var url = "<?php echo base_url($this->cname); ?>/get_pelanggan";
    $.ajax({
      type: "POST",
      url: url,
      success: function(msg)
      {
        // alert(msg);
        $("#list_pelanggan").html(msg);
      }
    });
    return false;
}


$(document).ready(
    function(){ 

    checking();
    get_produk_display();
    $('#id_product').change(function(){
        // alert($('.dataUrut').html());
        var product = $('#id_product').val();
        var kas = $.trim($(".dataNote").html());
        var inv = $.trim($(".dataInvoice").html());

        $('.invoice').val(inv);
        $('.kas').val(kas);
        $('.barcode').val(product);
        $.ajax({
            url: "<?php echo base_url($this->cname).'/getprodukfromstok?barcode_produk=' ?>"+product,
            success: function(data)
            {
                // alert(data);
                if(data){
                    var jml = parseInt(data);
                    // alert(jml);
                    if(jml > 0){
                        $('#modal-add').modal('show');
                        $("#tambahkan_produk").data("aksi", "tambah");
                        $(".qty").val('');
                        $("#qty").focus();
                    } else {
                        alertify.alert('Stok barang habis.');
                    }
                } else {
                    alertify.alert('Barang tidak terdaftar.');
                }
            }
        });
        $('#id_product').val('');
        return false;
    });

    $('#cara').change(function(){
        var cara = $('#cara').val();
        if (cara=='credit') {
            document.getElementById('div-hutang').style.display = "block";
            document.getElementById('div-kembali').style.display = "none";
            document.getElementById('div-tanggal').style.display = "block";
        } else if(cara=='cash'){
            document.getElementById('div-hutang').style.display = "none";
            document.getElementById('div-tanggal').style.display = "none";
            document.getElementById('div-kembali').style.display = "block";           
        }
    });

    $('#list_pelanggan').change(function(){
        var pelanggan = $('#list_pelanggan').val();
        if (pelanggan =='') {
            $('#cara').val('cash');
            $('#cara').select2().trigger('change');
            $('#tgl_bayar').val('');
            $('#pengiriman').val('');
            document.getElementById('div-cara').style.display = "none";
            document.getElementById('div-tanggal').style.display = "none";
            document.getElementById('div-pengiriman').style.display = "none";
        } else {
            document.getElementById('div-cara').style.display = "block";
            document.getElementById('div-pengiriman').style.display = "block";           
        }
    });

    $("#bayar").keyup(function() {
        var total = $('.data-Total').html();
        var bayar = $('#bayar').val();
        var discount = $('#discount').val();
        var tax = $('#tax').val();
        $.ajax({
            type: "POST",
            data: {total:total,bayar:bayar,discount:discount,tax:tax},
            url: "<?php echo base_url($this->cname); ?>/nominal",
            success: function(msg)
            {
                data = JSON.parse(msg);
                if (data.bayar == '') {
                    $('.dataBayar').html("Rp 0,00");
                }
                $('.dataBayar').html(data.nominal_bayar);
                if (parseInt(data.kembalian) < 0) {
                    $('#kembali').html('0');
                    $('.dataKembali').html('Rp 0,00');
                } else {
                    $('#kembali').html(data.kembalian);
                    $('.dataKembali').html(data.nominal_kembalian);
                }

                if (parseInt(data.hutang) < 0) {
                    $('#hutang').html('0');
                    $('.dataHutang').html('Rp 0,00');
                } else {
                    $('#hutang').html(data.hutang);
                    $('.dataHutang').html(data.nominal_hutang);
                }


                    $('#total').val(data.total);
                    $('.dataTotal').html(data.nominal_total);
            }
        });
        return false;  
    });

    $("#discount").keyup(function() {
        var total = $('.data-Total').html();
        var bayar = $('#bayar').val();
        var discount = $('#discount').val();
        var tax = $('#tax').val();
        $.ajax({
            type: "POST",
            data: {total:total,discount:discount,bayar:bayar,tax:tax},
            url: "<?php echo base_url($this->cname); ?>/nominal",
            success: function(msg)
            {
                data = JSON.parse(msg);
                if (data.bayar == '') {
                    $('.dataBayar').html("Rp 0,00");
                }
                $('.dataBayar').html(data.nominal_bayar);
                if (parseInt(data.kembalian) < 0) {
                    $('#kembali').html('0');
                    $('.dataKembali').html('Rp 0,00');
                } else {
                    $('#kembali').html(data.kembalian);
                    $('.dataKembali').html(data.nominal_kembalian);
                }

                if (parseInt(data.hutang) < 0) {
                    $('#hutang').html('0');
                    $('.dataHutang').html('Rp 0,00');
                } else {
                    $('#hutang').html(data.hutang);
                    $('.dataHutang').html(data.nominal_hutang);
                }


                    $('#total').val(data.total);
                    $('.dataTotal').html(data.nominal_total);
            }
        });
        return false;  
    });

    $("#tax").keyup(function() {
        var total = $('.data-Total').html();
        var bayar = $('#bayar').val();
        var discount = $('#discount').val();
        var tax = $('#tax').val();
        $.ajax({
            type: "POST",
            data: {total:total,discount:discount,bayar:bayar,tax:tax},
            url: "<?php echo base_url($this->cname); ?>/nominal",
            success: function(msg)
            {
                data = JSON.parse(msg);
                if (data.bayar == '') {
                    $('.dataBayar').html("Rp 0,00");
                }
                $('.dataBayar').html(data.nominal_bayar);
                if (parseInt(data.kembalian) < 0) {
                    $('#kembali').html('0');
                    $('.dataKembali').html('Rp 0,00');
                } else {
                    $('#kembali').html(data.kembalian);
                    $('.dataKembali').html(data.nominal_kembalian);
                }

                if (parseInt(data.hutang) < 0) {
                    $('#hutang').html('0');
                    $('.dataHutang').html('Rp 0,00');
                } else {
                    $('#hutang').html(data.hutang);
                    $('.dataHutang').html(data.nominal_hutang);
                }


                    $('#total').val(data.total);
                    $('.dataTotal').html(data.nominal_total);
            }
        });
        return false;  
    });

    $('#form-bayar').submit(function(){
        // alert('sip');  
        var cara = $('#cara').val();

        var total = $('#total').val();
        var diskon = $('#discount').val();
        var pajak = $('#tax').val();
        var jatuh_tempo = $('#tgl_bayar').val();
        var pengiriman = $('#pengiriman').val();
        var bayar = $('#bayar').val();
        var hutang = $('#hutang').html();
        var kembali = $('#kembali').html();
        var pelanggan = $('#list_pelanggan').val();
        var nama_pelanggan = $('#list_pelanggan :selected').text();
        var kas = $('.dataNote').html();
        var nota = $('.dataInvoice').html();
        var urut = $('.dataUrut').html();
        var url = "<?php echo base_url($this->cname); ?>/payment_transaction";
        var form_data = 
        {
            kas: $.trim(kas),
            invoice: $.trim(nota),
            cara: $.trim(cara),
            total: $.trim(total),
            diskon: $.trim(diskon),
            pajak: $.trim(pajak),
            hutang: $.trim(hutang),
            jatuh_tempo: $.trim(jatuh_tempo),
            bayar: $.trim(bayar),
            pelanggan: $.trim(pelanggan),
            nama_pelanggan: $.trim(nama_pelanggan),
            kembali: $.trim(kembali),
            urut:urut,
            pengiriman:pengiriman,
            is_ajax: 'finish'
        };
        cekbayar = parseInt(bayar);
        cektotal = parseInt(total);
        if (cara && total && bayar && kembali) 
        {
            if ((cara=='cash' && cekbayar >= cektotal) || (cara=='credit') && jatuh_tempo!='' && pelanggan!='' && cekbayar < cektotal) 
            {
                $.ajax
                ({
                    type: "POST",
                    url: url,
                    data: form_data,
                    success: function(data) 
                    {
                        // alert(data);
                        var msg = data.split("|");
                        var ret = msg[0];
                        var invoice = msg[1];
                        if (ret == 1) 
                        {
                            $('#bayar').val('');
                            transSukses();
                            moveData();
                        } 
                        else if (ret == 0) 
                        {
                            $('#bayar').val('');
                            transGagal();
                        } 
                        else if (ret == 2) 
                        {
                            $('#bayar').val('');
                            transData();
                        } 
                        else if (ret == 3) 
                        {
                            $('#bayar').val('');
                            transData();
                            moveData();
                        } 
                        else 
                        {
                            $('#bayar').val('');
                            inpoServer();
                        }
                    }
                });
            } 
            else 
            {
                // alert(cara+'|'+jatuh_tempo+'|'+cekbayar+'|'+cektotal+'|'+pelanggan);
                alertify.error('Terjadi kesalahan, perikas kembali inputan Anda. -2');
            }
        } 
        else { 
            // alert(cara+'|'+total+'|'+bayar+'|'+kembali);
            alertify.error('Terjadi kesalahan, perikas kembali inputan Anda'); 
        }
        return false;
    });

});

    


function clear(Object){
    if(Object=='tambah produk'){
        $(".invoice").val('');
        $('.kas').val('');
        $('.barcode').val('');
        $('.qty').val('');
        $('#qty_display').val('');
        $('#qty_racik').val('');
        $('#produk_display').val('');
        $('#produk_display').select2().trigger('change');
        $('#satuan_display').val('');
        $('#satuan_display').select2().trigger('change');
        $('#produk_racik').val('');
        $('#produk_racik').select2().trigger('change');
        $('#satuan_racik').val('');
        $('#satuan_racik').select2().trigger('change');
        $("#tambahkan_produk").data("aksi", "kurang");
        $("#id_product").focus();
    }
}
function list_suspend(){
    $('#modal-suspend').modal('show');
}
function paymentButton(){
    $('#trans_suspend').slideUp();
    $('#trans_penjualan').slideUp();
    $('#payment-div').slideDown();
    $('#bayar').focus();
}
function addSukses(){
    alertify.success('Data yang Anda Masukkan berhasil disimpan!');
}

function addGagal() {
    alertify.error('Data yang Anda Masukkan gagal disimpan, silahkan dicek secara manual inputan anda.');
}

function addData() {
    alertify.error('Data yang Anda Masukkan gagal disimpan, karena data sudah ada.');
}

function editSukses() {
    alertify.success('Data yang Anda Masukkan berhasil diganti!');
}

function editGagal() {
    alertify.error('Data yang Anda Masukkan gagal diganti, silahkan dicek secara manual inputan anda.');
}

function editData() {
    alertify.error('Data yang Anda Masukkan gagal diganti, karena data sudah ada di dalam database.');
}

function transSukses() {
    alertify.success('Data Transaksi berhasil disimpan!');
}

function transGagal() {
    alertify.error('Data Transaksi gagal disimpan, silahkan ulangi lagi!');
}

function transData() {
    alertify.error('Data Transaksi gagal disimpan, silahkan ulangi lagi!');
}

function inpoServer() {
    alertify.log('Server error, connection timeout!');
}

 function delSukses() {
    alertify.success('Data berhasil dihapus!');
}

function delGagal() {
    alertify.error('Data gagal dihapus!');
}
</script>