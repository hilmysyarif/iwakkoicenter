<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Master Akun
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="">Master Akun</a></li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:#ffffff; height:155px">
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
                        Daftar
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Master Akun</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <span id="flash_message"></span>
        <form class="horizontal-form" name="formRekening" id="formRekening">
            <div class="form-body">
                <h3 class="form-section">Details Information</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Parent Rekening</span>
								<select id="parent" name="parent" class="select2me form-control" data-placeholder="Pilih Rekening">
									
								</select>
								<span class="input-group-addon"><i class="icon-list"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Jenis</span>
								<select id="position" name="position" class="select2me form-control" data-placeholder="Pilih Jenis">
									<option value="">Pilih Jenis</option>
									<option value="header">Header</option>
									<option value="detail">Detail</option>
								</select>
								<span class="input-group-addon"><i class="icon-list"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Kode Akun</span>
								<input type="text" id="code" name="code" class="form-control" placeholder="Kode Akun" readonly>
								<input type="hidden" id="id" name="id" class="form-control">
								<input type="hidden" id="code_ref" name="code_ref" class="form-control">
								<input type="hidden" id="urut" name="urut" class="form-control">
								<input type="hidden" id="space" name="space" class="form-control">
								<span class="input-group-addon"><i class="icon-key"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Nama Akun</span>
								<input type="text" id="name" name="name" class="form-control" placeholder="Nama Akun">
								<span class="input-group-addon"><i class="icon-key"></i></span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Keterangan</span>
								<select id="keterangan" name="keterangan" class="select2me form-control" data-placeholder="Pilih Keterangan">
									<option value="">Pilih Keterangan</option>
									<option value="neraca">Neraca</option>
									<option value="L/R">L/R</option>
								</select>
								<span class="input-group-addon"><i class="icon-list"></i></span>
							</div>
						</div>
                    </div>
                </div>
                
            </div>
            <div class="form-actions right">
                <button type="reset" class="btn default">Cancel</button>
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
<script type="text/javascript">
function begin(){
	optRekening();
	var val = '<?php echo $this->uri->segment(4); ?>';
	if(val){
		// alert(val);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url($this->cname).'/get_data'; ?>",
			data: {id:val},
			success: function(msg)
			{
				// alert(msg);
				data = JSON.parse(msg);
				$('#id').val(data.id);
				$('#parent').val(data.parent);
				$('#parent').select2().trigger('change');

				$('#position').val(data.position);
				$('#position').select2().trigger('change');

				$('#keterangan').val(data.keterangan);
				$('#keterangan').select2().trigger('change');

				$('#code').val(data.code);
				$('#name').val(data.name);
				$('#code_ref').val(data.code_ref);
				$('#urut').val(data.urut);
				$('#space').val(data.space);
			}
		});
		return false;
	}
}
function optRekening(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($this->cname).'/get_opt_rekening'; ?>",
		data: {},
		success: function(msg)
		{
			// alert(msg);
			$('#parent').html(msg);
			$('#parent').select2().trigger('change');
		}
	});
	return false;
}
function genCode(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($this->cname).'/gen_code'; ?>",
		data: {code:$('#parent').val()},
		success: function(msg)
		{
			// alert(msg);
			data = JSON.parse(msg);
			$('#code').val(data.code);
			$('#space').val(data.space);
			$('#urut').val(data.urut);
			$('#code_ref').val(data.code_ref);
		}
	});
	return false;
}
function headCode(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($this->cname).'/head_code'; ?>",
		data: {},
		success: function(msg)
		{
			// alert(msg);
			data = JSON.parse(msg);
			$('#code').val(data.code);
			$('#space').val(data.space);
			$('#urut').val(data.urut);
			$('#code_ref').val(data.code_ref);
		}
	});
	return false;
}
function customCode(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($this->cname).'/custom_code'; ?>",
		data: {code:$('#code').val()},
		success: function(msg)
		{
			// alert(msg);
			data = JSON.parse(msg);
			$('#code').val(data.code);
			$('#space').val(data.space);
			$('#urut').val(data.urut);
			$('#code_ref').val(data.code_ref);
		}
	});
	return false;
}
$(document).ready(function(){
	begin();
	$('#parent').change(function(){
		var parent = $('#parent').val();
		if(parent == ''){
			$('#code').removeAttr('readonly');
			// $('#code').val('');
			headCode();			
		} else {
			genCode();
			$('#code').attr('readonly','readonly');
		}
	});
	$('#position').change(function(){
		var parent = $('#parent').val();
		if(parent == ''){
			$('#code').removeAttr('readonly');
			// $('#code').val('');
			headCode();
		} else {
			genCode();
			$('#code').attr('readonly','readonly');
		}
	});
	$('#code').on('blur', function(){
		var parent = $('#parent').val();
		if(parent == ''){
			customCode();
		}
	});
	$('#formRekening').submit(function(){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url($this->cname).'/ins_rekening'; ?>",
			data: $('#formRekening').serialize(),
			success: function(msg)
			{
				// alert(msg);
				data = msg.split("|");
				if(data[0]==1){
					clear();
					optRekening();
				}
				$("#flash_message").show();
				$("#flash_message").html(data[1]);
				setTimeout(function() {$("#flash_message").hide(); $('#parent').select2('open');}, 1500);
			}
		});
		return false;
	});
	function clear(){
		$('#parent').val('');
		$('#parent').select2().trigger('change');

		$('#position').val('');
		$('#position').select2().trigger('change');

		$('#keterangan').val('');
		$('#keterangan').select2().trigger('change');

		$('#code').val('');
		$('#name').val('');
		$('#code_ref').val('');
		$('#urut').val('');
		$('#space').val('');
	}
});
</script>