<script language="javascript">
function getkey(e)
{
    if (window.event)
       return window.event.keyCode;
    else if (e)
       return e.which;
    else
       return null;
}

function goodchars(e, goods, field)
{
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
    if ( key==null || key==0 || key==8 || key==9 || key==27 )
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

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Bayar Hutang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Hutang</a><i class="icon-angle-right"></i></li>
            <!-- <li><a href="<?php echo base_url($this->cname); ?>">Menu Kasbon</a><i class="icon-angle-right"></i></li> -->
            <li><a href="<?php echo base_url($this->cname); ?>/tambah">Bayar Hutang</a></li>
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
            <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/catat'">
                <div class="tile-body">
                    <i class="icon-plus-sign"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Catat
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
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
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Bayar</div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <span id="flash_message"></span>
                <form id="form-add" class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Bayar Hutang <span class="pull-right">Hutang Belum Terbayar:: <span id="sisa" style="font-weight:bold">Rp. 0,00</span></span></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Referensi No</label>
                                    <input type="hidden" value="HTG" id="kode" name="kode" class="form-control">
                                    <input type="hidden" id="urut" name="urut" class="form-control">
                                    <input type="text" id="no_referensi" name="no_referensi" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Pembayaran</label>
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="tanggal" name="tanggal" class="date-picker form-control" placeholder="Tanggal" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Suplier</label>
                                    <?php echo form_dropdown('suplier', $suplier, @$opt, 'id="suplier" class="form-control select2me" data-placeholder="Pilih Suplier"'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jumlah Pembayaran Hutang</label>
                                    <input id="nominal" name="nominal" class="form-control" placeholder="ex. ketikkan 100000 untuk Rp. 100.000,-">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function get_kode() {
    var url = '<?php echo base_url($this->cname); ?>/gen_kode';
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
    $('#suplier').val(uri);
    $('#suplier').select2().trigger('change');
    get_saldo();
}

// function get_data(Object){
//     var url = "<?php echo base_url($this->cname); ?>/get_data";
//     var form_data = {
//         reference: Object
//     };
//     $.ajax({
//         type: "POST",
//         url: url,
//         data: form_data,
//         success: function(msg) {
//             if(msg){
//                 data = JSON.parse(msg);
//                 $('#person').val(data.person);
//                 $('#person').select2().trigger('change');
//                 get_faktur(msg);
//             }
//         }
//     });
//     return false;
// }
// function get_faktur(Object){
//     if(Object){
//         data = JSON.parse(Object);
//         var person = data.person;
//         var reference = data.no_referensi;
//     } else {
//         var person = $('#person').val();
//     }
//     var url = "<?php echo base_url($this->cname); ?>/faktur";
//     var form_data = {
//         person: person
//     };
//     $.ajax({
//         type: "POST",
//         url: url,
//         data: form_data,
//         success: function(msg) {
//             $('#faktur').html(msg);
//             if(Object){
//                 $('#faktur').val(reference);
//                 $('#faktur').select2().trigger('change');
//                 get_saldo(reference);
//             }
//         }
//     });
//     return false;
// }
function get_saldo() {
    var url = "<?php echo base_url($this->cname); ?>/saldo";
    var form_data = {
        person: $('#suplier').val()
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg) {
            // alert(msg);
            if(msg){
                data = JSON.parse(msg);
                $("#sisa").html(data.saldo_show);
            } else {
                $("#sisa").html('Rp. 0,00');
            }
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
    $("#suplier").change(function(evt) {
        get_saldo();
    });
    // $("#faktur").change(function(evt) {
    //     get_saldo();
    // });
    $('#form-add').submit(function() {
        var url = '<?php echo base_url($this->cname); ?>/input_hutang_bayar';
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
                }, 1500);
                setTimeout(function() {
                    window.location = 'daftar'
                }, 2000);
            }
        });
        return false;
    });

    function clear() {
        get_kode();
        // $('#tanggal').val('');
        // $('#keterangan').val('');
        $('#karyawan').val('');
        $('#karyawan').select2().trigger('change');
        // $('#faktur').val('');
        // $('#faktur').select2().trigger('change');
        $('#nominal').val('');
        $('#sisa').html('Rp. 0,00');
    }
});
</script>