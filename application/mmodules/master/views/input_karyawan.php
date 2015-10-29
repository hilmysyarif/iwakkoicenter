<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Menu Karyawan
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="">Karyawan</a></li>
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
                        Daftar Karyawan
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
            <div style="width:141px !important;" class="tile bg-purple" onclick="window.location='<?php echo base_url($this->cname); ?>/gaji'">
                <div class="tile-body">
                    <i class="icon-dollar"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Daftar Penggajian
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
                    <i class="icon-group"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Karyawan Terdaftar
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
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Karyawan</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <span id="flash_message"></span>
        <form class="horizontal-form" name="data_form" id="data_form">
            <div class="form-body">
                <h3 class="form-section">Details Information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kode</label>
                            <input required value="<?php echo @$paramedik->code; ?>" type="text" id="code" name="code" class="form-control" placeholder="Kode" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">No. KTP</label>
                            <input required value="<?php echo @$paramedik->identification_number; ?>" type="text" id="identification_number" name="identification_number" class="form-control" placeholder="No. KTP" onKeyPress="return goodchars(event,'1234567890',this)">
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input required value="<?php echo @$paramedik->name; ?>" type="text" id="name" name="name" class="form-control" placeholder="nama lengkap">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tgl. Lahir</label>
                            <input required value="<?php echo @$paramedik->born_date; ?>" type="date" id="born_date" name="born_date" class="date-picker form-control" placeholder="tanggal lahir" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input required value="<?php echo @$paramedik->jabatan; ?>" type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Kategori Karyawan</label>
                            <select required id="category" name="category" class="form-control select2me">
                                <option value="">Pilih Status</option>
                                <option <?php echo "fulltime" == @$paramedik->category ? 'selected' : '' ?> value="fulltime">Full Time 8 Jam</option>
                                <option <?php echo "parttime" == @$paramedik->category ? 'selected' : '' ?> value="parttime">Part Time 4 Jam</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h3 class="form-section">Contact</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input required value="<?php echo @$paramedik->address; ?>" type="text" id="address" name="address" class="form-control" placeholder="alamat lengkap">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Telephone</label>
                            <input required value="<?php echo @$paramedik->phone; ?>" type="text" id="phone" name="phone" class="form-control" placeholder="No aktif" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input required value="<?php echo @$paramedik->email; ?>" type="text" id="email" name="email" class="form-control" placeholder="alamat email">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <h3 class="form-section">Register Status</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Registrasi</label>
                            <input required value="<?php if (@$paramedik->registered) {echo @$paramedik->registered;} else {echo date('Y-m-d'); } ?>" type="date" id="registered" name="registered" class="date-picker form-control" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                    </div>
                    <!--/span-->
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Expired</label>
                            <input required value="<?php if (@$paramedik->expired) {echo @$paramedik->expired;} else {echo date('Y-m-d',strtotime('+1 years')); } ?>" type="date" id="expired" name="expired" class="date-picker form-control" data-date-format="yyyy-mm-dd">
                        </div>
                    </div> -->
                    <!--/span-->
                </div>
                <h3 class="form-section">Data Gaji</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Gaji Pokok</label>
                            <div class="input-group">
                                <input required value="<?php echo @$paramedik->gaji; ?>" type="text" id="gaji" name="gaji" class="form-control" placeholder="Gaji Pokok" onKeyPress="return goodchars(event,'1234567890',this)">
                                <span class="input-group-addon">Rp.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions right">
                <input hidden value="<?php echo @$paramedik->id; ?>" type="text" id="id" name="id" value="">
                <input hidden value="<?php echo @$paramedik->no_urut; ?>" type="text" id="no_urut" name="no_urut" value="">
                <button onclick="actCancel()" type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>

<script type="text/javascript">
$('#data_form').submit(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url($this->cname).'/save'; ?>",
        data: $('#data_form').serialize(),
        success: function(msg) {
            data = msg.split("|");
            if (data[0] == 1) {
                clear();
            }
            // $("#flash_message").show();
            $("#flash_message").html(data[1]);
            setTimeout(function() {
                $("#flash_message").html('');
                window.location = "<?php echo base_url($this->cname); ?>";
            }, 1500);
            
        }
    });
    return false;
});

function clear() {
    $('#code').val('');
    $('#identification_number').val('');
    $('#name').val('');
    $('#born_date').val('');
    $('#address').val('');
    $('#phone').val('');
    $('#jabatan').val('');
    $('#email').val('');
    $('#registered').val('');
    $('#email').val('');
    $('#gaji').val('');
    $('#bonus').val('');
    $('#id').val('');
    $('#no_urut').val('');
    $('#category').val('');
    $('#category').select2().trigger('change');
}

function actCancel() {
    window.location = "<?php echo base_url($this->cname).'/data'; ?>";
}

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