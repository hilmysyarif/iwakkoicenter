<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Grafik Top Pelanggan
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Laporan</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url().$this->module.'/grafik'; ?>">Grafik</a></li>
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
            
            <div class="tile bg-green" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_top_produk'">
                <div class="tile-body">
                    <i class="icon-thumbs-up"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Top Produk
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            
            <div class="tile bg-yellow" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_low_produk'">
                <div class="tile-body">
                    <i class="icon-thumbs-down"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Low Produk
                    </div>
                    <div class="number">
                        <!-- (O) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-red" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_pelanggan'">
                <div class="tile-body">
                    <i class="icon-thumbs-up"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Top Pelanggan
                    </div>
                    <div class="number">
                        <!-- (L) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_omset'">
                <div class="tile-body">
                    <i class="icon-money"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Omset
                    </div>
                    <div class="number">
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
                <div class="caption"><i class="icon-list"></i>&nbsp;Top Pelanggan</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <form id="form_terapis" class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Grafik Top Pelanggan</h3>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" id="tgl_awal" name="tgl_awal" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="tgl_awal">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label class="control-label">s/d</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" id="tgl_akhir" name="tgl_akhir" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="tgl_akhir">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <button type="reset" class="btn default">Cancel</button> -->
                        <button type="submit" class="btn green"><i class="icon-ok"></i> Tampilkan</button>
                    </div>
                </form>
                <br><br>
                <div id="chart">
                    <!-- grafik -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
        $('#form_terapis').submit(function(){
           var url = "<?php echo base_url($this->cname); ?>/grafik_top_terapis";
           $.ajax({
              type: "POST",
              url: url,
              data: $('#form_terapis').serialize(),
              success: function(msg)
              {
                 // data = msg.split('|');
                 // if(data[0]==1){
                 //    clear();
                 // }
                 // $('#flash_message').html(data[1]);
                 // setTimeout(function(){$('#flash_message').html('')},3000);
                 $('#chart').html(msg);
              }
           });
           return false;
        });

</script>

