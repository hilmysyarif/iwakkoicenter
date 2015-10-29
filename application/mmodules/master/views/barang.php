<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Daftar Barang
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Barang</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Daftar Barang</a></li>
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
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Data Barang</div>
    </div>
    <div class="portlet-body form">
        <span id="flash_message"></span>
        <div class="form-body">
            <form id="formadd">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Kategori Barang</label>
                        <select id="category" name="category" class="form-control select2me" data-placeholder="Pilih Kategori">
                            <option value=""></option>
                            <option value="BP">Barang Pokok</option>
                            <option value="BI">Barang Inventaris</option>
                        </select>
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Kode Barang</label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Kode Barang" autocomplete='off'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Nama Barang</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama Barang">
                    </div>
                </div>
                <div class="col-md-4">
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
                    <th style="text-align:center" width="100px">Kategori</th>
                    <th style="text-align:center" width="100px">Kode</th>
                    <th style="text-align:center" width="125px">Nama</th>
                    <th style="text-align:center" width="">Keterangan</th>
                    <th style="text-align:center" width="150px">Action</th>
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
            "aTargets": [0 , 4]
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
function actEdit(argument) {
     var url = "<?php echo base_url($this->cname) ?>/detail_barang";
    $.ajax({
        type: 'POST',
        url: url,
        data: {id:argument},
        success: function(msg){
            // alert(msg);
            if(msg){
                data = JSON.parse(msg);
                $('#id').val(data.id);
                $('#category').val(data.category);
                $('#category').select2().trigger('change');
                $('#code').val(data.code);
                $('#name').val(data.name);
                $('#keterangan').val(data.keterangan);
            }
        }
    });
    return false;
}
function actDelete(argument) {
    alertify.confirm("Apakah anda yakin untuk menghapus item ini?", function (e) {
        if (e) {
            var url = "<?php echo base_url($this->cname) ?>/delete";
            $.ajax({
                type: 'POST',
                url: url,
                data: {id:argument},
                success: function(msg){
                    $('#example-datatable').dataTable().fnDraw();
                    data = msg.split('|');
                    $('#flash_message').html(data[1]);
                    setTimeout(function(){
                        $('#flash_message').html('');
                    },1500);
                }
            });
        } else {
            
        }
    });
    return false;
}
function clear(){
    $('#category').val('');
    $('#category').select2().trigger('change');
    $('#code').val('');
    $('#id').val('');
    $('#name').val('');
    $('#keterangan').val('');
}
</script>