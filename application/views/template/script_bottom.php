<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>public/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>public/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>public/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/highchart/highcharts.js" type="text/javascript"></script>
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
<script type="text/javascript" src="<?php echo base_url();?>public/plugins/alertify/lib/alertify.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>public/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script> -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>public/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/scripts/form-samples.js"></script>      
<script src="<?php echo base_url();?>public/scripts/table-advanced.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/alertify/lib/alertify.min.js"></script> 
<!--<script src="<?php echo base_url();?>public/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/scripts/tasks.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
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