<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Dashboard Room
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url($this->module);?>">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Menu</a></li>
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
<div class="row">
    <span id="flash_message"></span>
    <div class="col-md-4">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-user"></i>&nbsp;Daftar Antrian</div>
            </div>
            <div class="portlet-body">
                <div style="margin-bottom:10px;">
                    <select id="filter_antrian" class="form-control select2me" placeholder="Filter Antrian">
                        <?php echo $room_category; ?>
                    </select>
                </div>
                <div class="list-group" id="list_antrian">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-home"></i>&nbsp;Status Ruangan</div>
            </div>
            <div class="portlet-body">
                <div class="row" id="list_kamar">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-checkin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Checkin Pelanggan</h4>
            </div>
            <form id="form-checkin" class="horizontal-form">
                <div class="modal-body">
                    <div class="form-body">
                        <div id="edit_hide" class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Ruangan</label>
                                    <select id="cek_room" name="cek_room" class="form-control select2me">
                                    </select>
                                    <input id="cek_guest" name="cek_guest" type="hidden" />
                                    <input id="cek_cashdraw" name="cek_cashdraw" type="hidden" />
                                    <input id="cek_invoice" name="cek_invoice" type="hidden" />
                                    <input id="cek_id" name="cek_id" type="hidden" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:#eee">
                    <button onclick="clear('checkin')" class="btn red" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn green">Proses</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal-checkout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Konfirmasi Checkout Pelanggan</h4>
            </div>
            <div class="modal-body">
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin pelanggan telah checkout ?</span>
                <input id="id-checkout" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="prosesCheckout()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function list_antrian(){
    var url = "<?php echo base_url($this->module); ?>/list_antrian";
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function(msg){
            $('#list_antrian').html(msg);
        }
    });
    return false;
}
function list_room(){
    var url = "<?php echo base_url($this->module); ?>/list_room";
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function(msg){
            // alert(msg);
            $('#list_kamar').html(msg);
        }
    });
}
function actCheckin(Object){
    var guest = $('#'+Object).data('guest');
    var cashdraw = $('#'+Object).data('cashdraw');
    var invoice = $('#'+Object).data('invoice');
    var id = $('#'+Object).data('id');
    var category = $('#'+Object).data('category');
    
    $('#cek_guest').val(guest); 
    $('#cek_cashdraw').val(cashdraw); 
    $('#cek_invoice').val(invoice);
    $('#cek_id').val(id); 

    var url = "<?php echo base_url($this->module); ?>/opt_room_tersedia";
    $.ajax({
        type: "POST",
        url: url,
        data: {category:category},
        success: function(msg){
            // alert(msg);
            $('#cek_room').html(msg);
            $('#cek_room').select2().trigger('change');
        }
    });

    $('#modal-checkin').modal('show');
}
function actCheckout(Object){
    var id = $('#'+Object).data('id');
    $('#id-checkout').val(id);
    $('#modal-checkout').modal('show');
}
function prosesCheckout(){
    var id = $('#id-checkout').val();
    var url = "<?php echo base_url($this->module); ?>/checkout";
    $.ajax({
        type: "POST",
        url: url,
        data: {id:id},
        success: function(msg){
            // alert(id);
            $('#modal-checkout').modal('hide');

            if(msg){
                list_room();
                list_antrian();
                $('#id-checkout').val('');
            } else {
                alert('Silahkan checkout sekali lagi.');
            }
        }            
    });
}
function actRoom(Object){
    window.location = "<?php echo base_url($this->module); ?>/pos/?uid="+Object;
}
function clear(Object){
    if(Object=='checkin'){
        $('#cek_guest').val('');
        $('#cek_cashdraw').val('');
        $('#cek_invoice').val('');
        $('#cek_id').val('');

        $('#cek_room').html('<option>Pilih Ruangan</option>');
    }
}
$(document).ready(function(){
    list_antrian();
    list_room();
    // $('.room-action').on('click',function(){
    //     var d = $(this).data('guest');
    //     alert(d);
    // });
    $('#form-checkin').submit(function(){
        var room = $('#cek_room').val();
        // alert(room);
        if(room){
            var url = "<?php echo base_url($this->module); ?>/checkin_guest";
            $.ajax({
                type: "POST",
                url: url,
                data: $('#form-checkin').serialize(),
                success: function(msg){
                    $('#modal-checkin').modal('hide');
                    list_antrian();
                    list_room();
                    $('#flash_message').html(msg);
                    setTimeout(function(){$('#flash_message').html('')},3000);
                    clear('checkin');
                }
            });
        } else {
            alert('Silahkan Pilih Kamar Terlebih Dahulu');
        }
        return false;
    });
    $('#filter_antrian').on('change',function(){
        var url = "<?php echo base_url($this->module); ?>/list_antrian";
        $.ajax({
            type: "POST",
            url: url,
            data: {category:$('#filter_antrian').val()},
            success: function(msg){
                $('#list_antrian').html(msg);
            }
        });
    });
});
</script>