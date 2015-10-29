<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Data Bahan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Bahan</a><i class="icon-angle-right"></i></li>
         <li><a href="">Tambah Bahan</a></li>
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
               <i class="icon-barcode"></i>
            </div>
            
            <div class="tile-object">
               <div class="name">
                  Total Bahan Terdaftar
               </div>
               <div class="number">
                  
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
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Bahan</div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <span id="flash_message"></span>
            <form id="form-add" class="horizontal-form">
               <div class="form-body">
                  <!-- <h3 class="form-section">Kode Produk</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Gudang</label>
                           <?php echo form_dropdown('gudang_code', $gudang, @$opt, 'id="gudang_code" class="form-control select2me"'); ?>
                        
                        </div>
                     </div>
                  </div> -->
                  <!--/row--> 
                  <h3 class="form-section">Informasi Bahan</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Kode Bahan</label>
                           <input type="text" id="code" name="code" class="form-control" placeholder="Kode Bahan">
                           <input type="hidden" id="id" name="id">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Kategori Satuan</label>
                           <select id="unit" name="unit" class="select2me form-control" data-placeholder="Pilih Kategori Satuan">
                              <option value=""></option>
                              <?php foreach ($satuan->result() as $key => $value): ?>
                                 <option value="<?php echo $value->kategori; ?>"><?php echo $value->kategori; ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="control-label">Kategori Bahan</label>
                           <select id="category" name="category" class="select2me form-control" data-placeholder="Pilih Kategori Bahan">
                              <option value=""></option>
                              <option value="BJ">Bahan Jadi</option>
                              <option value="BSJ">Bahan Setengah Jadi</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Nama Bahan</label>
                           <input type="text" id="name" name="name" class="form-control" placeholder="Nama Bahan">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Stok Minimum dalam <span style="text-weight:bold" id="show_min_satuan"></span></label>
                           <input type="text" id="min" name="min" class="form-control" placeholder="Stok Minimum">
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
      var url = '<?php echo base_url($this->cname); ?>/ambil_data_produk';
      $.ajax({
         type: "POST",
         url: url,
         data: {id:uri},
         success: function(msg)
         {
            // alert(msg);
            data = JSON.parse(msg);
            $('#min').val(data.min);
            $('#unit').val(data.unit);
            $('#unit').select2().trigger('change');
            $('#code').val(data.code);
            $('#code').attr("readonly", true );
            $('#name').val(data.name);
            $('#id').val(data.id);
            $('#category').val(data.category);
            $('#category').select2().trigger('change');
         }
      });
      return false;
   }
}
function get_unit(){
   var url = '<?php echo base_url($this->cname); ?>/stat_satuan';
   $.ajax({
      type: "POST",
      url: url,
      data: {unit:$('#unit').val()},
      success: function(msg)
      {
         // alert(msg);
         if(msg){
            data = JSON.parse(msg);
            $('#show_min_satuan').html(data.nama);
         } else {
            $('#show_min_satuan').html('');
         }
      }
   });
   return false;
}
function clear () {
   $('#show_min_satuan').html('');
   $('#min').val('');
   $('#unit').val('');
   $('#unit').select2().trigger('change');
   $('#code').val('');
   $('#code').attr( "readonly", false );
   $('#name').val('');
   $('#id').val('');
}
$(document).ready(function(){
   begin();
   $('#form-add').submit(function(){
      var url = '<?php echo base_url($this->cname); ?>/input_produk';
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
            setTimeout(function(){
               $('#flash_message').html('');
               window.location = "<?php echo base_url($this->cname); ?>";
            },1500);
         }
      });
      return false;
   });
   $('#unit').on('change',function(){
      get_unit();
   });
});
</script>

