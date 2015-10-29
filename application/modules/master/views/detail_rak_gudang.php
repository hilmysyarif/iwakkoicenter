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
                <div class="caption"><i class="icon-list"></i>&nbsp;Detail Rak</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <div class="block full" style="margin-top:10px;" id="tambah-div">
					<span id="flash_message" style="display:none"></span>
					<div class="list-group">
							<table id="general-table" class="table table-stripped" style="max-width:80%;">
								<tbody>
									<tr>
										<td>Kode</td>
										<td><?php echo $val['kode']; ?></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td><?php echo $val['nama']; ?></td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td><?php echo $val['keterangan']; ?></td>
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