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
        Klaim Debet
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->module); ?>/payroll">Klaim</a><i class="icon-angle-right"></i></li>
            <!-- <li><a href="<?php echo base_url($this->cname); ?>">Menu Kasbon</a><i class="icon-angle-right"></i></li> -->
            <li><a href="">Klaim Debet</a></li>
            <li class="pull-right">
                <div style="display:block; background-color:#e02222; color:#fff; margin-right:-30px; padding:10px; top:-10px; position:relative">
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
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Klaim Debet</div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <span id="flash_message"></span>
                <form id="form-add" class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Informasi Transaksi</h3>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" placeholder="tgl awal" name="tgl_awal" id="tgl_awal">
                                    <span class="input-group-addon">S/d</span>
                                    <input type="text" class="form-control" placeholder="tgl akhir" name="tgl_akhir" id="tgl_akhir">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label  class="col-md-2 control-label">Bank</label>
                                <div class="col-md-4">
                                    <select name="bank" id="bank" class="form-control" data-placeholder="Pilih Bank...">
                                       <option selected="selected" value="">Pilih Bank...</option>
                                       <option value="all">Semua Bank</option>
                                       <option value="Mandiri">Bank Mandiri</option>
                                       <option value="BNI">Bank BNI</option>
                                       <option value="BCA">Bank BCA</option>
                                       <option value="Danamon">Bank Danamon</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="button" onclick="preview_debet()" class="btn blue"><i class="icon-search"></i> Preview</button>
                        <button id="btn_sub" type="submit" class="btn green" style="display:none"><i class="icon-ok"></i> Proses Klaim</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="portlet-body" id="panel_debet">
                <div class="table-responsive">
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th style="text-align:center;">Nama Bank</th>
                                <th style="text-align:center;">Sejumlah</th>
                                <th style="text-align:center;">Status</th>
                            </tr>
                        </thead>
                        <tbody id="daftar_list_debet">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function preview_debet(){
    var tgl_awal = $('#tgl_awal').val();
    var tgl_akhir = $('#tgl_akhir').val();
    var debet = 'no';
    var bank = $('#bank').val();
    var url = "<?php echo base_url($this->cname);?>/table_debet";

    $.ajax({
        type: "POST",
        url: url,
        data: {tgl_awal:tgl_awal,tgl_akhir:tgl_akhir, debet:debet, bank:bank},
        success: function(msg) {
            // alert(msg);
            $('#print').show();
            $('#panel_debet').show();
            $('#daftar_list_debet').html(msg);
            $('#btn_sub').show();
        }
    });
}
$(document).ready(function(){
    $('#form-add').submit(function(){
        var url = "<?php echo base_url($this->cname); ?>/proses_claim";
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
    function clear() {
        $('#tgl_awal').val('');
        $('#tgl_akhir').val('');
        $('#daftar_list_debet').html('');
        $('#bank').val('');
        $('#bank').select2().trigger('change');
    }
});
</script>