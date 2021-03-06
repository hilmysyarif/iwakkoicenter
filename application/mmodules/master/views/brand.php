<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Master Konversi Stok
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Konversi Stok</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Daftar Konversi</a></li>
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
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Master Konversi</div>
    </div>
    <div class="portlet-body form">
        <span id="flash_message"></span>
        <div class="form-body">
            <form id="formadd">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Bahan</label>
                        <select id="product_code" name="product_code" class="form-control select2me" data-placeholder="Pilih Bahan">
                            <option value=""></option>
                            <?php foreach ($bahan->result() as $key => $value) {
                            ?>
                            <option value="<?php echo $value->code; ?>"><?php echo $value->name; ?></option>
                            <?php
                            } ?>
                        </select>
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Kode Merk</label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Kode Brand" autocomplete='off'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Nama Merk</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama Brand">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Satuan</label>
                        <select id="satuan" name="satuan" class="form-control select2me" data-placeholder="Pilih Satuan">
                            <option value=""></option>
                            <?php foreach ($satuan->result() as $key => $value) {
                            ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Isi dalam 1 <span class="stat_satuan"></span></label>
                        <input type="text" id="qty_convertion" name="qty_convertion" class="form-control" placeholder="Qty isi">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Satuan Konversi dalam 1 <span class="stat_satuan"></span></label>
                        <select id="satuan_convertion" name="satuan_convertion" class="form-control select2me" data-placeholder="Pilih Satuan Konversi">
                            
                        </select>
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
                    <th style="text-align:center" width="">Bahan</th>
                    <th style="text-align:center" width="">Merk</th>
                    <th style="text-align:center" width="125px">Satuan</th>
                    <th style="text-align:center" width="175px">Isi per satuan</th>
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
        "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/list_konversi/",
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
    $('#product_code').on('change',function(){
        get_satuan();
    });
    $('#satuan').on('change',function(){
        var text = $('#satuan option:selected').text();
        $('.stat_satuan').html(text);
    });
});
function get_satuan(Object){
    if(Object){
        var data = Object;
    }
    var url = "<?php echo base_url($this->cname) ?>/get_satuan";
    var bahan = $('#product_code').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {bahan:bahan},
        success: function(msg){
            if(msg){
                $('#satuan_convertion').html(msg);
                if(Object){
                    $('#satuan_convertion').val(data);
                }
                $('#satuan_convertion').select2().trigger('change');
            }
        }
    });
}
function actSimpan(){
    var url = "<?php echo base_url($this->cname) ?>/save_konversi";
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
     var url = "<?php echo base_url($this->cname) ?>/detail_konversi";
    $.ajax({
        type: 'POST',
        url: url,
        data: {id:argument},
        success: function(msg){
            data = JSON.parse(msg);
            $('#product_code').val(data.product_code);
            $('#product_code').select2().trigger('change');
            $('#code').val(data.code);
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#satuan').val(data.satuan);
            $('#satuan').select2().trigger('change');
            get_satuan(data.satuan_convertion);
            $('#qty_convertion').val(data.qty_convertion);
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
    $('#product_code').val('');
    $('#product_code').select2().trigger('change');
    $('#code').val('');
    $('#id').val('');
    $('#name').val('');
    $('#satuan').val('');
    $('#satuan').select2().trigger('change');
    $('#satuan_convertion').val('');
    $('#satuan_convertion').select2().trigger('change');
    $('#qty_convertion').val('');
    $('.stat_satuan').val('');
}
</script>