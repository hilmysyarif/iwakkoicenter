<div id="fx-container" class="fx-opacity">
	<div id="page-content" class="block">
		<div class="row">
			<div class="col-sm-12">
				<div class="metro_nav" style="padding-right:40px;">
					<ul style="white-space:normal;">
						<li>
							<a href="<?php echo base_url($this->cname); ?>/tambah"><img src="<?php echo base_url(); ?>public/images/icon/tambah.png" /><span>Tambah Akun</span></a>
						</li>
						<li>
							<a href="<?php echo base_url($this->cname); ?>/data"><img src="<?php echo base_url(); ?>public/images/icon/daftar.png" /><span>Master akun</span></a>
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
				<div class="block full" style="margin-top:10px;" id="scan-div">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Detail Master Rekening</p>
							</blockquote>
						</div>
					</div>
					<div class="row" style="border-top:1px dotted black;">
						<div class="list-group">
							<a href="javascript:void(0)" class="list-group-item" style="">
							<h4 class="list-group-item-heading">
							<strong><?php echo $val['name']; ?></strong>
							</h4>
							<img src="<?php echo base_url(); ?>public/img/template/avatar2.jpg" alt="Avatar" class="media-object pull-right" width="150px" height="150px" style="margin-right:30px;">
							<p class="list-group-item-text">
							<table id="general-table" class="table table-stripped" style="max-width:80%;">
								<tbody>
									<tr>
										<td width="250px">Kode Rekening</td>
										<td><?php echo $val['code']; ?></td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td><?php echo $val['keterangan']; ?></td>
									</tr>
									<tr>
										<td>Parent Rekening</td>
										<td><?php echo $val['name_parent']; ?></td>
									</tr>
								</tbody>
							</table>
							</p>
							<a href="<?php echo base_url($this->cname).'/tambah/'.$val['id']; ?>" type="button" class="btn btn-success" style="margin-top:20px;">Edit</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>