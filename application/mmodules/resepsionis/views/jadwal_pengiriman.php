<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Jadwal Pengiriman
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Resepsionis</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Pengiriman</a><i class="icon-angle-right"></i></li>
            <li><a href="">Jadwal Pengiriman</a></li>
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
            <div class="caption"><i class="icon-list"></i>&nbsp;Jadwal Pengiriman</div>
         </div>
         <div class="portlet-body">
            <span id="flash_message"></span>
            <table class="table table-striped table-bordered table-hover" id="example-datatable">
               <thead>
                  <tr>
                     <th width="50px">No.</th>
                     <th width="125pxpx">Tgl Pengiriman</th>
                     <th width="150pxpx">Nota</th>
                     <th>Alamat</th>
                     <th width="125px">Telp</th>
                     <th width="125pxpx">Total</th>
                     <th width="125px">Action</th>
                  </tr>
               </thead>
               <tbody>
                  
               </tbody>
            </table>
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>
<script type="text/javascript">
   $(function() {
       /*
        * Initialize DataTables, with no sorting on the 'details' column
        */
       var oTable = $('#example-datatable').dataTable({
           "aoColumnDefs": [{
               "bSortable": false,
               "aTargets": [0, 5]
           }],
           "aLengthMenu": [
               [5, 15, 20, -1],
               [5, 15, 20, "All"] // change per page values here
           ],
           // set the initial value
           "iDisplayLength": 10,
           "fnDrawCallback": function(oSettings) {
               /* Need to redo the counters if filtered or sorted */
               if (oSettings.bSorted || oSettings.bFiltered) {
                   for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
                       $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[i]].nTr).html(i + 1);
                   }
               }
           },
           "bProcessing": true,
           "bServerSide": true,
           "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/jadwal_pengiriman",
           "fnServerData": function(sSource, aoData, fnCallback) {
               $.ajax({
                   'dataType': 'json',
                   'type': 'POST',
                   'url': sSource,
                   'data': aoData,
                   'success': fnCallback
               });
           }
       });

       jQuery('#example-datatable_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
       jQuery('#example-datatable_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
       jQuery('#example-datatable_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
   });

   function actBerangkat(Object) {
       var id = Object;
       alertify.set({
           labels: {
               ok: "Ya",
               cancel: "Tidak"
           }
       });
       // confirm dialog
       alertify.confirm("Apakah Anda yakin barang telah terkirim ?", function(e) {
           if (e) {
               // user clicked "ok"
               $.ajax({
                   type: "POST",
                   url: "<?php echo base_url($this->cname); ?>/kirim_barang",
                   data: {
                       id: id
                   },
                   success: function(msg) {
                       data = msg.split('|');
                       if (data[0] == 1) {
                           $('#example-datatable').dataTable().fnDraw();
                       }
                       $('#flash_message').html(data[1]);
                       setTimeout(function() {
                           $('#flash_message').html('');
                       }, 1500);
                   }
               });
           } else {
               // user clicked "cancel"
           }
       });
       return false;
   }
   function actPrint(Object) {
       var url = "<?php echo base_url($this->cname); ?>/get_surat";
        $.ajax({
           type: "POST",
           url: url,
           data: {
               id: Object
           },
           success: function(msg) {
               if(msg){
                    move_data(msg);
               }
           }
       });
        return false;
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
</script>
