<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Data Transaksi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->module);?>">Resepsionis</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->cname);?>">POS</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="">Data Transaksi</a>
            </li>
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
            <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/daftar'">
                <div class="tile-body">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Daftar <br> Transaksi
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->module); ?>/dashboard'">
                <div class="tile-body">
                    <i class="icon-th-large"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Dashboard Room
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-red" onclick="window.location='<?php echo base_url($this->module); ?>/kas/tutup'">
                <div class="tile-body">
                    <i class="icon-money"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Tutup Kasir
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile double bg-yellow pull-right" style="cursor:default">
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
                    <i><?php echo $transaction; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-shopping-cart"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Transaksi Hari Ini
                    </div>
                    <div class="number" id="transaksi_today">
                        <?php //echo BulanIndo(date('n')); ?>
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
                <div class="caption"><i class="icon-list"></i>&nbsp;Data Transaksi</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example-datatable">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Kode Transaksi</th>
                            <th>KTP</th>
                            <th>Nama</th>
                            <th width="100px">Action</th>
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
            "aTargets": [0]
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
        "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/data_transaksi",
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

function actDelete(Object) {
    $('#id-delete').val(Object);
    $('#modal-confirm').modal('show');
}

function delData() {
    var id = $('#id-delete').val();
    var url = '<?php echo base_url($this->cname); ?>/hapus_data';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            code: id
        },
        success: function(msg) {
            $('#modal-confirm').modal('hide');
            // alert(id);
            data = msg.split('|');
            if (data[0] == 1) {
                clear();
                $('#example-datatable').dataTable().fnDraw();
            }
            $('#flash_message').html(data[1]);
            setTimeout(function() {
                $('#flash_message').html('');
            }, 3000);
        }
    });
    return false;
}

function clear() {
    $('#id-delete').val('');
}
</script>