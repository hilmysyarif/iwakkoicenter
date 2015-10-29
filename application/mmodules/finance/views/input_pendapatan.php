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
        Pendapatan Non Transaksi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Pendapatan Non Transaksi</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>/tambah">Catat Pendapatan</a></li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:#ffffff; height:155px">
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
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Catat Pendapatan</div>
            </div>
            <div class="portlet-body form">
                <span id="flash_message"></span>
                <form id="form-add" class="horizontal-form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Referensi No</label>
                                    <input type="hidden" value="PD" id="kode" name="kode" class="form-control">
                                    <input type="hidden" id="urut" name="urut" class="form-control">
                                    <input type="text" id="no_referensi" name="no_referensi" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Catat</label>
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="tanggal" name="tanggal" class="date-picker form-control" placeholder="Tanggal" data-date-format="yyyy-mm-dd">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <textarea id="keterangan" name="keterangan" class="form-control" style="height:110px" placeholder="Keterangan biaya"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Akun Kas</label>
                                    <select id="akun_kas" name="akun_kas" class="form-control select2me" data-placeholder="Pilih Akun Kas">
                                        <option value=""></option>
                                        <option value="110000">Kas Di Tangan</option>
                                        <option value="120000">Kas Di Bank</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label">Jenis Pengeluaran</label>
                                    <select id="jenis_pengeluaran" name="jenis_pengeluaran" class="form-control select2me" data-placeholder="Pilih Jenis Pengeluaran">
                                        <option value=""></option>
                                        <option value="6">BIAYA OPERASIONAL</option>
                                        <option value="7">BY UMUM & ADMINISTRASI</option>
                                        <option value="8">BIAYA LAIN-LAIN</option>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="control-label">Akun Biaya</label>
                                    <select id="akun_biaya" name="akun_biaya" class="form-control select2me" data-placeholder="Pilih Akun Biaya"></select>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label">Pendapatan Sebesar</label>
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
function begin() {
    gen_code();
}
function gen_code() {
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
            $("#urut").val(data.order);
        }
    });
    return false;
}

$(document).ready(function() {
    begin();
    // $('#jenis_pengeluaran').on('change', function() {
    //     var url = '<?php echo base_url($this->cname); ?>/opt_akun_biaya';
    //     $.ajax({
    //         type: "POST",
    //         url: url,
    //         data: {
    //             code: $('#jenis_pengeluaran').val()
    //         },
    //         success: function(msg) {
    //             if (msg) {
    //                 $('#akun_biaya').html(msg);
    //                 $('#akun_biaya').select2().trigger('change');
    //             }
    //         }
    //     });
    //     return false;
    // });
    $('#tanggal').on('change', function() {
        gen_code();
    });
    $('#form-add').submit(function() {
        var url = '<?php echo base_url($this->cname); ?>/input_transaksi';
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
            }
        });
        return false;
    });
    function clear() {
        $('#keterangan').val('');
        $('#akun_kas').val('');
        $('#akun_kas').select2().trigger('change');
        // $('#jenis_pengeluaran').val('');
        // $('#jenis_pengeluaran').select2().trigger('change');
        // $('#akun_biaya').val('');
        // $('#akun_biaya').select2().trigger('change');
        $('#nominal').val('');
        gen_code();
    }
});
</script>

