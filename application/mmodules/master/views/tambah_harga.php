<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Setup Produk
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Produk</a><i class="icon-angle-right"></i></li>
         <li><a href="">Setup Produk</a></li>
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
         <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/tambah_harga'">
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
         <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/harga'">
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
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Produk/Layanan</div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <span id="flash_message"></span>
            <form id="form-add" class="horizontal-form">
               <div class="form-body">
                  <h3 class="form-section">Kode Produk</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Produk</label>
                              <?php echo form_dropdown('code', $produk, @$opt, 'id="code" class="form-control select2me"'); ?>
                              
                        </div>
                     </div>
                  </div>
                  <h3 class="form-section">Setup Produk</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Harga Jual</label>
                           <div class="input-group">
                              <span class="input-group-addon">Rp.</span>
                              <input type="text" value="1" id="price1" name="price1" class="form-control" value="0" onKeyPress="return goodchars(event,'1234567890',this)">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Diskon</label>
                           <div class="input-group">
                              <input type="text" id="discount" name="discount" class="form-control" value="0" onKeyPress="return goodchars(event,'1234567890',this)">
                              <span class="input-group-addon">%</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >HPP</label>
                           <div class="input-group">
                              <span class="input-group-addon">Rp.</span>
                              <input type="text" id="price" name="price" class="form-control" value="0" onKeyPress="return goodchars(event,'1234567890',this)">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Pajak</label>
                           <div class="input-group">
                              <input type="text" id="tax" name="tax" class="form-control" value="0" onKeyPress="return goodchars(event,'1234567890',this)">
                              <span class="input-group-addon">%</span>
                           </div>
                           <input type="hidden" id="id" name="id">
                        </div>
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
<script type="text/javascript">
function begin(){
   var uri = '<?php echo $this->uri->segment(4); ?>';
   if(uri){
      var url = '<?php echo base_url($this->cname); ?>/ambil_data';
      $.ajax({
         type: "POST",
         url: url,
         data: {id:uri},
         success: function(msg)
         {
            // alert(msg);
            data = JSON.parse(msg);
            $('#code').val(data.code);
            $('#code').select2().trigger('change');
            $('#price1').val(data.price1);
            $('#discount').val(data.discount);
            $('#price').val(data.price);
            $('#tax').val(data.tax);
            $('#id').val(data.id);
         }
      });
      return false;
   }
}
$(document).ready(function(){
   begin();
   $('#code').on('change',function(){
      var code = $('#code').val();
      var url = '<?php echo base_url($this->cname); ?>/get_data';
      $.ajax({
         type: "POST",
         url: url,
         data: {code:code},
         success: function(msg)
         {
            if (msg == '"nope"') {
               $('#price1').val('0');
               $('#discount').val('0');
               $('#price').val('0');
               $('#tax').val('0');
               $('#id').val('');
            } else {
               data = JSON.parse(msg);
               $('#price1').val(data.price1);
               $('#discount').val(data.discount);
               $('#price').val(data.price);
               $('#tax').val(data.tax);
               $('#id').val(data.id);               
            }
         }
      });
      return false;
   });
   $('#form-add').submit(function(){
      var url = '<?php echo base_url($this->cname); ?>/input_harga';
      $.ajax({
         type: "POST",
         url: url,
         data: $('#form-add').serialize(),
         success: function(msg)
         {
            data = msg.split('|');
            if(data[0]==1){
               clear();
            }
            $('#flash_message').html(data[1]);
            setTimeout(function(){$('#flash_message').html('')},3000);
         }
      });
      return false;
   });
   function clear () {
      $('#code').val('');
      $('#code').select2().trigger('change');
      $('#price1').val('0');
      $('#discount').val('0');
      $('#price').val('0');
      $('#tax').val('0');
      $('#id').val('');
   }
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

