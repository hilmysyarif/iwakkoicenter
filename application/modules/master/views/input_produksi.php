<div class="row">
 <div class="col-md-12">
  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
  <h3 class="page-title">
   Menu Produksi
 </h3>
 <ul class="page-breadcrumb breadcrumb">
   <li>
    <i class="icon-home"></i>
    <a href="<?php echo base_url();?>dashboard">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
  <li><a href="">Produksi</a></li>
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
    <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Jumlah Produksi</div>
  </div>
  <div class="portlet-body form">
    <!-- BEGIN FORM-->
    <div class="sukses" ></div>
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
                   <div class="row">

                     <div class="col-md-6">
                      <div class="form-group">
                       <label>Nama Produk</label>
                       <select class="form-control select2" required name="produk" data-placeholder="Pilih Kategori" required>

                        <?php 

                        $get = $this->db->get('view_menu');
                        $hasil_get = $get->result_array();

                        foreach ($hasil_get as $item) {
                         ?>                

                         <option value="<?php echo $item['id'];?>" ><?php echo $item['nama'];?></option>

                         <?php } ?>
                       </select>
                     </div><!-- /.form-group -->
                     <div class="form-group">
                       <label class="control-label">Jumlah Produksi <span style="text-weight:bold" id="show_min_satuan"></span></label>
                       <input type="number" required id="min" name="jumlah" class="form-control" placeholder="jumlah produksi">
                     </div>
                     <div class="form-group">
                      <label class="control-label">Tanggal</label>
                      <input required value="<?php echo date('Y-m-d'); ?>" type="date" id="tanggal" name="tanggal" class="date-picker form-control" data-date-format="yyyy-mm-dd" readonly>                            
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="form-actions right">               
                <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
              </div>
            </form>
            <!-- END FORM--> 
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
     $(document).ready(function(){

      $('#form-add').submit(function(){
       $.ajax( {  
        type :"post",  
        url : "<?php echo base_url() . 'master/produksi/simpan_tambah' ?>",  
        cache :false,  
        data :$(this).serialize(),
        success : function(data) {  
          $(".sukses").html(data);   
          setTimeout(function(){$('.sukses').html('');window.location = "<?php echo base_url() . 'master/produksi/data' ?>";},500);              
        },  
        error : function() {  
          alert("Data gagal dimasukkan.");  
        }  
      });
       return false;       
     });

    });
   </script>

