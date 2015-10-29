<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i>Master Menu</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <!-- <form class="form-horizontal" id="form-master-menu"> -->
        <div class="form-body">
            <h3 class="form-section">Tambah Menu</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3">Kode</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Kode Menu" name="kode_menu" id="kode_menu">
                            <span style="display:inline-block;color:blue;" id="stat_kode_menu" validasi="salah" class="help-block"><i class=" icon-info-sign"></i> Isi kode untuk pencarian cepat</span>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Nama Menu" name="nama_menu" id="nama_menu">
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3">Kategori</label>
                        <div class="col-md-9">
                            <select class="form-control" id="kategori_menu">
                                <option value="0" disabled selected>Pilih Kategori</option>
                                <?php
                                //foreach ($kategori_menu as $key => $value) {
                                for ($i=0; $i < sizeof($kategori_menu); $i++) {
                                ?>
                                <option value="<?php echo $kategori_menu[$i]->id; ?>"><?php echo $kategori_menu[$i]->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div class="row">
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3">HPP</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="HPP" name="hpp_menu" id="hpp_menu">
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3">Harga Jual</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Harga Jual" name="harga_jual_menu" id="harga_jual_menu">
                        </div>
                    </div>
                </div>
                <!--/span-->
            </div>
            <div class="row">
                <center><button type="submit" class="btn blue" id="btn_submit_menu">Submit</button></center>
            </div>
        </div>
        <!-- </form> -->
    </div>
</div>
<div class="portlet box yellow tabbable">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i>Daftar Menu</div>
    </div>
    <div class="portlet-body">
        <div class=" portlet-tabs">
            <!-- <ul class="nav nav-tabs">
                <?php $max = sizeof($kategori_menu);
                for ($i=$max-1; $i > -1; $i--) { ?>
                <li>
                    <a href="<?php echo '#tab_'.$kategori_menu[$i]->id; ?>" idmenu="<?php echo $kategori_menu[$i]->id; ?>" data-toggle="tab"><?php echo $kategori_menu[$i]->nama;?></a>
                </li>
                <?php } ?>
                <li class="active"><a href="#tab_0" data-toggle="tab">Semua</a></li>
            </ul> -->
            <div class="tab-content">
                <div class="tab-pane active" id="tab_0">
                    <div class="table-responsive" id="tabel_menu">
                        
                    </div>
                </div>
                <?php for($i = 0; $i < $max;$i++){ ?>
                <div class="tab-pane" id="<?php echo 'tab_'.$kategori_menu[$i]->id; ?>">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    load_table('<?php echo base_url($this->cname.'/master_menu/tabel_menu');?>', '<?php echo date('Y-m-d') ?>');
});
//TABEL DAFTAR
$('body').on('click', '.pagination li a', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    if (link != '#') {
        load_table(link);
    }
});
$('#cari_menu').submit(function(e) {
    e.preventDefault();
    var send_data = $('#cari_menu').serialize();
    load_table('<?php echo base_url($this->cname.'/master_menu/cari_menu');?>',send_data);
});
$('#cari_menu button[type=reset]').click(function(e) {
    load_table('<?php echo base_url($this->cname.'/master_menu/tabel_menu');?>', '<?php echo date('Y-m-d'); ?>');
});

function load_table(link, send_data) {
    send_data = send_data || '';
    loading('#tabel_menu');
    $.ajax({
        type: "POST",
        url: link,
        data: send_data,
        cache: false,
        success: function(msg) {
            // alert(msg);
            $("#tabel_menu").html(msg);
        }
    });
}

//FORMULIR
$("form#form-master-menu").submit(function(e) {
    if ($('#stat_kode_menu').attr('validasi') != 'benar') {
        e.preventDefault();
    }
});
$('body').on('propertychange keyup input paste blur change', 'input[name=kode_menu]', function() {
    var input = $(this).val();
    var link = "<?php echo base_url($this->cname.'/master_menu/cek_kode_menu');?>";
    $(this).val(input.toUpperCase());
    //$('#stat_kode_menu').hide();
    if (input == '') {
        $('#stat_kode_menu').show();
        $('#stat_kode_menu').attr('validasi', 'salah');
        $('#stat_kode_menu').css('color', 'red');
        $('#stat_kode_menu').html('<i class="icon-remove"></i> Kode harus diisi');
    } else {
        $.ajax({
            type: "POST",
            url: link,
            data: "kode_menu=" + input,
            cache: false,
            success: function(msg) {
                var obj = $.parseJSON(msg);
                if (obj.status == 0) {
                    $('#stat_kode_menu').attr('validasi', 'salah');
                    $('#stat_kode_menu').show();
                    $('#stat_kode_menu').css('color', 'green');
                    $('#stat_kode_menu').html('<i class="icon-ok"></i> Kode Belum Digunakan');
                    $('input[name=harga_jual]').val('');
                    $('input[name=harga_jual]').trigger('keyup');
                } else {
                    var menu = $.parseJSON(obj.data);
                    $('#stat_kode_menu').show();
                    $('#stat_kode_menu').attr('validasi', 'benar');
                    $('#stat_kode_menu').attr('nama', menu.nama);
                    $('#stat_kode_menu').css('color', 'blue');
                    $('#stat_kode_menu').html('<i class="icon-ok"></i> Kode Sudah Digunakan');
                    $('input[name=nama_menu]').val(menu.nama);
                    $('input[name=harga_jual_menu]').val(menu.harga);
                    $('input[name=hpp_menu]').val(menu.hpp);
                    $('input[name=nama_menu],input[name=hpp_menu],input[name=harga_jual_menu]').trigger('keyup');
                }
            }
        });
    }
});
$('body').on('click', '#btn_submit_menu', function(e) {
    e.preventDefault();
    var link = "<?php echo base_url($this->cname.'/master_menu/submit_menu');?>";
    var nama = $('input[name=nama_menu]').val();
    var kode = $('input[name=kode_menu]').val();
    var hpp = $('input[name=hpp_menu]').val();
    var harga_jual = $('input[name=harga_jual_menu]').val();
    var kategori = $('#kategori_menu').val();
    var send_data = 'nama=' + nama + '&kode=' + kode + '&hpp=' + hpp + '&harga_jual=' + harga_jual + '&kategori=' + kategori;
    $.ajax({
        type: "POST",
        url: link,
        data: send_data,
        cache: false,
        success: function(msg) {
            $('#stat_kode_menu').show();
            $('#stat_kode_menu').attr('validasi', 'salah');
            $('#stat_kode_menu').css('color', 'blue');
            $('#stat_kode_menu').html('<i class=" icon-info-sign"></i> Isi kode untuk pencarian cepat');
            $('input[name=nama_menu]').val('');
            $('input[name=kode_menu]').val('');
            $('input[name=hpp_menu]').val('');
            $('input[name=harga_jual_menu]').val('');
            $('#kategori_menu').val(0);
            load_table('<?php echo base_url($this->cname.'/master_menu/tabel_menu');?>', '<?php echo date('Y-m-d') ?>');
        }
    });
});
$('body').on('click', '.btn-edit-menu', function(e) {
    e.preventDefault();
    var kode = $(this).closest('tr').find('.col_kode_menu').html();
    var nama = $(this).closest('tr').find('.col_nama_menu').html();
    var hpp = $(this).closest('tr').find('.col_hpp_menu').attr('harga');
    var harga = $(this).closest('tr').find('.col_harga_menu').attr('harga');
    var kategori = $(this).closest('tr').find('.col_kat_menu').attr('kat');

    $('#stat_kode_menu').show();
    $('#stat_kode_menu').attr('validasi', 'benar');
    $('#stat_kode_menu').css('color', 'green');
    $('#stat_kode_menu').html('<i class=" icon-ok"></i> Kode Sudah Digunakan');

    $('input[name=nama_menu]').val(nama);
    $('input[name=kode_menu]').val(kode);
    $('input[name=hpp_menu]').val(hpp);
    $('input[name=harga_jual_menu]').val(harga);
    $('#kategori_menu').val(kategori);
    $('#kategori_menu[value="' + kategori + '"]').prop('selected', true);
});

var base_url = "<?php echo base_url();?>";

function succ_msg(msg) {
    return '<div class="alert alert-success">' +
        '<button data-dismiss="alert" class="close">x</button>' + msg + '</div>';
}

function err_msg(msg) {
    return '<div class="alert alert-error">' +
        '<button data-dismiss="alert" class="close">x</button>' + msg + '</div>';
}

function loading(element) {
    $(element).html('<center><img src="' + base_url + 'assets/img/ajax-loading.gif"/><br>Loading</center>');
}
</script>