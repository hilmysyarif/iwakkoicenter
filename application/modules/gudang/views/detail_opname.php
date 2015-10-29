<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Validasi Opname
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Validasi</a><i class="icon-angle-right"></i></li>
         <li><a href="">Opname</a></li>
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
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Print Daftar Produk</div>
            </div>
            <span id="flash_message"></span>
            <div class="portlet-body browse-div">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <strong> VALIDASI STOK OPNAME</strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <i class="icon-user"></i><strong> OPERATOR</strong>
                            <span class="pull-right"><?php echo $user[0]->nama ?></span>
							<span id="user_name" class="pull-right" style="display:none"><?php echo $user[0]->uname; ?></span><span id="user_id" style="display:none"><?php echo $user[0]->uid; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <i class="icon-calendar"></i><strong> TANGGAL</strong>
							<span id="tgl" class="pull-right"><?php echo TanggalIndo(date('Y-m-d')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body browse-div">
                <div class="table-responsive">
					<table class="table table-bordered table-hover" >
						<thead>
							<tr>
								<th width="75px" class="text-center">No</th>
								<th width="" class="text-center">Tanggal</th>
								<th width="" class="text-center">Operator</th>
								<th width="" class="text-center">Kode Opname</th>
								<th width="120px" class="text-center"></th>
							</tr>
						</thead>
						<tbody id="list_produk">
						</tbody>
					</table>
				</div>
            </div>

            <div hidden class="portlet-body result-div">
            	<div class="row">
                    <div class="col-md-12">
                        <div class="note note-warning">
                            <strong> HASIL STOK COMPARE </strong> <span id="set_reference"></span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
					<table id="example-datatable" class="table table-bordered table-hover" >
						<thead>
							<tr>
								<th width="35px" class="text-center">No</th>
								<th class="text-center">Kode</th>
								<th class="text-center">Nama Produk</th>
								<th width="120px" class="text-center">Rak</th>
								<th width="80px" class="text-center">Qty Opname</th>
								<th width="80px" class="text-center">Qty Stok</th>
								<th width="80px" class="text-center">Selisih</th>
								<th width="80px" class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-md-12">
							
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<textarea id="note" name="note" rows="6" class="form-control" placeholder="Keterangan"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<button class="btn btn-block btn-lg btn-success" id="dont_adjust"> JANGAN SESUAIKAN</button>
					</div>
					<div class="col-sm-6">
						<button class="btn btn-block btn-lg btn-primary" id="adjust"> SESUAIKAN</button>
					</div>
				</div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div id="modal-add" class="modal" aria-hidden="true" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h4 class="modal-title">Validasi Stok Produk</h4>
			</div>
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<form id="formAdd" method="post">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Keterangan</span>
								<textarea id="note" name="note" rows="6" class="form-control" placeholder="Keterangan"></textarea>
							</div>
						</div>
						<div class="form-group">
						<input type="hidden" name="id_stok" id="id_stok">
							<a id="validate_stok" class="btn btn-primary">Validasi</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function actDetail(Object) {
	var reference_no = Object;
	$('#set_reference').html(Object);
	$('.browse-div').hide();

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
        "sAjaxSource": "<?php echo base_url($this->module); ?>/_datatable/stok_opname_detail_l",
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
}
function listProduk(){
	// alert('asdasd');
	var url = "<?php echo base_url($this->cname); ?>/get_valid_opname_data";
	$.ajax({
		url: url,
		success: function(msg)
		{
			// alert(msg);
			data = msg.split('|');
			$('#list_produk').html(data[0]);
		}
	});
	return false;
}
$(document).ready(function(){
	listProduk();
	$('#dont_adjust').on('click',function(){
		var reference_no = $('#set_reference').html();
		var note = $('#note').val();
		var approved = $('#user_name').html();
		var url = "<?php echo base_url($this->cname); ?>/opname_dont_adjust";
		var form_data = {
			description: note,
			approved_by: approved,
			reference: reference_no
		};
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
				// alert(msg);
				$('.result-div').hide();
				$('.browse-div').show();
				data = msg.split("|");
				if(data[0]==1){
					clear();
					listProduk();
				}
				$("#flash_message").show();
				$("#flash_message").html(data[1]);
				setTimeout(function() {$("#flash_message").hide();}, 3000);
			}
		});
		return false;
	});
	$('#adjust').on('click',function(){
		var reference_no = $('#set_reference').html();
		var note = $('#note').val();
		var approved = $('#user_name').html();
		var url = "<?php echo base_url($this->cname); ?>/opname_adjust";
		var form_data = {
			description: note,
			approved_by: approved,
			reference: reference_no
		};
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
				$('.result-div').hide();
				$('.browse-div').show();
				data = msg.split("|");
				if(data[0]==1){
					clear();
					listProduk();
				}
				$("#flash_message").show();
				$("#flash_message").html(data[1]);
				setTimeout(function() {$("#flash_message").hide();}, 3000);
			}
		});
		return false;
	});
	function clear(){
		$('#note').val('');
		$('#set_reference').html('');
		$('#modal-add').modal('hide');
	}
});
</script>