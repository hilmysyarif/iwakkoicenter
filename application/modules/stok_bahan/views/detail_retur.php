<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Detail Retur Suplier
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Retur Suplier</a><i class="icon-angle-right"></i></li>
            <li><a href="">Retur Suplier</a></li>
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
                <div class="caption"><i class="icon-list"></i>&nbsp;Data Transaksi Retur Suplier</div>
                <!-- <div class="actions">
                    <a href="<?php echo base_url($this->cname)?>/produk" class="btn purple btn-sm"><i class="icon-list"></i> Data</a>
                    <a href="<?php echo base_url($this->cname)?>/input_harga_produk" class="btn blue btn-sm"><i class="icon-plus"></i> Add</a>
                </div> -->
            </div>
            <div id='flash_message'></div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example-datatable">
                    <thead>
                        <tr>
                            <th width="50px">No.</th>
                            <th width="125px">Kode Bahan</th>
                            <th width="125px">Nama Bahan</th>
                            <th width="">Keterangan</th>
                            <th width="75px">Qty</th>
                            <th width="150px">HPP</th>
                            <th width="150px">Total</th>
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
<div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Konfirmasi Validasi Data</h4>
            </div>
            <div class="modal-body">
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan memvalidasi data tersebut ?</span>
                <input id="id-validasi" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button onclick="validasi()" class="btn green" >Ya</button>
                <button data-dismiss="modal" aria-hidden="true" class="btn red">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    /*
    * Initialize DataTables, with no sorting on the 'details' column
    */
    var id = '<?php echo $this->uri->segment(4); ?>';
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
        "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/daftar_retur_detail",
        "fnServerData": function(sSource, aoData, fnCallback){
            aoData.push({
                "name": "id",
                "value": id
            });
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