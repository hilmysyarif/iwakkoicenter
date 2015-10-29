<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Tambah Pengguna
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Pengguna</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Tambah Pengguna</a></li>
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
            <div class="tile double bg-yellow pull-right" style="cursor:default">
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
                    <i><?php echo $count; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-user"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Pengguna Terdaftar
                    </div>
                    <div class="number">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Pengguna</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <span id="flash_message"></span>
        <form class="horizontal-form" name="data_form" id="data_form">
            <div class="form-body">
                <h3 class="form-section">Account</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input required value="<?php echo @$karyawan->uname; ?>" type="text" id="uname" name="uname" class="form-control" placeholder="username">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input required value="<?php echo @paramDecrypt($karyawan->upass); ?>" type="password" id="upass" name="upass" class="form-control" placeholder="pwd">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >NIK - Nama</label>
                            <!-- <input type="text" name="nama" id="nama" value="<?php echo @$karyawan->nama; ?>" hidden> -->
                            <select onchange="generate()" id="id_karyawan" name="code" class="form-control select2me">
                                <option value="">Pilih Karyawan</option>
                                <?php foreach ($_opt_karyawan as $key => $value): ?>                                    
                                <option value="<?php echo $value->code ?>"><?php echo $value->code.' - '.$value->name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input readonly required value="<?php echo @$karyawan->nama; ?>" type="text" id="nama" name="nama" class="form-control" placeholder="nama">
                        </div>
                    </div>
                    <!--/span-->                    
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">No. KTP</label>
                            <input readonly required value="<?php echo @$karyawan->no_ktp; ?>" type="text" id="no_ktp" name="no_ktp" class="form-control" placeholder="KTP" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input required value="<?php echo @$karyawan->tgl_lahir; ?>" type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                    </div>
                    <!--/span-->
                   <!--  <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Gaji</label>
                            <input required value="<?php echo @$karyawan->gaji; ?>" type="text" id="gaji" name="gaji" class="form-control" placeholder="Gaji" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div> -->
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Hak Akses</label>
                            <?php echo form_dropdown('group', $posisi, @$opt, 'id="group" class="form-control select2me"'); ?>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Status</label>
                            <select required id="status" name="status" class="form-control select2me">
                                <option value="">Pilih Status</option>
                                <option <?php echo "1" == @$karyawan->status ? 'selected' : '' ?> value="1">Aktif</option>
                                <option <?php echo "0" == @$karyawan->status ? 'selected' : '' ?> value="0">Non-aktif</option>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Hak Memberikan Compliment</label>
                            <select required id="compliment" name="compliment" class="form-control select2me">
                                <option value="">Pilih Status Compliment</option>
                                <option <?php echo "1" == @$karyawan->compliment ? 'selected' : '' ?> value="1">Berhak</option>
                                <option <?php echo "0" == @$karyawan->compliment ? 'selected' : '' ?> value="0">Tidak Berhak</option>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="form-section">Contact</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input readonly required value="<?php echo @$karyawan->alamat; ?>" type="text" id="alamat" name="alamat" class="form-control" placeholder="alamat lengkap">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Telephone</label>
                            <input readonly required value="<?php echo @$karyawan->telp; ?>" type="text" id="telp" name="telp" class="form-control" placeholder="No aktif" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input readonly value="<?php echo @$karyawan->email; ?>" type="email" id="email" name="email" class="form-control" placeholder="account@host.com">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
            </div>
            <div class="form-actions right">
                <input hidden value="<?php echo @$karyawan->group; ?>" type="text" id="xxx">
                <input hidden value="<?php echo @$karyawan->nik; ?>" type="text" id="yyy">
                <input hidden value="<?php echo @$karyawan->id; ?>" type="text" id="id" name="id">
                <button onclick="actCancel()" type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>

<script type="text/javascript">
function begin(){
   var jabatan = $("#xxx").val();
   $("#group").val(jabatan);
   var nik = $("#yyy").val();
   $("#id_karyawan").val(nik);
}

$(document).ready(function(){
   begin();
});

function generate() {
    var id = $('#id_karyawan').val();
    var url = '<?php echo base_url($this->cname); ?>/get_detail';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id
        },
        success: function(msg) {
            data = msg.split('|');
            $('#nama').val(data[0]);
            $('#no_ktp').val(data[1]);
            $('#tgl_lahir').val(data[2]);
            $('#alamat').val(data[3]);
            $('#telp').val(data[4]);
            $('#email').val(data[5]);
        }
    });
    return false;
}

$('#data_form').submit(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url($this->cname).'/save'; ?>",
        data: $('#data_form').serialize(),
        success: function(msg) {
            data = msg.split('|');
            if(data[0]==1){
               clear();
            }
            $('#flash_message').html(data[1]);
            setTimeout(function(){
                $('#flash_message').html('');
                window.location = "<?php echo base_url($this->cname); ?>";
            },1500);
        }
    });
    return false;
});

function clear() {
    $('#tgl_lahir').val('');
    $('#no_ktp').val('');
    $('#nama').val('');
    $('#compliment').val('');
    $('#compliment').select2().trigger('change');
    $('#alamat').val('');
    $('#telp').val('');
    $('#group').val('');
    $('#email').val('');
    $('#uname').val('');
    $('#upass').val('');
    $('#status').val('');
    $('#status').select2().trigger('change');
    $('#posisi').val('');
    $('#group').select2().trigger('change');
    $('#gaji').val('');
    $('#xxx').val('');
}

function actCancel() {
    window.location = "<?php echo base_url($this->cname).'/data'; ?>";
}

$(function() {
    $("#registered").datepicker({
        dateFormat: "yyyy-mm-dd",
        changeMonth: true,
        changeYear: true
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