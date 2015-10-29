<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
        Technical Support
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="#">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Tech. Support</a></li>
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
        <!-- <div class="portlet ">
            <div class="portlet-body light-grey">
                <div class="well">
                    <h2><strong>Selamat Datang di Atombizz For Apotek</strong></h2>
                    Selamat datang di Software Atombizz For Apotek. Software Atombizz ini berbasis web, yang didesain dan dikembangkan secara terpusat, dimana didalamnya terdapat sistem client dan server untuk pengolahan data.
                </div>
            </div>
        </div> -->
        <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix"></div>
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <div class="portlet ">
            <div class="portlet-body light-grey">
                <div class="note note-success">
                    <h4 class="block">Alamat Usaha</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong><?php echo $config['bas_branch_name'] ?></strong><br />
                                <?php echo $config['bas_branch_address'] ?><br />
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                <strong>Kontak</strong><br />
                                <?php echo $config['bas_branch_phone'] ?><br/>
                                <a href="mailto:#"><?php echo $config['bas_branch_email'] ?></a><br/>
                                <?php echo $config['bas_branch_domain'] ?>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet ">
            <div class="portlet-body light-grey">
                <div class="note note-success">
                    <h4 class="block">Alamat Developer</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Cloud Astro</strong><br />
                                Jl. Jakarta No. 4<br />
                                Malang, Jawa Timur<br />
                                <!-- <i class="icon-phone"></i> (0341) 452789 -->
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                <strong>Kontak</strong><br />
                                <i class="icon-phone"></i> (0341) 9588901<br/>
                                <a href="mailto:#">cloudastro.id@gmail.com</a><br/>
                                www.cloud-astro.com
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>