<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Detail Pembelian
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Pembelian</a><i class="icon-angle-right"></i></li>
         <li><a href="#">Detail Pembelian</a></li>
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
      <div class="tiles" style="padding:10px; margin-right:0px; background-color:#eee; height:155px">
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
            <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:24px; font-family:arial; font-weight:bold">
               <i><?php echo $count; ?></i>
            </div>
            <div class="tile-body pull-left">
               <i class="icon-barcode"></i>
            </div>
            
            <div class="tile-object">
               <div class="name">
                  Total Pembelian Bulan <strong><?php echo BulanIndo(date('n')); ?></strong>
               </div>
               
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div id="add_produk" class="portlet box green">
         <div class="portlet-title">
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Transaksi Pembelian</div>
         </div>
         <div class="portlet-body">
            <div class="row">
              <div class="col-md-5">
                <div class="note note-warning">
                  <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Kode Pembelian</span>
                  <span id="code" class="pull-right"><?php echo $purchase->reference_no; ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="note note-warning">
                  <span style="font-weight:bold;"><i class="icon-truck"></i>&nbsp;&nbsp;&nbsp;Kode Outlet</span>
                  <span id="outlet_code" class="pull-right"><?php echo $purchase->dept; ?></span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="note note-warning">
                  <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                  <span id="tanggal" class="pull-right"><?php echo tanggalIndo($purchase->date); ?></span>
                </div>
              </div>
            </div>
            <br/>
            <div class="table-responsive">
              <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                <thead>
                  <tr>
                    <th width="50px">No.</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th width="">Qty</th>
                    <th>Price</th>
                    <th width="200px">Total</th>
                  </tr>
                </thead>
                 <tbody id="daftar_tmp_purchase">
                    
                 </tbody>
                 <tfoot>
                   <tr>
                      <td align="center" colspan="5">
                      <?php
                      if ($purchase->disc_reg_1 == 0 && $purchase->nom_reg_1 == 0) {
                        echo 'TOTAL';
                      } else{
                        echo 'Total dengan discount '.$purchase->disc_reg_1.'% = '.format_rupiah($purchase->nom_reg_1);
                      }?>
                      </td>
                      <td align="right"><span id="subtotal"><?php echo format_rupiah($purchase->total); ?></span></td>
                   </tr>
                 </tfoot>
              </table>
            </div>        
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

<script language="javascript">

function begin(){
  daftar_layanan();
}
function daftar_layanan(){
    var url = '<?php echo base_url($this->cname); ?>/daftar_produk';
    $.ajax({
        type: "POST",
        url: url,
        data: {
          purchase_code:$('#code').html(),
          edit:'edit'
        },
        success: function(msg) {
            data = msg.split('||||');
            $('#daftar_tmp_purchase').html(data[0]);
        }
    });
    return false;
}
$(document).ready(function(){
    begin();  
});
</script>