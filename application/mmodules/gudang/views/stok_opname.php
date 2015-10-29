<?php 
	$user = $this->session->userdata('astrosession'); 
	$date = date('Y-m-d');
	$date_show = TanggalIndo($date);
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Komparasi Stok Opname
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?php echo base_url();?>dashboard">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
			<li><a href="<?php echo base_url($this->cname); ?>">Stok Opname</a><i class="icon-angle-right"></i></li>
			<li><a href="">Komparasi Stok Opname</a></li>
			<li class="pull-right">
				<div style="display:block; background-color:#e02222; color:#fff; margin-right:-30px; padding:10px; top:-10px; position:relative">
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
		<div class="tiles" style="padding:10px; margin-right:0px; background-color:#ffffff; height:155px">
			<div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/stok'">
				<div class="tile-body">
					<i class="icon-print"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Opname
					</div>
					<div class="number">
						<!-- (T) -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Cek Stok Produk</div>
            </div>
            <span id="flash_message"></span>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Faktur</span>
                            <span id="reference_no" class="pull-right"></span>
							<span id="total_produk" style="display:none"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-truck"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"><?php echo $date_show; ?></span>
							<span id="date" style="display:none"><?php echo $date; ?></span>
							<span id="urut_faktur" style="display:none"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Operator</span>
                            <span id="user_name" class="pull-right"><?php echo $user[0]->nama; ?></span>
							<span id="user_id" style="display:none"><?php echo $user[0]->uname; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body browse-div">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn green pull-right" id="add_product">
                            <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Produk
                        </a>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
					<table class="table table-bordered table-hover" >
						<thead>
							<tr>
								<th width="75px" class="text-center">No</th>
								<th width="" class="text-center">Kode Produk</th>
								<th width="" class="text-center">Nama Produk</th>
								<!-- <th width="200px" class="text-center">Rak</th> -->
								<th width="100px" class="text-center">Qty Fisik</th>
								<th width="100px" class="text-center"></th>
							</tr>
						</thead>
						<tbody id="list_produk">
						</tbody>
					</table>
				</div>
            </div>
            <div class="portlet-body form browse-div">
                <!-- BEGIN FORM-->
                <form class="horizontal-form">
                    <div class="form-actions right">
						<button type="button" class="btn green" id="compare"> PROSES</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>

            <div hidden class="portlet-body result-div">
            	<div class="table-responsive">
					<table id="example-datatable" class="table table-bordered table-hover" >
						<thead>
							<tr>
								<th width="50px" class="text-center">No</th>
								<th width="">Kode</th>
								<th width="">Nama Produk</th>
								<th width="85px" class="text-center">Qty Fisik</th>
								<th width="85px" class="text-center">Qty Stok</th>
								<th width="85px" class="text-center">Opname</th>
								<th width="85px" class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
            </div>
            <div hidden class="portlet-body form result-div">
                <!-- BEGIN FORM-->
                <form class="horizontal-form">
                    <div class="form-actions right">
						<button type="button" class="btn green" id="save_opname"> SIMPAN</button>
                    </div>
                </form>
                <!-- END FORM-->
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
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data tersebut ?</span>
                <input id="id-delete" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button onclick="cancel()" class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Cek Stok Produk</h4>
            </div>
            <form id="formAdd" class="horizontal-form">
            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Masukkan Kode / Nama Produk</label>
                                <select id="search" name="search" class="form-control select2me">
                                	<?php echo $keyword; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Kode Produk</label>
                                <input type="hidden" id="ident" name="ident">
								<input type="text" id="produk_kode" name="produk_kode" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nama Produk</label>
                                <input type="hidden" id="produk_id" name="produk_id" class="form-control" readonly="readonly">
                                <input type="text" id="produk_nama" name="produk_nama" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Rak</label>
                                <input id="rak_name" name="rak_name" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Quantity</label>
                                <input type="text" id="quantity" name="quantity" class="form-control">
                                <input type="hidden" id="qty_stock" name="qty_stock" class="form-control" readonly="readonly">
                                <input type="hidden" id="rak_code" name="rak_code" class="form-control" readonly="readonly">
                                <input type="hidden" id="rak_status" name="rak_status" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button onclick="clear()" class="btn red" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button type="submit" class="btn green">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
// $(document).bind('keydown', 't', function() {
// 	document.getElementById('add_product').click();
//    	return false;
// });
function actEdit(Object) {
    var url = "<?php echo base_url($this->cname); ?>/detail_opname";
    var form_data = {
        id: Object
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg) {
            // alert(msg);
            data = JSON.parse(msg);
            $('#ident').val(data.id);
            // $('#search').val(data.product_code);
            $('#produk_kode').val(data.product_code);
            // $('#produk_id').val(data.product_id);
            $('#produk_nama').val(data.product_name);
            $('#rak_code').val(data.rak_code);
            $('#qty_stock').val(data.stock_qty);
            $('#quantity').val(data.checking_qty);
            $('#modal-add').modal('show');
        }
    });
    return false;
}

function actDel(Object) {
    $('#modal-confirm').modal('show');
    $('#id-delete').val(Object);
}

function delData(){
    var url = "<?php echo base_url($this->cname); ?>/delete_produk_opname";
    $.ajax({
        type: "POST",
        url: url,
        data: {id:$('#id-delete').val()},
        success: function(msg) {
            listProduk();
            $('#modal-confirm').modal('hide');
        }
    });
    return false;
}

function listProduk() {
    var reference = $('#reference_no').html();
    var url = "<?php echo base_url($this->cname); ?>/list_produk_opname";
    var form_data = {
        reference: reference
    };
    $.ajax({
        type: "POST",
        url: url,
        data: form_data,
        success: function(msg) {
            // alert(msg);
            data = msg.split('|');
            $('#list_produk').html(data[0]);
            $('#total_produk').html(data[1]);
        }
    });
    return false;
}

function cekTemp() {
    var url = "<?php echo base_url($this->cname); ?>/cek_temp_opname";
    var operator = $('#user_id').html();
    var date = $('#date').html();
    $.ajax({
        type: "POST",
        url: url,
        data: {
            operator: operator,
            date: date
        },
        success: function(msg) {
            // alert(msg);
            data = JSON.parse(msg);
            $('#reference_no').html(data.faktur);
            $('#date_show').html(data.date_show);
            $('#date').html(data.tanggal);
            $('#urut_faktur').html(data.urut_faktur);
            listProduk();
        }
    });
    return false;
}
$(document).ready(function() {
    cekTemp();
    $('#add_product').on('click', function() {
        $('#modal-add').modal('show');
        $('#search').focus();
    });
    $('#search').on('change', function() {
        var code = $('#search').val();
        var url = "<?php echo base_url($this->cname); ?>/get_data_produk";
        var form_data = {
            code: code
        };
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg) {
                // alert(msg);
                data = JSON.parse(msg);
                $('#produk_kode').val(data.product_code);
                $('#produk_nama').val(data.product_name);
                $('#rak_code').val(data.rak_code);
                $('#rak_name').val(data.rak_name);
                $('#rak_status').val(data.rak_status);
                $('#qty_stock').val(data.saldo);
            }
        });
        return false;
    });

    $('#formAdd').submit(function() {
        var reference = $('#reference_no').html();
        var date = $('#date').html();
        var ident = $('#ident').val();
        var rak_code = $('#rak_code').val();
        var rak_name = $('#rak_nama').val();
        var product_code = $('#produk_kode').val();
        var product_name = $('#produk_nama').val();
        var checking_qty = $('#quantity').val();
        var stock_qty = $('#qty_stock').val();
        var operator = $('#user_id').html();
        var urut = $('#urut_faktur').html();
        var rak_status = $('#rak_status').val();
        var url = "<?php echo base_url($this->cname); ?>/opname_insert";
        var form_data = {
            ident: ident,
            reference: reference,
            date: date,
            rak_code: rak_code,
            rak_name: rak_name,
            product_code: product_code,
            product_name: product_name,
            checking_qty: checking_qty,
            stock_qty: stock_qty,
            operator: operator,
            rak_status: rak_status,
            urut: urut
        };
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg) {
                // alert(msg);
                data = msg.split("|");
                if (data[0] == 1) {
                    clear();
                    listProduk();
                }
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {
                    $("#flash_message").hide();
                }, 3000);
            }
        });
        return false;
    });
    $('#compare').on('click', function() {
        var total = $('#total_produk').html();
        if (parseInt(total) > 0) {
            var reference_no = $('#reference_no').html();
            $('.browse-div').hide();

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
			        "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/stok_opname",
			        "fnServerData": function(sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "reference",
                            "value": reference_no
                        });
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


            $('.result-div').show();
        } else {
            alertify.alert('Maaf, tidak ada produk untuk di compare.');
        }
    });
    $('#save_opname').on('click', function() {
        var date = $('#date').html();
        var operator = $('#user_id').html();
        var reference_no = $('#reference_no').html();
        var urut = $('#urut_faktur').html();
        var url = "<?php echo base_url($this->cname); ?>/save_opname";
        var form_data = {
            date: date,
            operator: operator,
            reference: reference_no,
            urut: urut
        };
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg) {
                // alert(msg);
                data = msg.split("|");
                if (data[0] == 1) {
                    clear();
                    $('.result-div').hide();
                    $('.browse-div').show();
                }
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {
                    $("#flash_message").hide();
                    window.location.reload();
                }, 1000);
            }
        });
        return false;
    });

    function clear() {
        $('#search').val('');
        $('#ident').val('');
        $('#produk_kode').val('');
        $('#produk_nama').val('');
        $('#rak_code').val('');
        $('#qty_stock').val('');
        $('#rak_nama').val('');
        $('#quantity').val('');
        $('#modal-add').modal('hide');
    }
});
</script>