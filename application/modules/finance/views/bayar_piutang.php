<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Bayar Piutang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->module); ?>/piutang">Piutang</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Menu Piutang</a></li>
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
            <div class="tile bg-red" onclick="window.location='<?php echo base_url($this->cname); ?>/bayar'">
                <div class="tile-body">
                    <i class="icon-plus-sign"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Bayar
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/daftar'">
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
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah</div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <span id="flash_message"></span>
                <form id="form-add" class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Bayar Piutang <span class="pull-right"> Sisa Piutang:: <span id="sisa" style="font-weight:bold">Rp. 0,00</span></span></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Referensi No</label>
                                    <input type="hidden" value="PTG" id="kode" name="kode" class="form-control">
                                    <input type="hidden" id="urut" name="urut" class="form-control">
                                    <input type="text" id="no_referensi" name="no_referensi" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Pembayaran</label>
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="tanggal" name="tanggal" class="date-picker form-control" placeholder="Tanggal" data-date-format="yyyy-mm-dd" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Pelanggan</label>
                                    <?php echo form_dropdown('person', $sup, @$opt, 'id="person" class="form-control select2me" data-placeholder="Pilih Nama Pelanggan"'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Faktur</label>
                                    <select id="faktur" name="faktur" class="form-control select2me" data-placeholder="Pilih Referensi Hutang">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jumlah di Bayar</label>
                                    <input type="text" id="nominal" name="nominal" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="reset" class="btn default">Cancel</button>
                            <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function get_kode() {
    var url = '<?php echo base_url($this->cname); ?>/gen_kode_bayar';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            code: $('#kode').val(),
            date: $('#tanggal').val()
        },
        success: function(msg) {
            // alert(msg);
            data = JSON.parse(msg);
            $("#no_referensi").val(data.code);
            $('#urut').val(data.order);
        }
    });
    return false;
}

function begin() {
    var uri = '<?php echo $this->uri->segment(4); ?>';
    if (uri) {
        get_data(uri);
    }
}

function get_data(Object){
    var url = "<?php echo base_url($this->cname); ?>/get_data";
    var form_data = {
        reference: Object
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg) {
            if(msg){
                data = JSON.parse(msg);
                $('#person').val(data.person);
                $('#person').select2().trigger('change');
                get_faktur(msg);
            }
        }
    });
    return false;
}
function get_faktur(Object){
    if(Object){
        data = JSON.parse(Object);
        var person = data.person;
        var reference = data.no_referensi;
    } else {
        var person = $('#person').val();
    }
    var url = "<?php echo base_url($this->cname); ?>/faktur";
    var form_data = {
        person: person
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg) {
            $('#faktur').html(msg);
            if(Object){
                $('#faktur').val(reference);
                $('#faktur').select2().trigger('change');
                get_saldo(reference);
            }
        }
    });
    return false;
}
function get_saldo(Object) {
    if(Object){
        var faktur = Object;
    } else {
        var faktur = $("#faktur").val();
    }
    var url = "<?php echo base_url($this->cname); ?>/saldo";
    var form_data = {
        faktur: faktur
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg) {
            $("#sisa").html(msg);
        }
    });
    return false;
}
$(document).ready(function() {
    get_kode();
    begin();
    $('#tanggal').on('change', function() {
        gen_kode();
    });
    $("#person").change(function(evt) {
        get_faktur();
    });
    $("#faktur").change(function(evt) {
        get_saldo();
    });
    $('#form-add').submit(function() {
        var url = '<?php echo base_url($this->cname); ?>/input_transaksi_bayar';
        $.ajax({
            type: "POST",
            url: url,
            data: $('#form-add').serialize(),
            success: function(msg) {
                data = msg.split('|');
                if (data[0] == 1) {
                    clear();
                }
                $('#flash_message').html(data[1]);
                setTimeout(function() {
                    $('#flash_message').html('')
                }, 3000);
                setTimeout(function() {
                    window.location = 'daftar'
                }, 3000);
            }
        });
        return false;
    });

    function clear() {
        get_kode();
        $('#tanggal').val('');
        $('#keterangan').val('');
        $('#person').val('');
        $('#person').select2().trigger('change');
        $('#faktur').val('');
        $('#faktur').select2().trigger('change');
        $('#nominal').val('');
        $('#id').val('');
    }
});
</script>