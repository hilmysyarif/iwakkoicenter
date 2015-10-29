<div id="fx-container" class="fx-opacity">
	<div id="page-content" class="block">
		<div class="row">
			<div class="col-sm-12">
				<div class="metro_nav" style="padding-right:40px;">
					<ul style="white-space:normal;">
						<li>
							<a href="<?php echo base_url($this->cname); ?>/rak/tambah"><img src="<?php echo base_url(); ?>public/images/icon/setup_rak.png" /><span>Set Rak</span></a>
						</li>
						<li>
							<a href="<?php echo base_url($this->cname); ?>/rak/daftar"><img src="<?php echo base_url(); ?>public/images/icon/daftar.png" /><span>Daftar Rak Pro</span></a>
						</li>
						<li class="pull-right">
							<a href="<?php echo base_url($this->cname); ?>/menu"><img src="<?php echo base_url(); ?>public/images/icon/menu.png" /><span>Menu Produk</span></a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="multi-div">
					<div class="row">
						<div class="col-sm-4">
							<blockquote>
								<p><i class="icon-file-text"></i> Penentuan Rak Produk</p>
							</blockquote>
						</div>
					</div>
					<span id="flash_message_multi"></span>
					<form id="addMultiRak" method="post">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Pilih Produk</span>
								<select id="products" name="products[]" class="select-chosen form-control" data-placeholder="Pilih Produk" multiple>
								</select>
								<span class="input-group-addon"><i class="icon-credit-card"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Rak Toko</span>
								<select id="rak_code" name="rak_code" class="form-control select-chosen" data-placeholder="Pilih Rak">
									<option value=""></option>
									<?php foreach ($toko as $key => $value): ?>
										<option value="<?php echo $value->kode; ?>"><?php echo $value->nama; ?></option>
									<?php endforeach ?>
								</select>
								<span class="input-group-addon"><i class="icon-list"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Rak Gudang</span>
								<select id="gudang_code" name="gudang_code" class="form-control select-chosen" data-placeholder="Pilih Rak">
									<option value=""></option>
									<?php foreach ($gudang as $key => $value): ?>
										<option value="<?php echo $value->kode; ?>"><?php echo $value->nama; ?></option>
									<?php endforeach ?>
								</select>
								<span class="input-group-addon"><i class="icon-list"></i></span>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<div class="block full" style="margin-top:10px;" id="search-div">
					<div class="row">
						<div class="block-section">
							<span id="notif"></span>
							<form id="form-search" method="post">
								<div class="input-group input-group-lg">
									<div class="input-group-btn">
										<select id="category" name="category" class="form-control" size="1" style="width: 200px; height: 45px; font-size: 17px; background-color: #D8D8D8;">
											<option value="">Pilih Filter</option>
											<option value="name">Nama</option>
											<option value="code">Kode</option>
										</select>
									</div>
									<input id="keyword" name="keyword" class="form-control" placeholder="Search Keyword.." type="text">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="icon-search icon-fixed-width"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="margin-top: -30px;">
							<h4 class="sub-header">SEARCH RESULT</h4>
							<div class="ms-message-list list-group" id="result">
								<a href="javascript:void(0)" class="list-group-item" >
									<img src="<?php echo base_url(); ?>public/img/template/avatar2.jpg" alt="Avatar" class="media-object pull-left" width="50" height="50">
									<h4 class="list-group-item-heading" style="padding-left:60px; max-width:70%;">Tidak Ada Hasil Pencarian</h4>
									<h5 class="list-group-item-heading" style="padding-left:60px; min-height: 22px;">Silahkan Anda masukkankan kata kunci pada kolom search.</h5>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="block full" style="margin-top:10px;" id="list-div">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Rak Produk</p>
							</blockquote>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example-datatable" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="75px" class="text-center">No</th>
									<th width="">Kode</th>
									<th width="">Nama Produk</th>
									<th width="220px">Rak Toko</th>
									<th width="220px">Rak Gudang</th>
									<th width="60px"></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		webApp.datatables(),
		$("#example-datatable").dataTable({
			// aoColumnDefs:[{
			// 	bSortable:!1,
			// 	aTargets:[4]
			// }],
			fnDrawCallback: function ( oSettings ) {
				/* Need to redo the counters if filtered or sorted */
				if ( oSettings.bSorted || oSettings.bFiltered )
				{
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
					{
						$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
					}
				}
			},
			aoColumnDefs: [
				{ "bSortable": false, "aTargets": [ 0,5 ] }
			],
			bProcessing:true,
			bServerSide:true,
			sAjaxSource: "<?php echo base_url($this->module); ?>/_datatable/product_rak/",
			iDisplayLength:10,
			aLengthMenu:[[10,15,30,50,-1],[10,15,30,50,"All"]],
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
		}),
		$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")
	});
</script>
<script type="text/javascript">
function begin(){
	var one = "<?php echo $this->uri->segment(4); ?>";
	var two = "<?php echo $this->uri->segment(5); ?>";
	if(IsNumeric(two) && one == 'tambah'){
		$("#multi-div").show();
		$("#search-div").hide();
		$("#list-div").hide();
		optProduct();

		var url = "<?php echo base_url($this->cname); ?>/detail_rak_produk";
		var form_data = {
			id:two
		};
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
				// alert(msg);
				data = JSON.parse(msg);
				$("#products").val(data.code);
				$("#products").trigger("chosen:updated");
				$("#rak_code").val(data.rak_code);
				$("#rak_code").trigger("chosen:updated");
				$("#gudang_code").val(data.gudang_code);
				$("#gudang_code").trigger("chosen:updated");
			}
		});
		return false;
	} else if (one == 'tambah'){
		$("#multi-div").show();
		$("#search-div").hide();
		$("#list-div").hide();
		optProduct();
	} else if(one == 'daftar'){
		$("#multi-div").hide();
		$("#search-div").hide();
		$("#list-div").show();
	} else if(one == "cari") {
		$("#multi-div").hide();
		$("#search-div").show();
		$("#list-div").hide();
	} else {
		window.location = "<?php echo base_url($this->cname); ?>/rak/daftar";
	}
}
function IsNumeric(input)
{
    return (input - 0) == input && (''+input).replace(/^\s+|\s+$/g, "").length > 0;
}
function optProduct(){
	// var obj = Object;
	var url = "<?php echo base_url($this->cname); ?>/opt_for_rak";
	var form_data = {
	
	};
	$.ajax({
		type: "POST",
		url: url,
		data: form_data,
		success: function(msg)
		{
			// alert(obj);
			$("#products").html(msg);
			$("#products").trigger("chosen:updated");
		}
	});
	return false;
}
$(document).ready(function(){
	begin();
	$("#form-search").submit(function(){
		var category = $('#category').val();
		var keyword = $('#keyword').val();
		var url = "<?php echo base_url($this->cname); ?>/mencari_diskon";
		var form_data = {
			category: category,
			keyword: keyword
		};
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
				// alert(msg);
				data = msg.split('|');
				if(data[0]==1) {
					$("#notif").hide()
					$("#result").html(data[1]);
				} else {
					$("#notif").show()
					$("#result").html(data[1])
				}
			}
		});
		return false;
	});
	$("#keyword").keyup(function(){
		var category = $('#category').val();
		var keyword = $('#keyword').val();
		var url = "<?php echo base_url($this->cname); ?>/mencari_diskon";
		var form_data = {
			category: category,
			keyword: keyword
		};
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
				// alert(msg);
				data = msg.split('|');
				if(data[0]==1) {
					$("#notif").hide()
					$("#result").html(data[1]);
				} else {
					$("#notif").show()
					$("#result").html(data[1])
				}
			}
		});
		return false;
	});
	$("#addMultiRak").submit(function(){
		var produk = $("#products").val();
		var rak = $("#rak_code").val();
		var gudang = $("#gudang_code").val();
		var url = "<?php echo base_url($this->cname); ?>/set_rak_produk";
		// alert(produk);
		var form_data = {
			code:produk,
			rak_code:rak,
			gudang_code:gudang
		};
		$.ajax({
			type: "POST",
			url: url,
			data: form_data,
			success: function(msg)
			{
				// alert(msg);
				data = msg.split("|");
				if(data[0]==1){
					clear();
				}
				$("#flash_message_multi").show();
				$("#flash_message_multi").html(data[1]);
				// $("#flash_message_multi").html(msg);
				setTimeout(function() {$("#flash_message_multi").hide();}, 1500);
			}
		});
		return false;
	});
	function clear(){
		$('option').prop('selected', false);
    	$('select').trigger('chosen:updated');
	}
});
</script>