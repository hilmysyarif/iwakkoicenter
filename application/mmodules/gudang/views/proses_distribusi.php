<?php $user = $this->session->userdata('astrosession'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Order Stok Barang Khusus
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Gudang</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Barang Khusus</a><i class="icon-angle-right"></i></li>
            <li><a href="">Order Stok</a></li>
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
                        Transaksi
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
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div id="product_form" class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-shopping-cart"></i>&nbsp;Proses Order</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;KD Order Stok</span>
                            <span id="reference_no" class="pull-right"><?php echo $distribusi->reference_no; ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Tanggal</span>
                            <span id="date_show" class="pull-right"><?php echo tanggalIndo($distribusi->date); ?></span>
                            <span id="date" style="display:none"><?php echo $distribusi->date; ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="flash_message"></span>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <!-- <table id="" class="table table-striped table-bordered table-advance table-hover">
                        <tbody>
                            <form id="formAdd">
                            <tr>
                                <td style="background-color:#39B3D7;">
                                    <select type="text" id="search" name="search" class="form-control select2me" data-placeholder="Pilih Bahan"></select>
                                </td>
                                <td width="150px" style="background-color:#39B3D7;">
                                    <input type="hidden" id="ident" name="ident" class="form-control">
                                    <input type="hidden" id="produk_code" name="produk_code" class="form-control">
                                    <input type="hidden" id="produk_name" name="produk_name" class="form-control">
                                    <input type="hidden" id="produk_id" name="produk_id" class="form-control">
                                    <input type="hidden" id="hpp" name="hpp" class="form-control">
                                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="qty">
                                </td>
                                <td width="150px" style="background-color:#39B3D7;">
                                    <select id="unit" name="unit" class="form-control select2me" data-placeholder='satuan'></select>
                                </td>
                                <td width="100px"style="background-color:#39B3D7;" >
                                    <button type="submit" class="btn btn-small btn-default"><i class="icon-plus"></i> Tambahkan</button>
                                </td>
                            </tr>
                            </form>
                        </tbody>
                    </table> -->
                    <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th style="background-color:#39B3D7; color:white" class="text-center" width="50px">No.</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Kode Bahan</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Nama Bahan</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center" width="100px">Qty</th>
                                <th style="background-color:#39B3D7; color:white" class="text-center">Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($detail as $key => $value): ?>
                            <tr>
                                <td class="text-center" width="50px"><?php echo $no; ?></td>
                                <td class="text-center"><?php echo $value->product_code; ?></td>
                                <td class="text-center"><?php echo $value->product_name; ?></td>
                                <td class="text-center" width="50px"><?php echo $value->quantity; ?></td>
                                <td class="text-center"><?php echo $value->nama_satuan; ?></td>
                            </tr>
                        <?php $no++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="horizontal-form" name="disc_form" id="disc_form">
                    <div class="form-actions right">
                        <button onclick="back()" type="button" class="btn red"><i class=" icon-arrow-left"></i> Kembali</button>
                        <button onclick="proses()" type="button" class="btn green"><i class="icon-ok"></i> Proses</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<script type="text/javascript">
function back(argument) {
    window.location = "<?php echo base_url($this->cname); ?>"
}
function proses(argument) {
    var reference = $('#reference_no').html();
    var url = "<?php echo base_url($this->cname); ?>/proses_distribusi";
    $.ajax({
        type: 'POST',
        data: {reference:reference},
        url:url,
        success: function(msg){
            alert(msg);
            data = msg.split('|');
            if(data[0]==1){
                window.location = "<?php echo base_url($this->cname); ?>";
            }
        }
    });
    return false;
}
</script>