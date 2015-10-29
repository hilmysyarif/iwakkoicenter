<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Buka Kasir
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Resepsionis</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Kas</a><i class="icon-angle-right"></i></li>
            <li><a href="">Buka Kasir</a></li>
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
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:#ebfcee; height:155px">
            <div class="tile bg-red" onclick="window.location='<?php echo base_url($this->cname); ?>/tutup'">
                <div class="tile-body">
                    <i class="icon-money"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Tutup Kasir
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->module); ?>/pos/reguler'">
                <div class="tile-body">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        POS (Penjualan)
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <?php if($status=='belum buka'){ ?>
        <div id="belum_form" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Buka Kasir</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Cashdraw</span>
                            <span id="code" class="pull-right"><?php echo $cashdraw; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date" class="pull-right" hidden><?php echo date('Y-m-d'); ?></span>
                            <span id="date_show" class="pull-right"><?php echo tanggalIndo(date('Y-m-d')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="note note-warning">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Operator</span>
                            <span id="operator_code" class="pull-right" style="display:none"><?php echo $operator[0]->id; ?></span>
                            <span id="operator_name" class="pull-right"><?php echo $operator[0]->nama; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <span id="flash_message"></span>
                <form class="horizontal-form" name="cashdraw_form" id="cashdraw_form">
                    <div class="form-body">
                        <h3 class="form-section">Buka Kasir</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Masukkan nominal modal</label>
                                    <input id="start_cash" name="start_cash" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="note note-info" style="font-size:22px; ">
                                    <span style="font-weight:bold;"><i class="icon-money"></i>&nbsp;&nbsp;&nbsp;modal</span>
                                    <span id="nominal_rupiah" class="pull-right">Rp 0,00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right" id="guest-terdaftar">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Buka Kasir</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <?php } else if($status=='sudah buka'){ ?>
        <div id="sudah_form" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Buka Kasir</div>
            </div>
            <div class="portlet-body">
            <?php
                if($transaksi->status=='temporary'){
                ?>
                <div class="note note-success">
                    <h4 class="block">Anda sudah melakukan buka kasir.</h4>
                    <p>Anda sudah dapat melakukan pelayanan terhadap pelanggan. Silahkan membuka halaman POS di menu atas.</p>
                </div>
                <?php
                } else if($transaksi->status=='closed'){
                ?>
                <div class="note note-warning">
                    <h4 class="block">Anda sudah melakukan tutup kasir.</h4>
                    <p>Anda tidak dapat melakukan buka kasir kembali sebelum data di validasi oleh pihak validator transaksi (supervisor) dan pergantian tanggal.</p>
                </div>
                <?php
                } else if($transaksi->status=='valid'){
                ?>
                <div class="note note-info">
                    <h4 class="block">Data Kasir anda telah divalidasi.</h4>
                    <p>Anda tidak dapat melakukan buka kasir kembali di hari yang sama setelah tutup kasir.</p>
                </div>
                <?php
                } else {
                ?>
                <div class="note note-danger">
                    <h4 class="block">Ada kesalahan data.</h4>
                    <p>Jika anda melihat pesan ini, diharapkan untuk menghubungi pihak teknisi.</p>
                </div>
                <?php
                }
            ?>
            </div>
        </div>
        <?php } ?>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#start_cash').on('keyup',function(){
        var url = '<?php echo base_url($this->cname); ?>/nominal_rupiah';
        $.ajax({
            type: "POST",
            url: url,
            data: {nominal:$('#start_cash').val()},
            success: function(msg)
            {
                $('#nominal_rupiah').html(msg);
            }
        });
      return false;
    });
    $('#cashdraw_form').submit(function(){
        var url = '<?php echo base_url($this->cname); ?>/simpan_cashdraw';
        var form_data = $('#cashdraw_form').serializeArray();
        form_data.push({name:"cashdraw_no", value:$('#code').html()}); 
        form_data.push({name:"date", value:$('#date').html()}); 
        form_data.push({name:"user_id", value:$('#operator_code').html()}); 
        form_data.push({name:"operator", value:$('#operator_name').html()}); 
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg)
            {
                if(msg=='1'){
                    window.location = '<?php echo base_url($this->cname); ?>/buka';
                } else {
                    alert('Silahkan coba ulangi lagi');
                }
            }
        });
      return false;
    });
});
</script>