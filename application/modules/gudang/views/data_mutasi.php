<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Daftar Distribusi Stok
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
         <li><a href="<?php echo base_url($this->cname); ?>">Distribusi</a><i class="icon-angle-right"></i></li>
         <li><a href="">Daftar Distribusi</a></li>
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
            <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Distribusi</div>
         </div>
         <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="example-datatable">
               <thead>
                  <tr>
                     <th width="50px">No.</th>
                     <th>Tanggal</th>
                     <th>Kode Distribusi</th>
                     <th>Product</th>
                     <th width="75px">Qty</th>
                     <!-- <th width="100px">Action</th> -->
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
   $(function(){
        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#example-datatable').dataTable( {
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [ 0 ] }
            ],
             "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
            "fnDrawCallback": function ( oSettings ) {
               /* Need to redo the counters if filtered or sorted */
               if ( oSettings.bSorted || oSettings.bFiltered )
               {
                  for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                  {
                     $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                  }
               }
            },
            "bProcessing":true,
            "bServerSide":true,
            "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/daftar_mutasi",
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
        });

        jQuery('#example-datatable_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#example-datatable_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#example-datatable_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
   });
</script>
