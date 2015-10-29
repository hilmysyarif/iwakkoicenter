<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Menu Piutang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->module); ?>/piutang">Piutang</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Menu Piutang</a></li>
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
            <div class="tile bg-red" onclick="window.location='<?php echo base_url($this->cname); ?>/bayar'">
                <div class="tile-body">
                    <i class="icon-plus-sign"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Bayar
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/daftar'">
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
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah</div>
            <!-- <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               <a href="#portlet-config" data-toggle="modal" class="config"></a>
               <a href="javascript:;" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div> -->
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <span id="flash_message"></span>
            <form id="form-add" class="horizontal-form">
               <div class="form-body">
                  <h3 class="form-section">Catat Piutang</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Referensi No</label>
                           <input type="hidden" id="kode" name="kode" class="form-control" readonly>
                           <input type="text" id="no_referensi" name="no_referensi" class="form-control" readonly>
                           <br>
                           <label class="control-label">Tanggal</label>
                           <input type="date" id="tanggal" name="tanggal" class="date-picker form-control" placeholder="Tanggal" data-date-format="yyyy-mm-dd" readonly>
                           <br>
                           <label class="control-label">Keterangan</label>
                           <input type="text" id="keterangan" name="keterangan" class="form-control">
                           <!-- <select name="type" id="type" class="form-control">
                              <option value="">Pilih Kategori</option>
                              <option value="P">Antibiotik 1</option>
                              <option value="S">Antibiotik 2</option>
                           </select> -->
                        </div>
                     </div>
                     <!--/span-->
                     <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Pelanggan</label>
                          <?php echo form_dropdown('person', $sup, @$opt, 'id="person" class="form-control select2me"'); ?>
                          <br><br>
                           <label class="control-label">Faktur</label>
                           <input type="text" id="faktur" name="faktur" class="form-control">
                           <br>
                           <label class="control-label">Jumlah Hutang</label>
                           <input type="text" id="nominal" name="nominal" class="form-control">
                           <!-- <input type="hidden" id="order" name="order"> -->
                           <input type="hidden" id="id" name="id">
                        </div>
                     </div>
                     <!--/span-->
                  </div>
                  <!--/row--> 
                  <!-- <h3 class="form-section">Informasi Produk</h3>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="form-group">
                           <label >Nama</label>
                           <input type="text" id="name" name="name" class="form-control">
                        </div>
                     </div>
                  </div>
                   <div class="row">
                     <div class="col-md-12 ">
                        <div class="form-group">
                           <label >Keterangan</label>
                           <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
               </div> -->
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
            $('#no_referensi').val(data.no_referensi);
            $('#kode').val(data.kode);
            $('#tanggal').val(data.tanggal);
            $('#keterangan').val(data.keterangan);
            $('#person').val(data.person);
            $('#person').select2().trigger('change');
            $('#faktur').val(data.faktur);
            $('#nominal').val(data.debit);
            $('#id').val(data.id);
         }
      });
      return false;
   }
}

function get_kode(){
var url = '<?php echo base_url($this->cname); ?>/gen_kode';
  $.ajax({
    type: "POST",
    url: url,
    success: function(msg)
    {
      // alert(msg);
      data = JSON.parse(msg);
      $("#kode").val(data.kode);
      $("#no_referensi").val(data.urut);
    }
  });
  return false;
}


$(document).ready(function(){
   get_kode();
   begin();
   $('#form-add').submit(function(){
      var url = '<?php echo base_url($this->cname); ?>/input_transaksi';
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
   function clear ()
   {
      get_kode();
      $('#tanggal').val('');
      $('#keterangan').val('');
      $('#person').val('');
      $('#person').select2().trigger('change');
      $('#faktur').val('');
      $('#nominal').val('');
      $('#id').val('');
   }
});
</script>