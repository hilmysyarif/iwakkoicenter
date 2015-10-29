<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Data Gudang
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Gudang</a><i class="icon-angle-right"></i></li>
         <li><a href="">Tambah</a></li>
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
         <div class="tile double bg-yellow pull-right" style="cursor:default">
            <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
               <i><?php echo $count; ?></i>
            </div>
            <div class="tile-body pull-left">
               <i class="icon-barcode"></i>
            </div>
            
            <div class="tile-object">
               <div class="name">
                  Total Gudang Terdaftar
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
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Gudang</div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <span id="flash_message"></span>
            <form id="form-add" class="horizontal-form">
               <div class="form-body">
                  <h3 class="form-section">Informasi Gudang</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Kode Gudang</label>
                           <input type="text" id="kode" name="kode" class="form-control" >
                           <input type="hidden" id="id" name="id">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Nama Gudang</label>
                           <input type="text" id="nama" name="nama" class="form-control" >
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Keterangan</label>
                        <textarea type="text" id="keterangan" name="keterangan" class="form-control"></textarea>
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
            $('#kode').val(data.kode);
            $('#nama').val(data.nama);
            $('#keterangan').val(data.keterangan);
            $('#id').val(data.id);
         }
      });
      return false;
   }
}
$(document).ready(function(){
   begin();
   $('#form-add').submit(function(){
      var url = '<?php echo base_url($this->cname); ?>/tambah_rak';
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
      $('#kode').val('');
      $('#nama').val('');
      $('#keterangan').val('');
      $('#id').val('');
   }
});
</script>

