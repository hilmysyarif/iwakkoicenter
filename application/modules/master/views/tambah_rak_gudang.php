<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Menu Karyawan
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?php echo base_url();?>dashboard">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
			<li><a href="">Rak</a></li>
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
			<div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/tambah'">
				<div class="tile-body">
					<i class="icon-plus-sign"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Tambah
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
						Daftar Rak
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
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-list"></i>&nbsp;Tambah Rak</div>
			</div>
			<div class="portlet-body">
				<span id="flash_message"></span>
				<div class="block full" style="margin-top:10px;" id="tambah-div">
					<span id="flash_message" style="display:none"></span>
					<form id="formRak" method="post">
						<div class="form-group">
							<div class="input-group">
								<input type="hidden" id="status" name="status" class="form-control" value="status">
							</div>
						</div>
						<div class="form-group">
							<span class="input-group-addon">Jenis Rak</span>
							<select name="jenis" id="jenis" class="form-control select2" required>
								<option value=""></option>
								<option value="GB">Rak - Gudang Bahan</option>								
								<option value="GP">Rak - Gudang Produk</option>								
							</select>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Kode</span>
								<input type="text" id="kode" name="kode" class="form-control" required>
								<span class="input-group-addon"><i class="icon-key"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Nama</span>
								<input type="text" id="nama" name="nama" class="form-control" required>
								<span class="input-group-addon"><i class="icon-credit-card"></i></span>
							</div>
						</div>						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Keterangan</span>
								<input type="text" id="keterangan" name="keterangan" class="form-control">
								<span class="input-group-addon"><i class="icon-credit-card"></i></span>
							</div>
						</div>
						<input type="hidden" id="id" name="id">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
				<span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data Karyawan tersebut ?</span>
				<input id="id-delete" type="hidden">
			</div>
			<div class="modal-footer" style="background-color:#eee">
				<button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
				<button onclick="delData()" class="btn red">Ya</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function begin (argument) {
		var id = '<?php echo $this->uri->segment(4); ?>';
		if(id){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url($this->cname).'/get_data'; ?>",
				data: {id:id},
				success: function(msg)
				{
				// alert(msg);
				data = JSON.parse(msg);
				$('#id').val(data.id);
				$('#jenis').val(data.jenis);
				$('#kode').val(data.kode);
				$('#nama').val(data.nama);
				$('#keterangan').val(data.keterangan);
			}
		});
			return false;
		}
	}

	

	$(document).ready(function(){
		begin();


		$('#formRak').submit(function(){
		// alert(sip);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url($this->cname).'/ins_rak'; ?>",
			data: $('#formRak').serialize(),
			success: function(msg)
			{
				data = msg.split("|");
				if(data[0]==1){
					clear();
				}
				$("#flash_message").show();
				$("#flash_message").html(data[1]);
				setTimeout(function() {$("#flash_message").hide();}, 3000);
			}
		});
		return false;
	});
		function clear() {
			$('#id').val('');
			$('#jenis').val('');
			$('#kode').val('');
			$('#nama').val('');
			$('#keterangan').val('');
		}
	});
</script>