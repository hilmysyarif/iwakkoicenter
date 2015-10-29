<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Dashboard
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="#">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Dashboard</a></li>
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
<!-- BEGIN DASHBOARD STATS -->

<div class="clearfix"></div>
<div class="row ">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet ">
            <div class="portlet-body light-grey">
                <div class="well">
                    <h2><strong>Selamat Datang di Atombizz</strong></h2>
                    Selamat datang di Software Atombizz. Software Atombizz ini berbasis web, yang didesain dan dikembangkan secara terpusat, dimana didalamnya terdapat sistem client dan server untuk pengolahan data.
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix"></div>
<div class="row ">
    
    <div class="col-md-12">
        <div id="chart">
                        <!-- grafik -->
        </div>
    </div>

    <!-- <div class="col-md-6">
        <div id="chart2">
        </div>
    </div> -->

</div>

<br>
<!-- <div class="row">
    <div class="col-md-12 col-sm-12">
        <h4 align="center"><b><?php echo $config['bas_branch_name'] ?></b></h4>
        <center><b><?php echo $config['bas_branch_address'] ?></b></center>
        <center><b><?php echo $config['bas_branch_phone'] ?></b></center>
        <center><b><a href="mailto:#"><?php echo $config['bas_branch_email'] ?></a></b></center>
        <center><b><?php echo $config['bas_branch_domain'] ?></b></center>
    </div>
</div> -->


<script type="text/javascript">

$(function(){
    var url = "<?php echo base_url($this->cname); ?>/grafik_omset";
    // var url2 = "<?php echo base_url($this->cname); ?>/grafik_low_produk";
    $.ajax({
       type: "POST",
       url: url,
       success: function(msg)
       {
          $('#chart').html(msg);
       }
    });
    // $.ajax({
    //    type: "POST",
    //    url: url2,
    //    success: function(msg2)
    //    {
    //       $('#chart2').html(msg2);
    //    }
    // });
    return false;
});

</script>