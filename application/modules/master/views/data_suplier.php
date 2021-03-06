<div class="row">
 <div class="col-md-12">
  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
  <h3 class="page-title">
    Daftar Suplier
  </h3>
  <ul class="page-breadcrumb breadcrumb">
   <li>
    <i class="icon-home"></i>
    <a href="<?php echo base_url();?>dashboard">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
  <li><a href="<?php echo base_url($this->cname); ?>">Suplier</a><i class="icon-angle-right"></i></li>
  <li><a href="#">Daftar Suplier</a></li>
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
   <i><?php echo  $count; ?></i>
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
<div class="row">
 <div class="col-md-12">
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box blue">
    <span id="flash_message"></span>
    <div class="portlet-title">
      <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Suplier</div>
            <!-- <div class="actions">
               <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
               <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
             </div> -->
           </div>
           <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="tabel_daftar">
             <thead>
              <tr>
               <th width="100px">Kode</th>
               <th width="px">Nama</th>
               <th width="150px">Payment</th>
               <th width="px">Terdaftar</th>
               <th width="125px">Status</th>
               <th width="175px">Action</th>
             </tr>
           </thead>
           <tbody>
            <?php 

            $get = $this->db->get("atombizz_suppliers");
            $hasil = $get->result_array();

            foreach ($hasil as $item) {
              ?>                

              <tr>
                <td><?php echo $item['code'];?></td>
                <td><?php echo $item['name'];?></td>
                <td><?php echo $item['payment'];?></td>
                <td><?php echo tanggalIndo($item['registered']);?></td>
                <td><?php echo cek_status($item['status']);?></td>                        
                <td><?php echo get_detail_edit_delete($item['id']); ?></td>
              </tr>

              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
    </div>
  </div>
  <div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:grey">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title" style="color:#fff;">Konfirmasi Hapus Data</h4>
        </div>
        <div class="modal-body">
          <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data Supplier tersebut ?</span>
          <input id="id-delete" type="hidden">
        </div>
        <div class="modal-footer" style="background-color:#eee">
          <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
          <button onclick="delData()" class="btn red">Ya</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function actDelete(Object){
      $('#id-delete').val(Object);
      $('#modal-confirm').modal('show');
    }
    function delData(){
      var id = $('#id-delete').val();
      var url = '<?php echo base_url($this->cname); ?>/delete';
      $.ajax({
        type: "POST",
        url: url,
        data: {id:id},
        success: function(msg)
        {
          $('#modal-confirm').modal('hide');
            // alert(msg);
            data = msg.split('|');
            if(data[0]==1){
              clear();
              window.location = "<?php echo base_url() . 'master/suplier/data' ?>";   
            }
            $('#flash_message').html(data[1]);
            setTimeout(function(){$('#flash_message').html('');},3000);
          }
        });
      return false;
    }
    function clear(){
      $('#id-delete').val('');
    }
    function actEdit(object)
    {
      window.location="<?php echo base_url($this->cname).'/edit/'; ?>" + object;
    }

    $(document).ready(function() {

      $('#tabel_daftar').dataTable();

    });
  </script>
