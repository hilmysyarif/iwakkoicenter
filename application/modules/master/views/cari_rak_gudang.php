<div id="fx-container" class="fx-opacity">
	<div id="page-content" class="block">
		<div class="row">
			<div class="col-sm-12">
				<div class="metro_nav" style="padding-right:40px;">
					<ul style="white-space:normal;">
						<li>
							<a href="<?php echo base_url($this->cname); ?>/tambah"><img src="<?php echo base_url(); ?>public/images/icon/tambah.png" /><span>Tambah</span></a>
						</li>
						<li>
							<a href="<?php echo base_url($this->cname); ?>/data"><img src="<?php echo base_url(); ?>public/images/icon/daftar.png" /><span>Daftar List</span></a>
						</li>
						<li>
							<a href="<?php echo base_url($this->cname); ?>/cari"><img src="<?php echo base_url(); ?>public/images/icon/cari.png" /><span>Cari</span></a>
						</li>
						<li class="pull-right">
							<a href="<?php echo base_url($this->module); ?>"><img src="<?php echo base_url(); ?>public/images/icon/retail.png" /><span>Home</span></a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="search-div">
					<div class="row">
						<div class="block-section">
							<span id="notif"></span>
							<form id="form-search" method="post">
								<div class="input-group input-group-lg">
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
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#form-search").submit(function(){
		var category = $('#category').val();
		var keyword = $('#keyword').val();
		var url = "<?php echo base_url($this->cname); ?>/mencari";
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
		var url = "<?php echo base_url($this->cname); ?>/mencari";
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
});
</script>