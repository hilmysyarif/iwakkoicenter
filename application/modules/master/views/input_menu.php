<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Tambah Produk
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="<?php echo base_url($this->cname); ?>">Produk</a><i class="icon-angle-right"></i></li>
            <li><a href="#">Tambah Produk</a></li>
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
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Produk</div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <form id="formadd">
                <div class="row">
                    <span id="flash_message"></span>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Kode</label>
                            <input type="text" id="code" name="code" class="form-control" placeholder="Kode Produk" autocomplete='off'>
                            <input type="hidden" id="id" name="id">
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Kategori</label>
                            <select id="kategori" name="kategori" class="form-control select2me" data-placeholder="Pilih Kategori">
                                <option value=""></option>
                                <?php foreach ($kategori->result() as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
                                    <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                     <div class="form-group">
                         <label class="control-label">Penempatan Rak</label>
                         <select id="rak_code" name="rak_code" class="select2me form-control" data-placeholder="Pilih Kategori Satuan">
                          <option value=""></option>
                          <?php 

                          $get_rak = $this->db->get_where('atombizz_rack',array('status' => 'produk'));                              

                          foreach ($get_rak->result() as $key => $value): ?>
                          <option value="<?php echo $value->kode; ?>"><?php echo $value->nama; ?></option>
                      <?php endforeach ?>
                  </select>
              </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Harga Jual</label>
                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga Jual">
            </div>
        </div>
    </div>
</form>
<h3 class="form-section" style="margin-top:0px">Komposisi</h3>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Material</label>
            <input id="id_bahan" name="id_bahan" type="hidden" class="form-control">
            <select id="bahan" name="bahan" class="form-control select2me" data-placeholder="Pilih Bahan">
                <option value=""></option>
                <?php foreach ($bahan->result() as $key => $value) {
                    ?>
                    <option value="<?php echo $value->code; ?>"><?php echo $value->name; ?></option>
                    <?php
                } ?>
            </select>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label class="control-label">Qty</label>
            <input id="qty" name="qty" class="form-control">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label">Satuan</label>
            <select id="satuan" name="satuan" class="form-control select2me" data-placeholder="Pilih Satuan">

            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label"></label>
            <button onclick="addBahan()" class="btn btn-small blue" style="margin-top:27px"><i class="icon-plus"></i> ADD</button>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label"></label>
            <div style="height:43px"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label">Kode Mix Material</label>
            <input id="kode-mix" name="kode-mix" class="form-control" placeholder="Kode">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Mix Material</label>
            <input id="mix-bahan" name="mix-bahan" class="form-control" placeholder="Nama">
            <input type="hidden" id="id-mix-bahan" name="id-mix-bahan" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label class="control-label">Qty</label>
            <input id="mix-qty" name="mix-qty" class="form-control">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label">Satuan</label>
            <select id="mix-satuan" name="mix-satuan" class="form-control select2me">
                <?php foreach ($satuan->result() as $key => $value) {
                    ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
                    <?php
                } ?>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label"></label>
            <button onclick="addMixBahan()" class="btn btn-small blue" style="margin-top:27px"><i class="icon-plus"></i> ADD</button>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label"></label>
            <div style="height:43px"></div>
        </div>
    </div>
</div>
</form>
</div>

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-list"></i>&nbsp;Komposisi Produk</div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="example-datatable">
            <thead>
                <tr>
                    <th style="text-align:center" width="50px">No</th>
                    <th style="text-align:center" width="">Nama Bahan</th>
                    <th style="text-align:center" width="150px">Kategori Bahan</th>
                    <th style="text-align:center" width="150px">Qty</th>
                    <th style="text-align:center" width="150px">Satuan</th>
                    <th style="text-align:center" width="175px">Action</th>
                </tr>
            </thead>
            <tbody id="list_bahan">
                <tr>
                    <td colspan="6">Tidak ada data</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="form-actions right">
    <button onclick="actSimpan()" class="btn green"><i class="icon-ok"></i> Simpan</button>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
<div id="modal-mix" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Data Mix Produk</h4>
            </div>
            <div class="modal-body">
                <span id="flash_message_2"></span>
                <div class="row">
                    <div class="col-md-6">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Kode Mix</span>
                            <span id="show_kode_mix" class="pull-right"></span>
                            <span id="hpp_mix" style="display:none"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="note note-info">
                            <span style="font-weight:bold;"><i class="icon-calendar"></i>&nbsp;&nbsp;&nbsp;Nama</span>
                            <span id="show_nama_mix" class="pull-right"></span>
                        </div>
                    </div>
                </div>
                <table id="" class="table table-striped table-bordered table-advance table-hover">
                    <tbody>
                        <form id="panelForm">
                            <tr>
                                <td colspan="2" style="background-color:#229fcd;">
                                    <select id="barcode_product" name="barcode_product" class="form-control select2me" data-placeholder="Pilih Bahan">
                                        <option value=""></option>
                                        <?php foreach ($bahan->result() as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value->code; ?>"><?php echo $value->name; ?></option>
                                            <?php
                                        } ?>
                                    </select>
                                    <input type="hidden" id="ident" name="ident" class="form-control">
                                </td>
                                <td width="100px" style="background-color:#229fcd;"><input id="qty_product" name="qty_product" placeholder="Qty" class="form-control"></td>
                                <td width="150px" style="background-color:#229fcd;">
                                    <select id="id_satuan" name="id_satuan" class="form-control select2me">

                                    </select>
                                </td>
                                <td width="100px"style="background-color:#229fcd;" ><button type="submit"  class="btn btn-small btn-default"><i class="icon-plus"></i> Tambahkan</button></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
                <!-- <br> -->
                <table id="example_datatable" class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th style="background-color:#229fcd; color:white" class="text-center" width="50px">No.</th>
                            <th style="background-color:#229fcd; color:white" class="text-center">Bahan</th>
                            <th style="background-color:#229fcd; color:white" class="text-center" width="50px">Qty</th>
                            <th style="background-color:#229fcd; color:white" class="text-center" width="120px">Satuan</th>
                            <th style="background-color:#229fcd; color:white" class="text-center" width="175px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list_mix">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" onclick="saveMix()" aria-hidden="true">Simpan</button>
                <!-- <button onclick="saveMix()" class="btn red">Ya</button> -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    // $('#modal-mix').modal('show');
    begin();
    $('body').on('propertychange keyup input paste blur change', 'input[name=code]', function() {
        var input = $(this).val();
        var link = "<?php echo base_url($this->cname);?>/cek_kode_menu";
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
                        $('input[name=harga]').val('');
                        $('input[name=nama]').val('');
                        $('#kategori').val('');
                        $('#kategori').select2().trigger('change');
                        $('input[name=harga]').trigger('keyup');
                        list_komposisi();
                    } else {
                        var menu = $.parseJSON(obj.data);
                        $('#stat_kode_menu').show();
                        $('#stat_kode_menu').attr('validasi', 'benar');
                        $('#stat_kode_menu').attr('nama', menu.nama);
                        $('#stat_kode_menu').css('color', 'blue');
                        $('#stat_kode_menu').html('<i class="icon-ok"></i> Kode Sudah Digunakan');
                        $('input[name=nama]').val(menu.nama);
                        $('input[name=harga]').val(menu.harga);
                        $('#kategori').val(menu.kategori);
                        $('#kategori').select2().trigger('change');
                        $('input[name=nama],input[name=harga]').trigger('keyup');
                        list_komposisi();
                    }
                }
            });
}
});
$('#bahan').on('change',function(){
    var url = "<?php echo base_url($this->cname) ?>/get_satuan";
    var bahan = $('#bahan').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {bahan:bahan},
        success: function(msg){
            if(msg){
                $('#satuan').html(msg);
                $('#satuan').select2().trigger('change');
            }
        }
    });
});
$('#barcode_product').on('change',function(){
    var url = "<?php echo base_url($this->cname) ?>/get_satuan";
    var bahan = $('#barcode_product').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {bahan:bahan},
        success: function(msg){
            if(msg){
                $('#id_satuan').html(msg);
                $('#id_satuan').select2().trigger('change');
            }
        }
    });
});
$("#mix-bahan").on('change',function(){
    var url = "<?php echo base_url($this->cname) ?>/get_mix_bahan";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            key:$('#mix-bahan').val()
        },
        success: function(msg){
            if(msg){
                data = JSON.parse(msg);
                $('#kode-mix').val(data.code);
            }
        }
    });
});
$("#kode-mix").on('change',function(){
    var url = "<?php echo base_url($this->cname) ?>/get_mix_bahan";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            key:$('#kode-mix').val()
        },
        success: function(msg){
            if(msg){
                data = JSON.parse(msg);
                $('#mix-bahan').val(data.name);
            }
        }
    });
});
$('#panelForm').submit(function(){
    var url = "<?php echo base_url($this->cname) ?>/save_mix_bahan";
    var form_data = $('#panelForm').serializeArray();
    form_data.push({name:'barcode_blended',value:$('#show_kode_mix').html()});
    $.ajax({
        type: 'POST',
        url: url,
        data: form_data,
        success: function(msg){
            data = msg.split('|');
            if(data[0]==1){
                clear('form_mix');
                list_mix();
            }
            $('#flash_message_2').html(data[1]);
            setTimeout(function(){$('#flash_message_2').html('');},1500);
        }
    });
    return false;
}); 
});
function actSimpan() {
    var url = "<?php echo base_url($this->cname); ?>/save_menu"
    $.ajax({
        type: 'POST',
        url: url,
        data: $('#formadd').serialize(),
        success: function(msg){
            data = msg.split('|');
            if(data[0]==1){

            }
            $('#flash_message').html(data[1]);
            setTimeout(function(){window.location="<?php echo base_url($this->cname) ?>/data"},1500);
        }
    });
}
function saveMix(){
    // var url = "<?php echo base_url($this->cname); ?>/save_mix"
    // $.ajax({
    //     type: 'POST',
    //     url: url,
    //     data: {
    //         code:$('#show_kode_mix').html(),
    //         hpp:$('#hpp_mix').html()
    //     },
    //     success: function(msg){
    //         data = msg.split('|');
    //         if(data[0]==1){
    //             $().modal('hide');
    //         }
    //         $('#flash_message').html(data[1]);
    //         setTimeout(function(){$().html()},1500);
    //     }
    // });
$('#modal-mix').modal('hide');
list_komposisi();
}
function begin () {
    var uri = "<?php echo $this->uri->segment(4); ?>";
    if(uri){
        var url = "<?php echo base_url($this->cname); ?>/get_id"
        $.ajax({
            type: 'POST',
            url: url,
            data: {id:uri},
            success: function(msg){
                data = JSON.parse(msg);
                $('#id').val(uri);
                $('#code').val(data.code).trigger('keyup');
            }
        });
    }
}
function actListDel(argument) {
    alertify.confirm("Apakah anda yakin untuk menghapus item ini?", function (e) {
        if (e) {
            var url = "<?php echo base_url($this->cname) ?>/del_mix_bahan";
            $.ajax({
                type: 'POST',
                url: url,
                data: {id:argument},
                success: function(msg){
                    list_mix();
                    data = msg.split('|');
                    $('#flash_message_2').html(data[1]);
                    setTimeout(function(){
                        $('#flash_message_2').html('');
                    },1500);
                }
            });
        } else {

        }
    });
    return false;
}
function list_mix(){
    var url = "<?php echo base_url($this->cname) ?>/list_mix";
    var code = $('#show_kode_mix').html();
    if(code){
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                menu:code
            },
            success: function(msg){
                // alert(msg);
                $('#list_mix').html(msg);
            }
        });
    } else {
        $('#list_mix').html('<td colspan="5">Tidak ada data</td>');
        alertify.alert('Silahkan isi data produk terlebih dahulu.');
    }
    return false;
}
function actMixEdit(Object){
    // alert();
    var url = "<?php echo base_url($this->cname) ?>/detail_bahan";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id:Object
        },
        success: function(msg){
            // alert(msg);
            data = JSON.parse(msg);
            $('#id-mix-bahan').val(data.id);
            $('#kode-mix').val(data.barcode_product);
            $('#mix-bahan').val(data.name);
            $('#mix-qty').val(data.qty_product);
            $('#mix-satuan').val(data.id_satuan);
            $('#mix-satuan').select2().trigger('change');
        }
    });
    return false;
}
function addMixBahan(){
    var url = "<?php echo base_url($this->cname) ?>/add_mix_bahan";
    var bahan = $('#code').val();
    if(bahan){
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                id:$('#id-mix-bahan').val(),
                code:$('#kode-mix').val(),
                name:$('#mix-bahan').val(),
                barcode_blended:$('#code').val(),
                qty_product:$('#mix-qty').val(),
                id_satuan:$('#mix-satuan').val(),
                status:'temporary',
                category_bahan:'mix material'
            },
            success: function(msg){
                data = msg.split('|');
                if(data[0]==1){
                    list_komposisi();

                    $('#show_kode_mix').html($('#kode-mix').val());
                    $('#show_nama_mix').html($('#mix-bahan').val());
                    $('#modal-mix').modal('show');

                    clear('add_mix_bahan');
                }
                $('#flash_message').html(data[1]);
                setTimeout(function(){
                    $('#flash_message').html('');
                },1500);
            }
        });
} else {
    alertify.alert('Silahkan isi data produk terlebih dahulu.');
}
return false;
}
function addBahan(){
    var url = "<?php echo base_url($this->cname) ?>/add_bahan";
    var bahan = $('#code').val();
    if(bahan){
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                id:$('#id_bahan').val(),
                barcode_blended:'P_'+$('#code').val(),
                barcode_product:$('#bahan').val(),
                qty_product:$('#qty').val(),
                id_satuan:$('#satuan').val(),
                status:'temporary',
                category_bahan:'material'
            },
            success: function(msg){
                data = msg.split('|');
                if(data[0]==1){
                    clear('add_bahan');
                    list_komposisi();
                }
                $('#flash_message').html(data[1]);
                setTimeout(function(){
                    $('#flash_message').html('');
                },1500);
            }
        });
    } else {
        alertify.alert('Silahkan isi data produk terlebih dahulu.');
    }
    return false;
}
function list_komposisi() {
    var url = "<?php echo base_url($this->cname) ?>/list_bahan";
    var code = 'P_'+$('#code').val();
    if(code){
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                menu:code
            },
            success: function(msg){
                // alert(msg);
                data = JSON.parse(msg);
                $('#list_bahan').html(data.list);
                $('#hpp').val(data.hpp);
            }
        });
    } else {
        $('#hpp').val('0');
        $('#list_bahan').html('<td colspan="6">Tidak ada data</td>');
        alertify.alert('Silahkan isi data produk terlebih dahulu.');
    }
    return false;
}
function actEdit(Object) {
    var url = "<?php echo base_url($this->cname) ?>/detail_bahan";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id:Object
        },
        success: function(msg){
            // alert(msg);
            data = JSON.parse(msg);
            $('#id_bahan').val(data.id);
            $('#bahan').val(data.barcode_product);
            $('#bahan').select2().trigger('change');
            $('#qty').val(data.qty_product);
            $('#satuan').val(data.id_satuan);
            $('#satuan').select2().trigger('change');
        }
    });
    return false;
}
function clear(argument) {
    if(argument=='add_bahan'){
        $('#id_bahan').val('');
        $('#bahan').val('');
        $('#bahan').select2().trigger('change');
        $('#qty').val('');
        $('#satuan').val('');
        $('#satuan').select2().trigger('change');
    } else if(argument=='add_mix_bahan'){
        $('#id-mix-bahan').val('');
        $('#kode-mix').val('');
        $('#mix-bahan').val('');
        $('#mix-qty').val('');
        $('#mix-satuan').val('');
        $('#mix-satuan').select2().trigger('change');
        list_mix();
    } else if(argument=='form_mix'){
        $('#ident').val('');
        $('#barcode_product').val('');
        $('#barcode_product').select2().trigger('change');
        $('#qty_product').val('');
        $('#id_satuan').val('');
        $('#id_satuan').select2().trigger('change');
    }
}
</script>