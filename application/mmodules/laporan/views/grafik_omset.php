<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Grafik Omset
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
            <!-- <div class="tile bg-red" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_pelanggan'">
                <div class="tile-body">
                    <i class="icon-thumbs-up"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Top Pelanggan
                    </div>
                    <div class="number">
                        (L)
                    </div>
                </div>
            </div> -->
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
<div class="row" id="top_produk">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp; Grafik Omset</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <form id="form_omset" class="horizontal-form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" placeholder="tgl awal" name="tgl_awal" id="tgl_awal">
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="form-control" placeholder="tgl akhir" name="tgl_akhir" id="tgl_akhir">
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
    
        $('#form_omset').submit(function(){
           var url = "<?php echo base_url($this->cname); ?>/grafik_omset";
           $.ajax({
              type: "POST",
              url: url,
              data: $('#form_omset').serialize(),
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

