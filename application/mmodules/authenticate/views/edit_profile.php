<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo base_url(); ?>public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo base_url(); ?>public/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/data-tables/DT_bootstrap.css" />
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url(); ?>public/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>public/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/favicon.ico" />

<script src="<?php echo base_url();?>public/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

<div class="header navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="header-inner">
      <!-- BEGIN LOGO -->
      <a class="navbar-brand" href="index.html">
         <img src="<?php echo base_url(); ?>public/img/logo.png" alt="logo" class="img-responsive" />
      </a>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="<?php echo base_url(); ?>public/img/menu-toggler.png" alt="" />
      </a>
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <?php $this->load->view('template/notification'); ?>
      <!-- END TOP NAVIGATION MENU -->
   </div>
   <!-- END TOP NAVIGATION BAR -->
</div>



<div class="portlet box green">
   <div class="portlet-title">
      <div class="caption"><i class="icon-plus-sign"></i>&nbsp;Edit Profile</div>
   </div>
   <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <form class="horizontal-form" name="data_form" id="data_form">
         <div class="form-body">
            <h3 class="form-section">Account</h3>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">Username</label>
                     <input required value="<?php echo @$karyawan->uname; ?>" type="text" id="uname" name="uname" class="form-control" placeholder="username">
                  </div>
               </div>
               <!--/span-->
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">Password</label>
                     <input required value="<?php echo @paramDecrypt($karyawan->upass); ?>" type="password" id="upass" name="upass" class="form-control" placeholder="pwd">
                  </div>
               </div>
               <!--/span-->
            </div>
            <!--/row-->        
            <h3 class="form-section">Details</h3>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">Nama</label>
                     <input required value="<?php echo @$karyawan->name; ?>" type="text" id="name" name="name" class="form-control" placeholder="nama">
                  </div>
               </div>
               <!--/span-->
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">Tanggal Lahir</label>
                     <input required value="<?php echo @$karyawan->born; ?>" type="date" id="born" name="born" class="date-picker form-control" data-date-format="yyyy-mm-dd" readonly>
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
                     <input required value="<?php echo @$karyawan->address; ?>" type="text" id="address" name="address" class="form-control" placeholder="alamat lengkap">
                  </div>
               </div>
               <!--/span-->
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">Telephone</label>
                     <input required value="<?php echo @$karyawan->telephone; ?>" type="text" id="telephone" name="telephone" class="form-control" placeholder="No aktif" onKeyPress="return goodchars(event,'1234567890 -',this)">
                  </div>
               </div>
               <!--/span-->
            </div>
            <!--/row-->
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">E-mail</label>
                     <input required value="<?php echo @$karyawan->email; ?>" type="email" id="email" name="email" class="form-control" placeholder="account@host.com">
                  </div>
               </div>
               <!--/span-->
            </div>
            <!--/row-->  
         </div>
         <div class="form-actions right">
            <button onclick="actCancel()" type="button" class="btn default">Cancel</button>
            <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
         </div>
      </form>
      <!-- END FORM-->
   </div>
</div>
<!-- FOOOTER -->
<div class="footer">
  <div class="footer-inner">
    2014 &copy; Atombizz for Clinic by <a href="http://www.cloud-astro.com" style="color:#28b779; text-decoration:none; font-weight:bold">Cloud Astro</a>.
  </div>
  <div class="footer-tools">
    <span class="go-top">
    <i class="icon-angle-up"></i>
    </span>
  </div>
</div>

<!-- SCRIP BOTTOM -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>public/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>public/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>public/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>public/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>public/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>public/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?php echo base_url();?>public/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>public/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/scripts/form-samples.js"></script>      
<script src="<?php echo base_url();?>public/scripts/table-advanced.js"></script> 
<!--<script src="<?php echo base_url();?>public/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/scripts/tasks.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
   $(document).ready(function() {
      App.init(); // initlayout and core plugins
      FormSamples.init();
      TableAdvanced.init();
      $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
   });
</script>
<!-- END JAVASCRIPTS -->

<script type="text/javascript">
   $('#data_form').submit(function(){
      $.ajax({
         type: "POST",
         url: "<?php echo base_url('authenticate/edit'); ?>",
         data: $('#data_form').serialize(),
         success: function(msg)
         {            
            window.location="<?php echo base_url('authenticate/dashboard'); ?>";
         }
      });
      return false;
   });
   
   function clear(){
        $('#born').val('');
        $('#uid').val('');
        $('#name').val('');
        $('#address').val('');
        $('#telephone').val('');
        $('#group').val('');
        $('#email').val('');
        $('#uname').val('');
        $('#upass').val('');
        $('#status').val('');
        $('#outlet_code').val('');
        $('#posisi').val('');
        $('#salary').val('');
    }

    function actCancel()
    {
        window.location="<?php echo base_url('authenticate/dashboard'); ?>";
    }
</script>

<script language="javascript">
$(function(){
    $( "#registered" ).datepicker({ dateFormat: "yyyy-mm-dd", changeMonth: true, changeYear: true });
});

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