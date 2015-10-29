<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Pendaftaran
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->module);?>">Resepsionis</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url($this->cname);?>">Pelanggan</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="">Pendaftaran Pelanggan</a>
            </li>
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
                        Daftar
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
            <div class="tile double bg-yellow pull-right" style="cursor:default">
                <div class="pull-right" style="padding-right:10px; padding-top:45px; font-size:48px; font-family:arial; font-weight:bold">
                    <i><?php echo $patient.' / '.$member; ?></i>
                </div>
                <div class="tile-body pull-left">
                    <i class="icon-user"></i>
                </div>
                
                <div class="tile-object">
                    <div class="name">
                        Total Pelanggan Terdaftar / Member
                    </div>
                    <div class="number">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Tambah Data Pelanggan</div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <span id="flash_message"></span>
        <form class="horizontal-form" name="guest_form" id="guest_form">
            <div class="form-body">
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input required value="<?php echo @$pelanggan->name; ?>" type="text" id="name" name="name" class="form-control" placeholder="nama">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">No. ID</label>
                            <input required value="<?php echo @$ktp; ?>" type="text" id="code" name="code" class="form-control" placeholder="Nomor ID" onKeyPress="return goodchars(event,'1234567890 -',this)">
                            <input id="id" name="id" value="<?php echo @$pelanggan->id; ?>" type="hidden">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <!-- <input required  type="date" id="jk" name="jk" class="form-control"> -->
                            <select required id="gender" name="gender" class="form-control">
                                <option value="">Pilih Gender</option>
                                <option <?php echo "M" == @$pelanggan->gender ? 'selected' : '' ?> value="M">Laki-Laki</option>
                                <option <?php echo "F" == @$pelanggan->gender ? 'selected' : '' ?> value="F">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <input  type="text" id="job" name="job" value="<?php echo @$pelanggan->job; ?>" class="form-control" placeholder="Pekerjaan" >
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Tempat</label>
                            <input  type="text" value="<?php echo @$pelanggan->born_place; ?>" id="born_place" name="born_place" class="form-control" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Tanggal Lahir</label>
                            <input  type="text" value="<?php echo @$pelanggan->born_date; ?>" id="born_date" name="born_date" class="form-control" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Member</label>
                            <select required id="member" name="member" class="form-control">
                                <option value="">Pilih Status Member</option>
                                <option <?php echo "yes" == @$pelanggan->member ? 'selected' : '' ?> value="yes">Ya</option>
                                <option <?php echo "no" == @$pelanggan->member ? 'selected' : '' ?> value="no">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="form-section">Contact</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input value="<?php echo @$pelanggan->address; ?>" type="text" id="address" name="address" class="form-control" placeholder="alamat lengkap">
                        </div>
                    </div>
                    <!--/span-->
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kode Pos</label>
                            <input value="<?php echo @$pelanggan->postcode; ?>" type="text" id="postcode" name="postcode" class="form-control" placeholder="Kode Pos" >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kota</label>
                            <input value="<?php echo @$pelanggan->city; ?>" type="text" id="city" name="city" class="form-control" placeholder="Kota">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    
                    <!--/span-->
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                            <input value="<?php echo @$pelanggan->province; ?>" type="text" id="province" name="province" class="form-control" placeholder="Provinsi" >
                        </div>
                    </div> -->
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input value="<?php echo @$pelanggan->email; ?>" type="email" id="email" name="email" class="form-control" placeholder="account@host.com">
                        </div>
                    </div> -->
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Telephone</label>
                            <input value="<?php echo @$pelanggan->phone; ?>" type="text" id="phone" name="phone" class="form-control" placeholder="No aktif" onKeyPress="return goodchars(event,'1234567890 -',this)">
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">PIN BB</label>
                            <input value="<?php echo @$pelanggan->fax; ?>" type="text" id="fax" name="fax" class="form-control" placeholder="Fax">
                        </div>
                    </div> -->
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">HP</label>
                            <input value="<?php echo @$pelanggan->mobile; ?>" type="text" id="mobile" name="mobile" class="form-control" placeholder="HP">
                        </div>
                    </div> -->
                    <!--/span-->
                    
                    <!--/span-->
                </div>
            </div>
            <div class="form-actions right">
                <button onclick="clear()" type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#guest_form').submit(function(){
        var url = '<?php echo base_url($this->cname); ?>/simpan_pelanggan';
        var form_data = $('#guest_form').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(msg)
            {
                data = msg.split('|');
                if(data[0]==1){
                    clear();
                }
                $('#flash_message').html(data[1]);
                setTimeout(function(){
                    $('#flash_message').html('');
                },5000);
            }
        });
        return false;
    });
    function clear(){
        $('#code').val('');
        $('#gender').val('');
        $('#name').val('');
        $('#job').val('');
        $('#address').val('');
        $('#city').val('');
        // $('#province').val('');
        // $('#postcode').val('');
        // $('#nationality').val('');
        // $('#email').val('');
        $('#phone').val('');
        // $('#mobile').val('');
        // $('#fax').val('');
        $('#member').val('');
        $('#id').val('');
        $('#born_date').val('');
        $('#born_place').val('');
    }
});
</script>
<script language="javascript">
function getkey(e)
{
    if (window.event)
       return window.event.keyCode;
    else if (e)
       return e.which;
    else
       return null;
}

function goodchars(e, goods, field)
{
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;
     
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();
     
    // check goodkeys
    if (goods.indexOf(keychar) != -1)
        return true;
    // control keys
    if ( key==null || key==0 || key==8 || key==9 || key==27 )
       return true;
        
    if (key == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
                break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
        };
    // else return false
    return false;
}
</script>