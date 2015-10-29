<?php 
	$user = $this->session->userdata('astrosession'); 
	$tgl = date('Y-m-d');
	$tgl_show = TanggalIndo(date('Y-m-d'));
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Print Daftar Produk
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?php echo base_url();?>dashboard">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
			<li><a href="<?php echo base_url($this->cname); ?>">Stok Opname</a><i class="icon-angle-right"></i></li>
			<li><a href="">Print Daftar Produk</a></li>
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
		<div class="tiles" style="padding:10px; margin-right:0px; background-color:none;height:155px">
			<div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/print_product'">
				<div class="tile-body">
					<i class="icon-print"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Print Several
					</div>
					<div class="number">
						<!-- (T) -->
					</div>
				</div>
			</div>
			<div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/print_all'">
				<div class="tile-body">
					<i class="icon-print"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Print All
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
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Print Daftar Produk</div>
            </div>
            <span id="flash_message"></span>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Kode Print</span>
                            <span id="reference_no" class="pull-right"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-truck"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"><?php echo $tgl_show; ?></span>
							<span id="date" style="display:none"><?php echo $tgl; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Operator</span>
                            <span id="user_name" class="pull-right"><?php echo $user[0]->nama; ?></span>
							<span id="user_id" style="display:none"><?php echo $user[0]->id; ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn green pull-right" id="add_product">
                            <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Produk
                        </a>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                            	<th class="text-center" width="75px">No</th>
								<th class="text-center" width="">Kode</th>
								<th class="text-center" width="">Nama</th>
								<th class="text-center" width="">Rak</th>
								<th class="text-center" width="150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="list_produk">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form" action="<?php echo base_url($this->cname); ?>/print_several" method="POST">
                    <div class="form-actions right">
                    	<input type="hidden" id="reference_form" name="reference_form">
						<button type="submit" class="btn green" id="print"> PRINT</button>
                        <!-- <button onclick="actCancel()" type="button" class="btn default">Batal</button>
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Simpan</button> -->
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
                <h4 class="modal-title" style="color:#fff;">Tambah Produk Ke List</h4>
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
                                <input type="text" id="product_code" name="product_code" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nama Produk</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Kode Rak</label>
                                <input type="text" id="rak_code" name="rak_code" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nama Rak</label>
                                <input type="text" id="rak_name" name="rak_name" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nama Rak</label>
                                <input type="text" id="rak_name" name="rak_name" class="form-control" readonly>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <input hidden type="text" id="id_produk" value="">
                <button onclick="clear()" class="btn red" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button type="submit" class="btn green">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
// $(document).bind('keydown', 't', function() {
// 	$('#modal-add').modal('show');
// 	$('#search').focus();
//    	return false;
// });
function cekTemp () {
	var date = $('#date').html();
	var operator = $('#user_id').html();
	var url = "<?php echo base_url($this->cname); ?>/cek_temp";
	$.ajax({
		type: "POST",
		url: url,
		data: {date:date, operator:operator},
		success: function(msg)
		{
			// alert(msg);
			$('#reference_no').html(msg);
			$('#reference_form').val(msg);
			listProduk();
		}
	});
	return false;
}
function listProduk() {
	var reference = $('#reference_no').html();
	var url = "<?php echo base_url($this->cname); ?>/list_produk";
	$.ajax({
		type: "POST",
		url: url,
		data: {reference:reference},
		success: function(msg)
		{
			// alert(msg);
			$('#list_produk').html(msg);
		}
	});
	return false;
}
function delObj (Object) {
	$('#modal-confirm').modal('show');
  	$('#id-delete').val(Object);
}
function delData(){
    var url = '<?php echo base_url($this->cname); ?>/delete_produk';
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
function clear(){
	$('#search').val('');
	$('#search').select2().trigger('change');
	$('#product_code').val('');
	$('#product_name').val('');
	$('#rak_code').val('');
	$('#rak_name').val('');
}
$(document).ready(function(){
	cekTemp();
	$('#add_product').on('click',function(){
		$('#modal-add').modal('show');
		$('#search').focus();
	});
	$('#search').on('change',function(){
		var url = "<?php echo base_url($this->cname); ?>/mencari";
		
		$.ajax({
			type: "POST",
			url: url,
			data: {keyword:$('#search').val()},
			success: function(msg)
			{
				// alert(msg);
				data = JSON.parse(msg);
				$('#product_code').val(data.product_code);
				$('#product_name').val(data.product_name);
				$('#rak_code').val(data.rak_code);
				$('#rak_name').val(data.rak_name);
			}
		});
		return false;

	});
	$('#formAdd').submit(function(){
		var url = "<?php echo base_url($this->cname); ?>/tambah_produk";
		var form_data = $('#formAdd').serializeArray();
		form_data.push({name: 'date', value: $('#date').html()});
		form_data.push({name: 'operator', value: $('#user_id').html()});
		form_data.push({name: 'reference', value: $('#reference_no').html()});
		$('#modal-add').modal('hide');
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
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
});
</script>