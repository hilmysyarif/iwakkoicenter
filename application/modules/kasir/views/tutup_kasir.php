<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Kasir <small>Tutup Kasir</small>
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url().'kasir' ?>">Kasir</a>
         </li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box blue">
         <div class="portlet-title">
            <div class="caption"><i class="icon-globe"></i>Tutup Kasir</div>
         </div>
         <div class="portlet-body form">
            <div class="form-actions top">
				<div class="col-md-4">
					<input type="text" id="nominal" placeholder="Nominal Tutup Kasir" class="form-control">
					<span id="code" class="pull-right" style="display:none"><?php echo $cashdraw; ?></span>
					<span id="employee_id" class="pull-right" style="display:none"><?php echo $operator[0]->id; ?></span>
				</div>
				<div class="col-md-4">
					<button onclick="simpan()" class="btn purple">Tutup kasir</button>
				</div>
            </div>
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

<script type="text/javascript">
function simpan(){
    var url = '<?php echo base_url($this->cname); ?>/tutup_cashdraw';
    var end_cash = $('#nominal').val();
    var code = $('#code').html();
    var date = $('#date').html();
    var employee_id = $('#employee_id').html();
    var id = '<?php echo $id_cashdraw; ?>';
    $.ajax({
        type: "POST",
        url: url,
        data: { end_cash:end_cash,
                code:code,
                date:date,
                employee_id:employee_id,
                id:id
            },
        success: function(msg)
        {
            alert(msg);
            if(msg=='0'){
                // alertify.alert('Tutup Kasir Berhasil');
                // alert(msg);
                alertify.alert('Silahkan coba ulangi lagi');
            } else {                
                window.setTimeout(function(){window.location="<?php echo base_url('dashboard/?status=tutup_kasir_sukses'); ?>";}, 1500);
            }
        }
    });
    return false;
}
</script>