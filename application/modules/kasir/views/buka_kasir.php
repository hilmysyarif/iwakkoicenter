<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Kasir <small>Buka Kasir</small>
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
            <div class="caption"><i class="icon-globe"></i>Buka Kasir</div>
         </div>
         <div class="portlet-body form">
            <div class="form-actions top">
				<div class="col-md-4">
					<input type="text" id="nominal" placeholder="Nominal Buka Kasir" class="form-control">
					<span id="code" class="pull-right" style="display:none"><?php echo $cashdraw; ?></span>
					<span id="date" class="pull-right" style="display:none"><?php echo date('Y-m-d'); ?></span>
					<span id="employee_id" class="pull-right" style="display:none"><?php echo $operator[0]->id; ?></span>
				</div>
				<div class="col-md-4">
					<button onclick="simpan()" class="btn purple">Buka kasir</button>
				</div>
            </div>
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

<script type="text/javascript">
function simpan(){
	var url = '<?php echo base_url($this->cname); ?>/simpan_cashdraw';
	var start_cash = $('#nominal').val();
	var code = $('#code').html();
	var date = $('#date').html();
	var employee_id = $('#employee_id').html();
	$.ajax({
        type: "POST",
        url: url,
        data: {start_cash:start_cash,
        		code:code,
        		date:date,
        		employee_id:employee_id},
        success: function(msg)
        {
          if (msg=='1') {
            window.location="<?php echo base_url($this->module); ?>";
          }
          
    //         if(msg=='1'){
				// alertify.alert('Sukses');
				// window.setTimeout(function(){window.location="<?php echo base_url($this->module); ?>/ruangan";}, 1500);
    //         } else {
    //             alertify.alert('Silahkan coba ulangi lagi');
    //         }
        }
    });
  	return false;
}
</script>