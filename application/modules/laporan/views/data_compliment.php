<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Laporan Compliment
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Laporan</a><i class="icon-angle-right"></i></li>
            <li><a href="">Data</a></li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:#eee; height:155px">
            <div class="tile bg-yellow pull-right" onclick="window.location='<?php echo base_url($this->cname); ?>'">
                <div class="tile-body">
                   <i class="icon-share"></i>
                </div>
                <div class="tile-object">
                   <div class="name">
                      kembali
                   </div>
                   <div class="number">
                      <!-- (G) -->
                   </div>
                </div>
             </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp;Data Compliment</div>
            </div>
            <div class="portlet-body form">
                <span id="flash_message"></span>
                <form id="form_gaji" class="horizontal-form" method="POST" action="<?php echo base_url($this->cname); ?>/pdf_compliment" target="_blank">
                    <div class="form-body">
                        <h3 class="form-section">Data Compliment</h3>
                        <!-- <div class="row">
                            <div class="form-group">
                                <label  class="col-md-2 control-label">Gudang</label>
                                <div class="col-md-4">
                                    <select name="gudang" id="gudang" class="form-control">
                                        <option value="">Pilih Gudang</option>
                                        <?php foreach ($gudang as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->kode;?>"><?php echo $value->nama;?></option>
                                        <?php } ?>  
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" placeholder="tgl awal" name="tgl_awal" id="tgl_awal">
                                    <span class="input-group-addon">s/d</span>
                                    <input type="text" class="form-control" placeholder="tgl akhir" name="tgl_akhir" id="tgl_akhir">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions right">
                        <button type="button" class="btn blue" onclick="list_compliment()"><i class="icon-ok"></i> Tampilkan</button>
                        <button type="submit" class="btn default" id="print">Print</button>
                    </div>
                </form>
            </div>
            <div class="portlet-body" id="panel_compliment">
                <div class="table-responsive">
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>No Invoice</th>
                                <th>Tanggal</th>
                                <th>Meja</th>
                                <th>Jumlah Tagihan</th>
                                <th>Oleh</th>
                            </tr>
                        </thead>
                        <tbody id="daftar_list_compliment">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#print').hide();
$('#panel_compliment').hide();

function list_compliment(){
    var tgl_awal = $('#tgl_awal').val();
    var tgl_akhir = $('#tgl_akhir').val();
    // var gudang = $('#gudang').val();
    var url = "<?php echo base_url($this->cname);?>/table_compliment";

    $.ajax({
        type: "POST",
        url: url,
        data: {tgl_awal:tgl_awal,tgl_akhir:tgl_akhir},// gudang:gudang},
        success: function(msg) {
            // alert(msg);
            $('#print').show();
            $('#panel_compliment').show();
            $('#daftar_list_compliment').html(msg);
        }
    });
}
</script>
