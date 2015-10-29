<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Tambah Meja
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Meja</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Tambah Meja</a></li>
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
                    <i><?php echo  $count->qty.' / '.$count->jml; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <!-- <i class="icon-user"></i> -->
                    <img style="margin-top:5px; margin-left:0px; height:60px; width:auto;" src="<?php echo base_url('assets/image/kosong.png');?>" >
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Meja / Kategori Meja Terdaftar
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
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Meja</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <span id="flash_message"></span>
        <form class="horizontal-form" name="data_form" id="data_form">
            <div class="form-body">                
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Code</label>
                            <input required value="<?php echo @$c_meja->code; ?>" type="text" id="code" name="code" class="form-control" placeholder="Kode Kategori Meja">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Kategori</label>
                            <input required value="<?php echo @$c_meja->nama; ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jumlah Meja</label>
                            <input value="<?php echo @$c_meja->qty; ?>" type="text" id="qty" name="qty" class="form-control" placeholder="Jumlah Meja dalam Kategori" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
            </div>
            <div class="form-actions right">
                <input hidden value="<?php echo @$c_meja->id; ?>" type="text" id="id" name="id">
                <button onclick="actCancel()" type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
   begin();
});

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
    $('#qty').val('');
    $('#code').val('');
    $('#nama').val('');
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