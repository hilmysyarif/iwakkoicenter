<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Detail Suplier
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Suplier</a><i class="icon-angle-right"></i></li>
         <li><a href="#">Detail Suplier</a></li>
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
<div class="portlet box blue">
   <div class="portlet-title">
      <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Detail Suplier</div>
      <!-- <div class="actions">
         <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
         <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
      </div> -->
   </div>
     <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal" role="form">
           <div class="form-body">
              <h3 class="form-section">Kode Suplier</h3>
              <div class="row">
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Klasifikasi:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php if (@$suplier->classification == 1) {echo 'PT';} elseif (@$suplier->classification == 2) {echo 'UD/CV';} elseif (@$suplier->classification == 3) {echo 'Perorangan';}?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
              <!--/row-->
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Kode:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->code; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>                
              <h3 class="form-section">Detail</h3>
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Nama:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->name; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Alamat:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->address; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
              <!--/row-->  
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Telephone:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->phone; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Nama Bank:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->bank_name; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
              <!--/row-->           
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Akun Bank:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->bank_account; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Payment:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->payment; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
              <!--/row-->           
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Nama PIC:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->pic_name; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Posisi PIC:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->pic_position; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
              <!--/row-->           
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Telephone PIC:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->pic_phone; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Pendaftaran:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->registered; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
              <!--/row-->           
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Status:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->status == 1 ? 'aktif' : 'non aktif'; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
                 <div class="col-md-6">
                    <div class="form-group">
                       <label class="control-label col-md-3">Email PIC:</label>
                       <div class="col-md-9">
                          <p class="form-control-static"><?php echo @$suplier->pic_email; ?></p>
                       </div>
                    </div>
                 </div>
                 <!--/span-->
              </div>
           </div>
           <div class="form-actions fluid">
              <div class="row">
                 <div class="col-md-6">
                    <div class="col-md-offset-3 col-md-9">
                       <button onclick="actEdit()" type="button" class="btn green"><i class="icon-pencil"></i> Edit</button>
                       <button onclick="actCancel()" type="button" class="btn default">Cancel</button>                              
                    </div>
                 </div>
                 <div class="col-md-6">
                 </div>
              </div>
           </div>
        </form>
        <!-- END FORM-->  
     </div>
</div>

<script type="text/javascript">
   
    function actCancel()
    {
        window.location="<?php echo base_url($this->cname).'/data'; ?>";
    }
    function actEdit()
    {
        window.location="<?php echo base_url($this->cname).'/tambah/'.$suplier->id; ?>";
    }

</script>