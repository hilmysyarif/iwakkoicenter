<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Validasi Kasir
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Validasi</a><i class="icon-angle-right"></i></li>
         <li><a href="">Kasir</a></li>
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
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp;Data Transaksi Kasir</div>
                <!-- <div class="actions">
                    <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
                    <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
                </div> -->
            </div>
            <div class="portlet-body">
                <h3 class="form-section">Data</h3>
            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Cash Draw</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo $kasir[0]->cashdraw_no;?>" readonly>
            	   		</div>
            	   	</div>
            	</div>
            	   <!--/span-->
            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Kas Awal</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo format_rupiah($kasir[0]->start_cash); ?>" readonly>
            	   		</div>
            	   	</div>
            	</div>

            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Kas Akhir</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo format_rupiah($kasir[0]->end_cash); ?>" readonly>
            	   		</div>
            	   	</div>
            	</div>
            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Omset</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo format_rupiah($kasir[0]->omset); ?>" readonly>
            	   		</div>
            	   	</div>
            	</div>
            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Total Kas</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo format_rupiah($kasir[0]->total_cash); ?>" readonly>
            	   		</div>
            	   	</div>
            	</div>
               <div class="row">
                  <div class="col-md-2">
                     <div class="form-group">
                        <label class="control-label">Selisih</label>
                     </div>
                  </div>
                  <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" class="form-control" value="<?php $selisih = $kasir[0]->end_cash - $kasir[0]->total_cash; if($selisih > 0) echo 'lebih '.format_rupiah(abs($selisih)); else if($selisih < 0) echo 'kurang '.format_rupiah(abs($selisih)); else echo format_rupiah(0); ?>" readonly>
                        </div>
                     </div>
               </div>
            	<h3 class="form-section">Detail</h3>
            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Operator</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo $kasir[0]->operator;?>" readonly>
            	   		</div>
            	   	</div>
            	</div>
            	   <!--/span-->
            	<div class="row">
            	   <div class="col-md-2">
            	      <div class="form-group">
            	         <label class="control-label">Tanggal</label>
            	      </div>
            	   </div>
            	   <div class="col-md-4">
            	   	   <div class="form-group">
            	   			<input type="text" class="form-control" value="<?php echo tanggalIndo($kasir[0]->date); ?>" readonly>
            	   		</div>
            	   	</div>
            	</div>

            	<div class="form-group">
            		<button onclick="window.location='<?php echo base_url($this->module); ?>/kasir'" type="button" class="btn default">Kembali</button>
            	</div>

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>