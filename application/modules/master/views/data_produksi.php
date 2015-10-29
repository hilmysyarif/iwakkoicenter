<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Menu Produksi
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="">Produksi</a></li>
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
                        Daftar Produksi
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
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Produksi</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <table class="table table-striped table-bordered table-hover" id="tabel_daftar">
                    <thead>
                        <tr style="background:#271000;color:#fff;">
                            <th width="180px">Tanggal</th>
                            <th width="">Nama Produk</th>
                            <th width="100">Jumlah Produksi</th>
                            
                        </tr>                       
                    </thead>
                    <tbody>

                      <?php 
                      $get = $this->db->get_where('produksi',array('status' => 'produksi'));                      
                      $hasil = $get->result_array();

                      foreach ($hasil as $item) {      
                        $id_menu = $item['id_product'];                        
                        $get_item = $this->db->get_where('menu',array('id' => $id_menu));
                        $hasil_item = $get_item->row();
                        ?>                

                        <tr>
                          <td><?php echo $item['date'];?></td>
                          <td><?php echo $hasil_item->nama; ?></td>
                          <td><?php echo $item['in'];?></td>                   
                      </tr>

                      <?php } ?>

                  </tbody>
              </table>
          </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
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
<!-- MODAL GAJI -->
<div id="modal-gaji" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Cetak Gaji Karyawan</h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <table style="margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="115px">Nama</td>
                        <td width="20px">:</td>
                        <td>
                            <!-- <select onchange="get_detail()" name="m-nama" id="m-nama" class="form-control select2me" data-placeholder="Pilih karyawan...">
                                <option value=""></option>
                                <?php 
                                foreach ($_opt_karyawan as $key => $value) {
                                ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                <?php
                                }
                                ?>
                            </select> -->
                            <input id="md-nama" name="md-nama" type="text" class="form-control" placeholder="Nama" readonly>
                            <input id="m-nama" name="m-nama" type="text" hidden>
                        </td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><input id="m-code" name="m-code" type="text" class="form-control" placeholder="NIK" readonly></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><input id="m-jabatan" name="m-jabatan" type="text" class="form-control" placeholder="Jabatan" readonly></td>
                    </tr>
                    <tr>
                        <td>Gaji Pokok</td>
                        <td>:</td>
                        <td><input id="m-gaji" name="m-gaji" type="text" class="form-control" placeholder="Gaji Pokok" readonly></td>
                    </tr>
                    <tr>
                        <td>Presensi</td>
                        <td>:</td>
                        <td><input id="m-hari" name="m-hari" type="text" class="form-control" placeholder="Jumlah kehadiran" onkeyup="actCount()"></td>
                    </tr>
                    <tr>
                        <td>Bonus</td>
                        <td>:</td>
                        <td><input id="m-bonus" name="m-bonus" type="text" class="form-control" placeholder="Bonus" onkeyup="actCount()"></td>
                    </tr>
                    <tr>
                        <td>Kasbon</td>
                        <td>:</td>
                        <td><input id="m-kasbon" name="m-kasbon" type="text" class="form-control" placeholder="Cashbon" onkeyup="actCount()"></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td><input id="m-total" name="m-total" type="text" class="form-control" placeholder="Total Pendapatan" readonly></td>
                    </tr>
                </table>
                <!-- END FORM-->
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn red" onclick="clear_gaji()" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button onclick="actPrintGaji()" class="btn green">Cetak</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function actDelete(Object) {
        $('#id-delete').val(Object);
        $('#modal-confirm').modal('show');
    }

    function delData() {
        var id = $('#id-delete').val();
        var url = '<?php echo base_url($this->cname); ?>/delete';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(msg) {
                $('#modal-confirm').modal('hide');
            // alert(id);
            data = msg.split('|');
            if (data[0] == 1) {
                clear();      
            }
            window.location = "<?php echo base_url() . 'master/produksi/data' ?>";  
            $('#flash_message').html(data[1]);
            setTimeout(function() {
                $('#flash_message').html('');
            }, 3000);
        }
    });
        return false;
    }

    function clear() {
        $('#id-delete').val('');
    }

    function actEdit(object) {
        window.location = "<?php echo base_url($this->cname).'/edit/'; ?>" + object;
    }

    function actGaji(Object) {
    // alert(Object);
    $('#m-nama').val(Object);
    get_detail();
    $('#modal-gaji').modal('show');
}

function get_detail() {
    var id = $('#m-nama').val();
    var url = '<?php echo base_url($this->cname); ?>/get_det_gaji';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id
        },
        success: function(msg) {
            data = msg.split('|');
            $('#m-code').val(data[0]);
            $('#m-jabatan').val(data[1]);
            $('#m-gaji').val(data[2]);
            $('#m-hari').val('30');
            $('#m-bonus').val('0');
            $('#m-kasbon').val('0');
            $('#m-total').val(data[2]);
            $('#md-nama').val(data[3]);
        }
    });
    return false;
}

function actCount() {
    var gaji = parseInt($('#m-gaji').val());
    var hari = parseInt($('#m-hari').val());
    gaji = gaji * hari / 30;
    var bonus = parseInt($('#m-bonus').val());
    var kasbon = parseInt($('#m-kasbon').val());
    var total = gaji + bonus - kasbon;
    
    $('#m-total').val(Math.round(total));
}

function actPrintGaji() {
    var url = '<?php echo base_url($this->cname); ?>/add_penggajian';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id_karyawan : $('#m-code').val(),
            gaji : $('#m-gaji').val(),
            bonus : $('#m-bonus').val(),
            casbon : $('#m-kasbon').val(),
            total : $('#m-total').val()
        },
        success: function(msg) {
            // alert(msg);
            $('#modal-gaji').modal('hide');
            // alert(id);
            data = msg.split("|");
            // alert(data[2]);
            if (data[0] == 1) {
                clear_gaji();
                // alert(data[2]);
            }
            $('#flash_message').html(data[1]);
            setTimeout(function() {
                $('#flash_message').html('');
            }, 3000);
        }
    });
    return false;
}

function clear_gaji () {
    $('#m-code').val('');
    $('#m-jabatan').val('');
    $('#m-gaji').val('');
    $('#m-bonus').val('');
    $('#m-kasbon').val('');
    $('#m-total').val('');
    $('#m-nama').val('');
    $('#m-nama').select2().trigger("change");
}

$(document).ready(function() {

  $('#tabel_daftar').dataTable();

});
</script>
