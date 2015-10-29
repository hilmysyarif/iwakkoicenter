<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
      Pengaturan
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>dashboard">Home</a>
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="<?php echo base_url($this->module); ?>">Pengaturan</a></li>
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
      <div class="portlet box green">
         <div class="portlet-title">
            <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Pengaturan</div>
            <!-- <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               <a href="#portlet-config" data-toggle="modal" class="config"></a>
               <a href="javascript:;" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div> -->
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <span id="flash_message"></span>
            <form id="setupBranch" class="horizontal-form">
               <div class="form-body">
                  <h3 class="form-section">Informasi Usaha</h3>
                  <div class="row" id="opt_room">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Kode Usaha</label>
                           <input type="text" id="kode_toko" name="kode_toko" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Nama Usaha</label>
                           <input type="text" id="nama_toko" name="nama_toko" class="form-control" >
                        </div>
                     </div>
                  </div>
                  <h3 class="form-section">Kontak Usaha</h3>
                   <div class="row">
                   <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                               <label >Telepon</label>
                               <input type="text" id="telepon" name="telepon" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                               <label >Email</label>
                               <input type="text" id="email" name="email" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                               <label >Domain</label>
                               <input type="text" id="domain" name="domain" class="form-control" >
                            </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label >Alamat</label>
                           <textarea rows="4" id="alamat" name="alamat" class="form-control"></textarea>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="form-actions right">
                  <button type="reset" class="btn default">Cancel</button>
                  <button type="submit" class="btn green"><i class="icon-ok"></i> Save</button>
               </div>
            </form>
            <!-- END FORM--> 
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
function setData(){
    var url = "<?php echo base_url($this->module); ?>/get_branch";
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        success: function(msg)
        {
            data = JSON.parse(msg);
            $('#kode_toko').val(data.bas_code_dept);
            $('#nama_toko').val(data.bas_branch_name);
            $('#telepon').val(data.bas_branch_phone);
            $('#email').val(data.bas_branch_email);
            $('#domain').val(data.bas_branch_domain);
            $('#alamat').val(data.bas_branch_address);
        }
    });
    return false;
}
$(document).ready(function(){
    setData();
    $('#setupBranch').submit(function(){
        var url = "<?php echo base_url($this->module); ?>/write_setup";
        $.ajax({
            type: "POST",
            url: url,
            data: $('#setupBranch').serialize(),
            success: function(msg)
            {
                alert(msg);
                data = msg.split("|");
                if(data[0]==1){
                    setData();
                }
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {$("#flash_message").hide();}, 3000);
            }
        });
        return false;
    });
});
</script>

