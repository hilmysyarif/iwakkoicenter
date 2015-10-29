<!-- static modal-->
<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog">
      <div class="modal-content">
         <form id="form_bayar" enctype="multipart/form-data" method="post" >
            <div class="modal-body">
               <!-- BEGIN FORM-->
               <table style="margin-left:auto;margin-right:auto;">
                  <tr>
                     <td width="105px">TOTAL</td>
                     <td width="20px">:</td>
                     <td><input id="m-total" name="m-total" style="text-align:right;" type="text" class="form-control" value="0" readonly></td>
                  </tr>         
                  <tr>
                     <td>DISCOUNT(%)</td>
                     <td>:</td>
                     <td><input id="m-disc" name="m-disc" onkeyup="discount()" style="text-align:right;" type="text" class="form-control" value="0" ></td>
                  </tr>
                  <tr>
                     <td>DISCOUNT(Rp)</td>
                     <td>:</td>
                     <td><input id="m-disc-nom" name="m-disc-nom" onkeyup="discount()" style="text-align:right;" type="text" class="form-control" value="0" ></td>
                  </tr>
                  <!-- <tr>
                     <td>TAX(10%)</td>
                     <td>:</td>
                     <td><input id="m-tax" name="m-tax" style="text-align:right;" type="text" class="form-control" value="0" readonly></td>
                  </tr> -->
                  <input id="m-lunas" name="m-lunas" type="text" hidden>
                  <tr>
                     <td>TOTAL TAGIHAN</td>
                     <td>:</td>
                     <td><input id="m-tagih" name="m-tagih" style="text-align:right;" type="text" class="form-control" value="0" readonly></td>
                  </tr>
                  <tr>
                     <td>PEMBAYARAN</td>
                     <td>:</td>
                     <td>
                        <select onchange="mode()" name="m-cash" id="m-cash" class="form-control" data-placeholder="Pilih menu...">
                           <option selected="selected" value="1">Tunai</option>
                           <option value="0">Non-tunai</option>
                           <option value="2">Compliment</option>
                        </select>
                     </td>
                  </tr>
                  <tr id="h-non-tunai">
                     <td>BANK</td>
                     <td>:</td>
                     <td>
                        <select name="m-bank" id="m-bank" class="form-control" data-placeholder="Pilih Bank...">
                           <option selected="selected" value="">Pilih Bank...</option>
                           <option value="Mandiri">Bank Mandiri</option>
                           <option value="BNI">Bank BNI</option>
                           <option value="BCA">Bank BCA</option>
                           <option value="Danamon">Bank Danamon</option>
                        </select>
                     </td>
                  </tr>
                  <tr id="h-compliment1">
                     <td>DISETUJUI OLEH</td>
                     <td>:</td>
                     <td>
                        <select name="m-valid" id="m-valid" class="form-control" data-placeholder="Pilih salah satu...">
                           <option selected="selected" value="">Pilih salah satu...</option>
                           <?php foreach ($validator as $key => $value): ?>
                              <option value="<?php echo $value->uname.'|'.$value->nama; ?>"><?php echo $value->nama; ?></option>
                           <?php endforeach ?>
                        </select>
                     </td>
                  </tr>
                  <tr id="h-compliment">
                     <td>PASSWORD</td>
                     <td>:</td>
                     <td><input id="m-compli" name="m-compli" style="text-align:left;" type="password" class="form-control" placeholder="Masukan kode validasi" ></td>
                  </tr>
                  <tr id="h-tunai">
                     <td>BAYAR</td>
                     <td>:</td>
                     <td><input id="m-bayar" name="m-bayar" onkeyup="kembali()" style="text-align:right;" type="text" class="form-control" value="0" ></td>
                  </tr>
                  <tr id="h-tunai1">
                     <td>KEMBALIAN</td>
                     <td>:</td>
                     <td><input id="m-kembali" name="m-kembali" style="text-align:right;" type="text" class="form-control" value="0" readonly></td>
                  </tr>
               </table>
               <!-- END FORM-->
            </div>
            <div class="modal-footer">
               <input type="text" name="id" value="<?php echo $id_penjualan ?>" hidden>
               <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
               <button type="submit" class="btn blue">Bayar</button>
            </div>
            </form>
      </div>
   </div>
</div>

<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Kasir <small>Pesanan</small>
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url().'kasir' ?>">Kasir</a> 
            <i class="icon-angle-right"></i>
         </li>
         <li>
            <a href="<?php echo base_url().'kasir/meja' ?>">Pilih Meja</a>
            <i class="icon-angle-right"></i>
         </li>
         <li>
            <a href="#">
            <?php echo $meja; 
                  $skip = true;
                  if (!empty($_meja_tergabung))
                     foreach ($_meja_tergabung as $key) {
                        echo (!$skip) ? ', '.$key : '' ;
                        $skip = false;
                     };
            ?>
            </a>
         </li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box blue">
         <div class="portlet-title">
            <div class="caption"><i class="icon-globe"></i>Pesanan</div>
            <div class="actions">
               <a onclick="$('#modal-pindah').modal('show')" class="btn red btn-sm" <?php echo ($meja=='Take-away') ? 'style="display:none"':'' ?>><i class="icon-share"></i> Pindah Meja</a>
               <a onclick="$('#modal-gabung').modal('show')" class="btn dark btn-sm" <?php echo ($meja=='Take-away') ? 'style="display:none"':'' ?>><i class="icon-resize-small"></i> Gabung Meja</a>
               <a onclick="print('order-list')" class="btn yellow btn-sm" <?php echo ($meja=='Take-away') ? 'style="display:none"':'' ?>>
                  <i class="icon-print"></i> Pesan
               </a>
               <a onclick="print('invoice')" class="btn green btn-sm"><i class="icon-print"></i> Guest Bill</a>
               <a onclick="bayar();mode();" data-target="#static" data-toggle="modal" class="btn purple btn-sm"><i class="icon-dollar"></i> Bayar</a>
            </div>
         </div>
         <div class="portlet-body form">
            <div class="form-actions top">
            <span id="flash_message"></span>
               <form id="form_data" enctype="multipart/form-data" method="post" >
                  <div class="col-md-4">
                     <select name="menu" id="menu" class="form-control select2me" data-placeholder="Pilih menu...">
                     <option value=""></option>
                     <?php 
                     foreach ($_menu as $key => $value) {
                     ?>
                        <option value="<?php echo $value->id.'|'.$value->harga.'|'.$value->hpp; ?>"><?php echo $value->code.'-'.$value->nama; ?></option>
                     <?php 
                     }
                     ?>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <input type="text" name="qty" id="qty" class="form-control" placeholder="jumlah">
                     <input type="text" name="id_penjualan" id="id_penjualan" value="<?php echo $id_penjualan; ?>" hidden>
                  </div>
                  <div class="col-md-1">
                     <button type="submit" class="btn purple">Submit</button>
                  </div>
                  <div class="col-md-3">
                     <input type="text" class="form-control" placeholder="nama" value="<?php echo @$nama_cust->name ?>" readonly>
                  </div>
               </form>
            </div>
            <div class="table-responsive" style="margin-left:20px;margin-right:20px;">
               <table class="table table-hover" id="data">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama Menu</th>
                     <th>Jumlah</th>
                     <th>Harga Unit</th>
                     <th>Total Harga</th>
                     <th width="150">Aksi</th>
                  </tr>
               </thead>
               <tbody>
               <!-- DATA TABLE -->
               </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
      <div class="portlet box yellow">
         <div class="portlet-title">
            <div class="caption"><i class="icon-globe"></i>Pembayaran Individu</div>
         </div>
         <div class="form-actions top">
            <div class="portlet-body form">
               <div class="table-responsive" style="margin-left:20px;margin-right:20px;">
                  <table class="table table-hover" id="data-personal">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Harga Unit</th>
                        <th>Total Harga</th>
                        <th width="150">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                  <!-- DATA TABLE -->
                  </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
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
               <!-- BEGIN FORM-->
               <table style="margin-left:auto;margin-right:auto;">
                  <tr>
                     <td>DISETUJUI OLEH</td>
                     <td>:</td>
                     <td>
                        <select name="d-valid" id="d-valid" class="form-control" data-placeholder="Pilih salah satu...">
                           <option selected="selected" value="">Pilih salah satu...</option>
                           <?php foreach ($validator as $key => $value): ?>
                              <option value="<?php echo $value->uname.'|'.$value->nama; ?>"><?php echo $value->nama; ?></option>
                           <?php endforeach ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>PASSWORD</td>
                     <td>:</td>
                     <td><input id="d-pass" name="d-pass" style="text-align:left;" type="password" class="form-control" placeholder="Masukan kode validasi" ></td>
                  </tr>
               </table>
               <input id="id-delete" type="hidden">
               <!-- END FORM-->
            </div>
            <!-- <div class="modal-body">
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data pesanan tersebut ?</span>
                <input id="id-delete" type="hidden">
            </div> -->
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-pindah" class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Form Pindah Meja</h4>
            </div>
            <div class="modal-body">
               <table style="margin-left:auto;margin-right:auto;">
                  <tr>
                     <td>Meja Sekarang</td>
                     <td>:</td>
                     <td><input id="m-skr" name="m-skr" style="text-align:left;" type="text" class="form-control" placeholder="Meja" value="<?php echo $meja ?>" readonly></td>
                  </tr>
                  <tr>
                     <td>Meja Tujuan</td>
                     <td>:</td>
                     <td>
                        <select name="m-tjn" id="m-tjn" class="form-control select2me" data-placeholder="Pilih salah satu...">
                           <option selected="selected" value="">Pilih salah satu...</option>
                           <?php foreach ($_meja as $key => $value): ?>
                              <?php for ($i=1; $i <= $value->qty; $i++) { 
                                 if (!in_array($value->code.'-'.$i, $_meja_isi)) {
                                    echo '<option value="'.$value->code.'-'.$i.'">'.$value->code.'-'.$i.'</option>';
                                 }
                              } ?>
                           <?php endforeach ?>
                        </select>
                     </td>
                  </tr>
               </table>
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="actPindah()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-gabung" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Form Gabung Meja</h4>
            </div>
            <div class="modal-body">
               <!-- BEGIN FORM-->
               <form id="form_gabung" enctype="multipart/form-data" method="post" >
               <table style="margin-left:auto;margin-right:auto;">
                  <tr>
                     <td>Meja Sekarang</td>
                     <td>:</td>
                     <td><input id="mg-skr" name="mg-skr" style="text-align:left;" type="text" class="form-control" placeholder="Meja" value="<?php echo $meja ?>" readonly></td>
                  </tr>
                  <tr>
                     <td>Meja Lain</td>
                     <td>:</td>
                     <td>
                        <?php foreach ($_meja as $key => $value): ?>
                           <?php for ($i=1; $i <= $value->qty; $i++) { 
                              if (!in_array($value->code.'-'.$i, $_meja_isi)) {
                                 $is_checked = !empty($_meja_tergabung) ? (in_array($value->code.'-'.$i, $_meja_tergabung)) ? 'checked' : '' : '' ;
                                 echo '<input '.$is_checked.' type="checkbox" name="mg-tjn[]" value="'.$value->code.'-'.$i.'">'.$value->code.'-'.$i.'</br>';
                              }
                           } ?>
                        <?php endforeach ?>
                     </td>
                  </tr>
               </table>
               </form>
               <!-- END FORM-->
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="actGabung()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
<script type="text/javascript">
   $("#form_data").submit(function(){
      var url = "<?php echo base_url($this->cname); ?>/add";
      $.ajax({
         type: "POST",
         url: url,
         data: $('#form_data').serialize(),
         success: function(msg)
         {
            // alert(msg);
            data = msg.split("|");
            if(data[0]==1){
               $("#data").dataTable().fnDraw();
               clear();
            }
            $("#flash_message").show();
            $("#flash_message").html(data[1]);
            setTimeout(function() {$("#flash_message").hide();}, 5000);
         }
      });
      return false;
   });

   $("#form_bayar").submit(function(){
      var mode = $('#m-cash').val();
      var kembalian = parseInt($('#m-kembali').val());
      var bank = $('#m-bank').val();
      var password = cek_pass_compl($('#m-valid').val()+'|'+$('#m-compli').val());
      if (mode == 1 && kembalian>=0) {
         var url = "<?php echo base_url($this->cname); ?>/bayar/cash";
         update_penjualan(url);
      } else if (mode == 0 && bank != '') {
         var url = "<?php echo base_url($this->cname); ?>/bayar/credit";
         update_penjualan(url);
      } else if (mode == 2 && password == true) {
         var url = "<?php echo base_url($this->cname); ?>/bayar/compliment";
         update_penjualan(url);
      } else {
         alert("Isi dengan benar !");
      };      
      return false;
   });

   function update_penjualan(Object)
   {
      $.ajax({
         type: "POST",
         url: Object,
         data: $('#form_bayar').serialize(),
         success: function(msg)
         {
            // alert(msg);
            if (msg != '0') {
               print("struk");
               // window.location = "<?php echo base_url($this->cname); ?>";
            }               
         }
      });
   }

   function actPersonal(Object)
   {
      var url = "<?php echo base_url($this->cname); ?>/add_personal";
      $.ajax({
         type: "POST",
         url: url,
         data: {
            id : Object
         },
         success: function(msg)
         {
            $('#data').dataTable().fnDraw();
            $('#data-personal').dataTable().fnDraw();
         }
      });
      return false;
   }

   function actRemove(Object)
   {
      var url = "<?php echo base_url($this->cname); ?>/remove_personal";
      $.ajax({
         type: "POST",
         url: url,
         data: {
            id : Object
         },
         success: function(msg)
         {
            $('#data').dataTable().fnDraw();
            $('#data-personal').dataTable().fnDraw();
         }
      });
      return false;
   }

   function actGabung()
   {
      var url = "<?php echo base_url('kasir/gabung_meja'); ?>";
      $.ajax({
         type: "POST",
         url: url,
         data: $('#form_gabung').serialize(),
         success: function(msg)
         {
            if (msg)
               window.location = "<?php echo base_url($this->cname); ?>";
            else
               alert('Gagal gabung meja');
         }
      });
   }

   function actPindah()
   {
      var url = "<?php echo base_url('kasir/update_meja'); ?>";
      var lama = "<?php echo $meja; ?>";
      var baru = $('#m-tjn').val();
      $.ajax({
         type: "POST",
         url: url,
         data: {
            lama : lama,
            baru : baru
         },
         success: function(msg)
         {
            if (msg)
               window.location = "<?php echo base_url($this->cname); ?>";
            else
               alert('Gagal pindah meja');
         }
      });
   }

   function cek_pass_compl(Object)
   {
      var result = '';
      var data = Object.split('|');
      $.ajax({
         async: false,
         type: "POST",
         url: "<?php echo base_url('kasir/cek_compliment'); ?>",
         data: {
            uname : data[0],
            upass : data[2]
         },
         success: function(msg)
         {
            result = msg;
         }
      });
      // alert(result);
      if (result == '1') {
         return true;
      } else {
         return false;
      };
   }

   function bayar() {
      var total, tax, total_tag;
      var url = "<?php echo base_url('kasir/get_tagihan'); ?>";
      var id_penjualan = "<?php echo $id_penjualan; ?>";
      $.ajax({
         type: "POST",
         url: url,
         data:{id:id_penjualan},
         success: function(msg)
         {
            var data = msg.split('|');
            total = parseInt(data[0]);
            //tax = total / 10;
            total_tag = total;// + tax;
            $('#m-total').val(total);
            $('#m-lunas').val(data[1]);
            $('#m-tagih').val(total_tag);
            $('#m-kembali').val(0-total_tag);
            $('#m-bayar').focus();
         }
      });
   }

   function mode()
   {
      var mode = $('#m-cash').val();
      if (mode == 0) {
         $('#h-non-tunai').show();
         $('#h-tunai').hide();
         $('#h-tunai1').hide();
         $('#h-compliment').hide();
         $('#h-compliment1').hide();
      } else if (mode == 2) {
         $('#h-compliment').show();
         $('#h-compliment1').show();
         $('#h-tunai').hide();
         $('#h-tunai1').hide();
         $('#h-non-tunai').hide();
      } else {
         $('#h-tunai').show();
         $('#h-tunai1').show();
         $('#h-compliment').hide();
         $('#h-compliment1').hide();
         $('#h-non-tunai').hide();
      };
   }

   function discount()
   {
      var total = parseInt($('#m-total').val());
      var discount = parseInt($('#m-disc').val());
      var discount_nom = parseInt($('#m-disc-nom').val());
      var tagihan = total - (total * discount / 100) - discount_nom;
      // var tax = tagihan / 10;
      // tagihan += tax;
      // $('#m-tax').val(tax);
      $('#m-tagih').val(tagihan);
   }

   function kembali()
   {
      var tagihan = parseInt($('#m-tagih').val());
      var bayar = parseInt($('#m-bayar').val());
      var kembalian = bayar - tagihan;
      $('#m-kembali').val(kembalian);
   }

   function print(Object) {
      if (Object == "order-list") {
         var url = "<?php echo base_url('kasir/printer/print_order_list'); ?>";
         var reload = true;
      } else if (Object == "invoice") {
         var url = "<?php echo base_url('kasir/printer/print_invoice'); ?>";
         var reload = false;
      } else {
         var url = "<?php echo base_url('kasir/printer/print_struck'); ?>";
         var reload = true;
      };
      
      var id_penjualan = "<?php echo $id_penjualan; ?>";
      var discount = $('#m-disc').val();
      var byr = $('#m-bayar').val();
      $.ajax({
         type: "POST",
         url: url,
         data:{
            id:id_penjualan,
            disc:discount,
            bayar:byr
         },
         success: function(msg)
         {
            alert(msg);
            if (reload) {
               window.location = "<?php echo base_url($this->cname); ?>";
            }
         }
      });
   }

   function clear(){
      $('#menu').val('');
      $('#menu').select2().trigger("change");
      $('#menu').select2('focus');
      $('#qty').val('');
      $('#id-delete').val('');
   }

   function open_window(url, width, height) {
      var my_window;
     
      my_window = window.open(url, "Cetak Surat Jalan", "scrollbars=1, width="+width+", height="+height+", left=0, top=0");
      my_window.focus();
   }
   function move_data(Object){
      var invoice = Object;
      open_window('<?php echo base_url($this->module); ?>/pengiriman/surat_jalan?kode='+invoice, 600, 800);
   }

   $(function(){
      clear();
      $("#data").dataTable({
         aoColumnDefs:[{
            bSortable:!1,
            aTargets:[0,5]
         }],
         fnDrawCallback: function ( oSettings ) {
            /* Need to redo the counters if filtered or sorted */
            if ( oSettings.bSorted || oSettings.bFiltered )
            {
               for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
               {
                  $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
               }
            }
         },
         bProcessing:true,
         bServerSide:true,
         sAjaxSource: "<?php echo base_url(); ?>kasir/_datatable/daftar_pesanan/<?php echo $meja ?>",
         iDisplayLength:15,
         aLengthMenu:[[15,30,50,-1],[15,30,50,"All"]],
         "fnServerData": function(sSource, aoData, fnCallback){
            $.ajax(
               {
                  'dataType': 'json',
                  'type'  : 'POST',
                  'url'    : sSource,
                  'data'  : aoData,
                  'success' : fnCallback
               }
            );
         } 
      })
      $(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")
   });

   $(function(){
      clear();
      $("#data-personal").dataTable({
         aoColumnDefs:[{
            bSortable:!1,
            aTargets:[0,5]
         }],
         fnDrawCallback: function ( oSettings ) {
            /* Need to redo the counters if filtered or sorted */
            if ( oSettings.bSorted || oSettings.bFiltered )
            {
               for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
               {
                  $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
               }
            }
         },
         bProcessing:true,
         bServerSide:true,
         sAjaxSource: "<?php echo base_url(); ?>kasir/_datatable/daftar_bayar_personal/<?php echo $meja ?>",
         iDisplayLength:15,
         aLengthMenu:[[15,30,50,-1],[15,30,50,"All"]],
         "fnServerData": function(sSource, aoData, fnCallback){
            $.ajax(
               {
                  'dataType': 'json',
                  'type'  : 'POST',
                  'url'    : sSource,
                  'data'  : aoData,
                  'success' : fnCallback
               }
            );
         } 
      })
      $(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")
   });

   function actDelete(Object) {
       $('#id-delete').val(Object);
       $('#d-pass').val('');
       $('#modal-confirm').modal('show');
   }

   function delData() {
       var id = $('#id-delete').val();
       var url = '<?php echo base_url($this->cname); ?>/delete';
       if (cek_pass_compl($('#d-valid').val()+'|'+$('#d-pass').val())) {
          $.ajax({
              type: "POST",
              url: url,
              data: {
                  id: id
              },
              success: function(msg) {
                  $('#modal-confirm').modal('hide');
                  // alert(id);
                  data = msg.split('|');
                  if (data[0] == 1) {
                      clear();
                      $('#data').dataTable().fnDraw();
                  }
                  $('#flash_message').html(data[1]);
                  setTimeout(function() {
                      $('#flash_message').html('');
                  }, 3000);
                  $('#d-pass').val('');
              }
          });
       } else {
         alert("hayo ini siapa?");
       };
       return false;
   }
</script>