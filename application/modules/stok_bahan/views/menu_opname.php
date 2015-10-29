
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Menu Stok Opname
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?php echo base_url();?>dashboard">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="<?php echo base_url($this->module); ?>">stok_bahan</a><i class="icon-angle-right"></i></li>
			<li><a href="<?php echo base_url($this->cname); ?>">Stok Opname</a></li>
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
			<div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/print_product'">
				<div class="tile-body">
					<i class="icon-print"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Print
					</div>
					<div class="number">
						<!-- (T) -->
					</div>
				</div>
			</div>
			<div class="tile bg-yellow" onclick="window.location='<?php echo base_url($this->cname); ?>/stok'">
				<div class="tile-body">
					<i class="icon-stackexchange"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Opname
					</div>
					<div class="number">
						<!-- (D) -->
					</div>
				</div>
			</div>
			<div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/validasi_opname'">
				<div class="tile-body">
					<i class="icon-ok"></i>
				</div>
				<div class="tile-object">
					<div class="name">
						Validasi Opname
					</div>
					<div class="number">
						<!-- (D) -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>