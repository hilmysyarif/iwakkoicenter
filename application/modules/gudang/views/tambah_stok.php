<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Tambah Stok
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Input Stok</a><i class="icon-angle-right"></i></li>
            <li><a href="">Tambah Stok</a></li>
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
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Stok Produk</div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <span id="flash_message"></span>
            <form id="form-add" class="horizontal-form">
               <div class="form-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Produk</label>
                           <?php echo form_dropdown('product_code', $product, @$opt, 'id="product_code" class="form-control select2me"'); ?>
                        
                        </div>
                     </div>
                     <!--/span-->
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Qty</label>
                           <input type="text" id="in" name="in" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)">
                        </div>
                     </div>
                     <!--/span-->
                  </div>
               </div>
               <div class="form-actions right">
                  <button type="reset" class="btn default">Cancel</button>
                  <button type="submit" class="btn blue"><i class="icon-plus"></i> Tambah Stok</button>
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
        $('#product_code').val(uri);
        $('#product_code').select2().trigger('change');
   }
}
$(document).ready(function(){
   begin();
   $('#form-add').submit(function(){
      var url = '<?php echo base_url($this->cname); ?>/tambah_stok';
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

   $('#product_code').on('change',function(){
      $('#in').val('');
   });

   function clear () {
      $('#product_code').val('');
      $('#product_code').select2().trigger('change');
      $('#in').val('');
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