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
        Tambah Gaji
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->module); ?>/payroll">Penggajian</a><i class="icon-angle-right"></i></li>
            <!-- <li><a href="<?php echo base_url($this->cname); ?>">Menu Kasbon</a><i class="icon-angle-right"></i></li> -->
            <li><a href="">Pemberian Gaji</a></li>
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Pemberian Gaji</div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <span id="flash_message"></span>
                <form id="form-add" class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Informasi Transaksi</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Karyawan</label>
                                    <select name="employee_code" id="employee_code" class="form-control select2me">
                                        <?php echo $opt_karyawan; ?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                    <input type="text" id="date_show" name="date_show" value="<?php echo tanggalIndo(date('Y-m-d')); ?>" class="form-control" readonly>
                                    <input type="hidden" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="hidden" id="code" name="code">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <h3 class="form-section">Penerimaan</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Gaji Pokok</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" id="gaji_pokok" name="gaji_pokok" value="0" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Bonus</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" id="bonus" name="bonus" value="0" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Pendapatan Lain</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" id="tunjangan_lain" name="tunjangan_lain" value="0" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="form-section">Potongan</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Pembayaran Hutang (Kasbon)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" id="hutang" name="hutang" value="0" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Potongan Lain</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" id="potongan_lain" name="potongan_lain" value="0" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="reset" class="btn default">Cancel</button>
                            <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function begin(){
    var url = "<?php echo base_url($this->cname); ?>/ambil_data";
    var uri = "<?php echo $this->uri->segment(4); ?>";
    if(uri){
        $.ajax({
            type: "POST",
            url: url,
            data: {id: uri},
            success: function(msg){
                // alert(msg);
                data = JSON.parse(msg);
                $('#id').val(data.id);
                $('#employee_code').val(data.employee_code);
                $('#employee_code').select2().trigger('change');
                $('#date').val(data.date);
                $('#date_show').val(data.date_show);
                $('#id').val(data.id);
                $('#code').val(data.code);
                $('#gaji_pokok').val(data.gaji_pokok);
                $('#bonus').val(data.bonus);
                $('#tunjangan_lain').val(data.tunjangan_lain);
                $('#hutang').val(data.hutang);
                $('#potongan_lain').val(data.potongan_lain);
            }
        });
    }
    return false;
}
function clear(){
    $('#employee_code').val('');
    $('#employee_code').select2().trigger('change');
    $('#id').val('');
    $('#code').val('');
    $('#gaji_pokok').val('0');
    $('#bonus').val('0');
    $('#tunjangan_lain').val('0');
    $('#hutang').val('0');
    $('#potongan_lain ').val('0');
}
$(document).ready(function(){
    begin();
    $('#employee_code').on('change',function(){
        var url = "<?php echo base_url($this->cname); ?>/get_data_employee";
        var id = $('#id').val();
        $.ajax({
            type: "POST",
            url: url,
            data: {code:$('#employee_code').val()},
            success: function(msg){
                // alert(msg);
                data = JSON.parse(msg);
                $('#code').val(data.code);
                $('#gaji_pokok').val(data.gaji_pokok);
                if(!id){
                    $('#hutang').val(data.hutang);
                }
            }
        });
        return false;
    });
    $('#form-add').submit(function(){
        var url = "<?php echo base_url($this->cname); ?>/input_gaji";
        $.ajax({
            type: "POST",
            url: url,
            data: $('#form-add').serialize(),
            success: function(msg){
                // alert(msg);
                data = msg.split('|');
                if(data[0]==1){
                    clear();
                }
                $('#flash_message').html(data[1]);
                setTimeout(function(){$('#flash_message').html('');},3000);
            }
        });
        return false;
    });
});
</script>