<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Tambah Suplier
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Suplier</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Tambah Suplier</a></li>
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
                    <i class="icon-truck"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Suplier Terdaftar
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
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Suplier</div>
        <!-- <div class="actions">
            <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
            <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
        </div> -->
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <span id="flash_message"></span>
        <form class="horizontal-form" name="data_form" id="data_form">
            <div class="form-body">
                <h3 class="form-section">Kode Suplier</h3>
                <div class="row">
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Klasifikasi</label>
                            <select name="classification" id="classification" class="form-control select2me">
                                <option value=""></option>
                                <option <?php echo "1" == @$suplier->classification ? 'selected' : '' ?> value="1">PT</option>
                                <option <?php echo "2" == @$suplier->classification ? 'selected' : '' ?> value="2">UD/CV</option>
                                <option <?php echo "3" == @$suplier->classification ? 'selected' : '' ?> value="3">Perorangan</option>
                            </select>
                            <span class="help-block">Harus diisi</span>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Kode</label>
                            <input value="<?php echo @$suplier->code; ?>" type="text" id="code" name="code" class="form-control" placeholder="kode" readonly>
                            <span class="help-block">Terisi otomatis</span>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <h3 class="form-section">Detail</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input value="<?php echo @$suplier->name; ?>" type="text" id="name" name="name" class="form-control" placeholder="nama">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Alamat</label>
                            <textarea id="address" name="address" class="form-control" rows="3"><?php echo @$suplier->address; ?></textarea>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Telephone</label>
                            <input value="<?php echo @$suplier->phone; ?>" type="text" id="phone" name="phone" class="form-control" placeholder="Phone" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Bank</label>
                            <input value="<?php echo @$suplier->bank_name; ?>" type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Bank">
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Akun Bank</label>
                            <input value="<?php echo @$suplier->bank_account; ?>" type="text" id="bank_account" name="bank_account" class="form-control" placeholder="Bank" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Payment</label>
                            <select id="payment" name="payment" class="form-control select2me">
                                <option <?php echo "cash" == @$suplier->payment ? 'selected' : '' ?> value="cash">Cash</option>
                                <option <?php echo "transfer" == @$suplier->payment ? 'selected' : '' ?> value="transfer">Transfer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Nama PIC</label>
                            <input value="<?php echo @$suplier->pic_name; ?>" type="text" id="pic_name" name="pic_name" class="form-control" placeholder="Nama PIC" onKeyPress="return goodchars(event,'qwertyuiopasdfghjklzxcvbnm \'',this)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Posisi PIC</label>
                            <input value="<?php echo @$suplier->pic_position; ?>" type="text" id="pic_position" name="pic_position" class="form-control" placeholder="Posisi PIC" onKeyPress="return goodchars(event,'qwertyuiopasdfghjklzxcvbnm \'',this)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Telephone PIC</label>
                            <input value="<?php echo @$suplier->pic_phone; ?>" type="text" id="pic_phone" name="pic_phone" class="form-control" placeholder="Telephone PIC" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Waktu Pendaftaran</label>
                            <input value="<?php echo @$suplier->registered; ?>" type="text" id="registered" name="registered" class="form-control date-picker" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Status</label>
                            <select id="status" name="status" class="form-control select2me">
                                <option <?php echo "1" == @$suplier->status ? 'selected' : '' ?> value="1">Aktif</option>
                                <option <?php echo "0" == @$suplier->status ? 'selected' : '' ?> value="0">Non-aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input value="<?php echo @$suplier->pic_email; ?>" type="email" id="pic_email" name="pic_email" class="form-control" placeholder="email">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions right">
                <input hidden value="<?php echo @$suplier->id; ?>" type="text" id="id" name="id" value="">
                <input hidden value="<?php echo @$suplier->urut; ?>" type="text" id="urut" name="urut" value="">
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
            data = msg.split('|');
            if(data[0]==1){
               clear();
            }
            $('#flash_message').html(data[1]);
            setTimeout(function(){$('#flash_message').html('');window.location = "<?php echo base_url($this->cname); ?>";},1500);
       }
   });
   return false;
});

$('#classification').change(function() {
   var classification = $('#classification').val();
   $.ajax({
       type: "POST",
       url: "<?php echo base_url($this->cname).'/get_code'; ?>",
       data: {
           classification: classification
       },
       success: function(msg) {
           data = msg.split("|");
           $('#code').val(data[1]);
           $('#urut').val(data[0]);
       }
   });
   return false;
});

function clear() {
   $('#classification').val('');
   $('#classification').select2().trigger('change');
   $('#code').val('');
   $('#name').val('');
   $('#phone').val('');
   $('#pic_phone').val('');
   $('#pic_position').val('');
   $('#pic_name').val('');
   $('#address').val('');
   $('#registered').val('');
   $('#status').val('');
   $('#status').select2().trigger('change');
   $('#pic_email').val('');
   $('#bank_account').val('');
   $('#bank_name').val('');
   $('#urut').val('');
   $('#payment').val('');
   $('#payment').select2().trigger('change');
}

function actCancel() {
   window.location = "<?php echo base_url($this->cname).'/data'; ?>";
}
$(function() {
   $("#registered").datepicker({
       dateFormat: "yy-mm-dd",
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