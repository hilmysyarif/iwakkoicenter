<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Grafik Transaksi
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
            <div class="tile bg-red" onclick="window.location='<?php echo base_url().$this->module; ?>/lap_grafik/load_transaksi'">
                <div class="tile-body">
                    <i><img src="<?php echo base_url(); ?>/public/img/icon/gudang/store/laporan.png" /></i>
                </div>
                <div class="tile-object">
                    <div class="name">  
                        Penjualan
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
                <div class="caption"><i class="icon-list"></i>&nbsp; Grafik Penjualan</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <form action="<?php echo base_url($this->cname) ?>/load_transaksi" class="horizontal-form" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Ruang</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="ruang" name="ruang" class="form-control select2me">
                                    <?php foreach ($opt_ruang->result() as $key => $value): ?>
                                        <option value="<?php echo $value->code; ?>"><?php echo $value->nama; ?></option>
                                    <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="date" name="date" value="<?php echo date('Y-m-d') ?>" class="date-picker form-control" data-date-format="yyyy-mm-dd">
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
var chart1; // globally available
$(document).ready(function() {
    chart1 = new Highcharts.Chart({
        chart: {
            renderTo: 'chart',
            type: 'column'
        },
        title: {
            text: '<?php echo $judul_grafik;?>'
        },
        xAxis: {
            categories: ['Nomor Meja']
        },
        yAxis: {
            title: {
                text: 'Total Nominal'
            }
        },
        <?php
        if (!empty($meja)) {
        ?>
            series: [
            <?php
                $data = $meja->row();
                for ($i=1; $i < $data->qty; $i++) { 
                ?>
                   {
                        name: "<?php $kode = $data->code.'-'.$i; echo $kode; ?>",
                        data: [<?php echo $this->vsdb->get_nominal($kode,$set_tanggal); ?>]
                    } ,
                <?php
                }
            ?>
            ]
        <?php
        } else {
        ?>
            series: [
                {
                    name: 'Grafik Penjualan Kosong',
                    data: [0]
                } 
            ]
        <?php
        }
        ?>
    });
});
</script>

