<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Stok Barang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Barang</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Stok Barang</a></li>
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
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Pencatatan Barang</div>
    </div>
    <div class="portlet-body form">
        <span id="flash_message"></span>
        <div class="form-body">
            <form id="formadd">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Kategori Barang</label>
                        <select id="category" name="category" class="form-control select2me" data-placeholder="Pilih Kategori">
                            <option value=""></option>
                            <option value="BP">Barang Pokok</option>
                            <option value="BI">Barang Inventaris</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Barang</label>
                        <select id="product_code" name="product_code" class="form-control select2me" data-placeholder="Pilih Barang">
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Status Pencatatan</label>
                        <select id="status" name="status" class="form-control select2me" data-placeholder="Pilih Status">
                            <option value=""></option>
                            <option value="in">Masuk</option>
                            <option value="out">Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Qty</label>
                        <input id="qty" name="qty" class="form-control" placeholder="Qty">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Ketarangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="form-actions right">
            <button onclick="actSimpan()" class="btn green"><i class="icon-ok"></i> Simpan</button>
        </div>
    </div>
</div>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-list"></i>&nbsp;Data</div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="example-datatable">
            <thead>
                <tr>
                    <th style="text-align:center" width="50px">No</th>
                    <th style="text-align:center" width="">Kategori</th>
                    <th style="text-align:center" width="">Kode</th>
                    <th style="text-align:center" width="">Nama</th>
                    <th style="text-align:center" width="100px">in</th>
                    <th style="text-align:center" width="100px">out</th>
                    <th style="text-align:center" width="100px">saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7">Tidak ada data</td>
                </tr>
            </tbody>
        </table>
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
        "aaSorting": [
            [1, 'asc']
        ],
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
        "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/list_inventaris/",
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
$(document).ready(function(){
    $('#category').on('change',function(){
        var category = $('#category').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url($this->cname) ?>/get_opt_barang',
            data:{category:category},
            success: function(msg){
                // alert(msg);
                $('#product_code').html(msg);
            }
        });
    });
});
function actSimpan(){
    var url = "<?php echo base_url($this->cname) ?>/save";
    $.ajax({
        type: 'POST',
        url: url,
        data: $('#formadd').serialize(),
        success: function(msg){
            data = msg.split('|');
            if(data[0]==1){
                clear();
                $('#example-datatable').dataTable().fnDraw();
            }
            $('#flash_message').html(data[1]);
            setTimeout(function(){$('#flash_message').html('')},1500);
        }
    });
    return false;
}
function clear(){
    $('#category').val('');
    $('#category').select2().trigger('change');
    $('#keterangan').val('');
    $('#product_code').val('');
    $('#product_code').select2().trigger('change');
    $('#qty').val('');
    $('#status').val('');
    $('#status').select2().trigger('change');
}
</script>