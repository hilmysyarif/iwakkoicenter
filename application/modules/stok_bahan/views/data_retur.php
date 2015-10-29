<div class="row">
 <div class="col-md-12">
  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
  <h3 class="page-title">
    Daftar Retur Suplier
  </h3>
  <ul class="page-breadcrumb breadcrumb">
   <li>
    <i class="icon-home"></i>
    <a href="<?php echo base_url();?>dashboard">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
  <li><a href="<?php echo base_url($this->cname); ?>">Retur Suplier</a><i class="icon-angle-right"></i></li>
  <li><a href="#">Daftar Retur</a></li>
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
      Retur
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
      <!--    <div class="tile double bg-yellow pull-right" style="cursor:default">
            <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
               <i><?php echo $count; ?></i>
            </div>
            <div class="tile-body pull-left">
               <i class="icon-barcode"></i>
            </div>
            
            <div class="tile-object">
               <div class="name">
                  Total Pembelian Bulan
               </div>
               <div class="number">
                  <?php echo BulanIndo(date('n')); ?>
               </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>

    <div class="row">
     <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box blue">
       <div class="portlet-title">
        <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Retur Supplier</div>
            <!-- <div class="actions">
               <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
               <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
             </div> -->
           </div>
           <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="tabel_daftar">
             <thead>
              <tr>
                <th>Tanggal</th>
                <th>Faktur</th>
                <th>Suplier</th>
                <th>Total</th>
                <th width="100px">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $get = $this->db->get('atombizz_retur_out');
              $hasil = $get->result_array();

              foreach ($hasil as $item) {
                ?>                

                <tr>
                  <td><?php echo $item['date'];?></td>
                  <td><?php echo $item['reference'];?></td>
                  <td><?php echo $item['supplier_name'];?></td>
                  <td><?php echo format_rupiah($item['total']);?></td>                        
                  <td><?php echo get_detail_retur($item['id']); ?></td>
                </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
      </div>
    </div>
    <script type="text/javascript">

      $(document).ready(function() {

        $('#tabel_daftar').dataTable();

      });

      function actDetail(object)
      {
        window.location="<?php echo base_url($this->cname).'/detail_retur/'; ?>" + object;
      }
    </script>
