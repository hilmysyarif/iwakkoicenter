<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Daftar Kasbon
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Keuangan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Penggajian</a><i class="icon-angle-right"></i></li>
            <li><a href="">Daftar Kasbon</a></li>
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
         <div class="tile bg-red" onclick="window.location='<?php echo base_url($this->cname); ?>/catat'">
            <div class="tile-body">
               <i class="icon-plus-sign"></i>
            </div>
            <div class="tile-object">
               <div class="name">
                  Catat
               </div>
               <div class="number">
                  <!-- (T) -->
               </div>
            </div>
         </div>
         <div class="tile bg-yellow" onclick="window.location='<?php echo base_url($this->cname); ?>/bayar'">
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
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Kasbon</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example-datatable">
                    <thead>
                        <tr>
                            <th class="text-center" width="50px">No.</th>
                            <th class="text-center" width="150px">Kode Karyawan</th>
                            <th class="text-center" width="px">Nama Karyawan</th>
                            <th class="text-center" width="155px">Total</th>
                            <th class="text-center" width="155px">Dibayar</th>
                            <th class="text-center" width="155px">Sisa</th>
                            <th class="text-center" width="125px">Action</th>
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
            {"bSortable": false, "aTargets": [ 0] }
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
        "sAjaxSource": "<?php echo base_url($this->module); ?>/kasbon/daftar_kasbon",
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
function actDelete(Object){
    $('#id-delete').val(Object);
    $('#modal-confirm').modal('show');
}
function delData(){
    var id = $('#id-delete').val();
    var url = '<?php echo base_url($this->cname); ?>/hapus_data';
    $.ajax({
        type: "POST",
        url: url,
        data: {id:id},
        success: function(msg)
        {
            $('#modal-confirm').modal('hide');
            // alert(id);
            data = msg.split('|');
            if(data[0]==1){
                clear();
                $('#example-datatable').dataTable().fnDraw();
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
</script>