<?php 
if (empty($reservasi)) {
   @$reservasi[0]->meja = 'none';
}
$rev = false;
?>
<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Kasir <small>Pilih meja</small>
      </h3>
      <!-- BEGIN DASHBOARD STATS -->
      <div class="row">
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div style="margin-bottom:0px;" class="dashboard-stat green">
               <div class="visual">
                  <i class="icon-shopping-cart"></i>
               </div>
               <div class="details">
                  <div class="number"><?php echo $stats->transaksi; ?></div>
                  <div class="desc">Transaksi</div>
               </div>
               <!-- <a class="more" href="#">
               View more <i class="m-icon-swapright m-icon-white"></i>
               </a>   -->               
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div style="margin-bottom:0px;" class="dashboard-stat blue">
               <div class="visual">
                  <!-- <i class="icon-comments"></i> -->
               </div>
               <div class="details">
                  <div class="number"><?php echo format_rupiah($stats->tunai) ?></div>
                  <div class="desc">Kas Tunai</div>
               </div>
               <!-- <a class="more" href="#">
               View more <i class="m-icon-swapright m-icon-white"></i>
               </a> -->                 
            </div>
         </div>         
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div style="margin-bottom:0px;" class="dashboard-stat yellow">
               <div class="visual">
                  <!-- <i class="icon-table"></i> -->
               </div>
               <div class="details">
                  <div class="number"><?php echo format_rupiah($stats->nontunai); ?></div>
                  <div class="desc">Kas Non-tunai</div>
               </div>
               <!-- <a class="more" href="#">
               View more <i class="m-icon-swapright m-icon-white"></i>
               </a>   -->               
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div style="margin-bottom:0px;" class="dashboard-stat purple">
               <div class="visual">
                  <!-- <i class="icon-bar-chart"></i> -->
               </div>
               <div class="details">
                  <div class="number"><?php echo format_rupiah($stats->omset); ?></div>
                  <div class="desc">Total Omset</div>
               </div>
               <!-- <a class="more" href="#">
               View more <i class="m-icon-swapright m-icon-white"></i>
               </a>   -->               
            </div>
         </div>
      </div>
      <!-- END DASHBOARD STATS -->
      <ul style="width:64%;" class="col-md-9 page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url().'kasir' ?>">Kasir</a> 
            <i class="icon-angle-right"></i>
         </li>
         <li><a href="#">Pilih Meja</a></li>
      </ul>
      <a id="1" onmouseout="out('1')" onmouseover="hover('1')" href="#" onclick="set_mode('TA')" data-target="#static" data-toggle="modal" style="padding-top:8px; width:12%; height:36px; margin-top:15px; margin-bottom:25px;" class="col-md-1 bg-blue">
         <i class="icon-signout"></i>
         Take Away
      </a>
      <a id="2" onmouseout="out('2')" onmouseover="hover('2')" href="#" onclick="set_mode('R')" data-target="#static" data-toggle="modal" style="padding-top:8px; width:12%; height:36px; margin-top:15px; margin-bottom:25px;" class="col-md-1 bg-dark">
         <i class="icon-list-ol"></i>
         Reservasi
      </a>
      <a id="3" onmouseout="out('3')" onmouseover="hover('3')" href="<?php echo base_url().'kasir/cashdraw/tutup_kasir' ?>" style="padding-top:8px; width:12%; height:36px; margin-top:15px; margin-bottom:25px;" class="col-md-1 bg-red">
         <i class="icon-key"></i>
         Tutup Kasir
      </a>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <div class="well text-center" style="background-color:#28B779">
         <div class="">
            <select id="code_meja" name="code_meja" class="select2me form-control" style="width:300px" data-placeholder="Pilih Ruangan">
               <option value=""></option>
               <option value="all">Semua Meja</option>
               <?php
               foreach ($code_meja as $key => $value) {
                  ?>
                  <option value="<?php echo $value->code; ?>"><?php echo $value->nama; ?></option>
                  <?php
               }
               ?>
            </select>
         </div>
      </div>
   </div>
</div>
<!-- BEGIN PAGE CONTENT-->
<div style="margin-left:0px;" class="row">
<div class="tiles">
<?php 
   foreach ($meja as $key => $value) {
      for ($i=1; $i <= $value->qty; $i++) { 
         for ($j=0; $j < count($reservasi); $j++) { 
            if ($value->code.'-'.$i == $reservasi[$j]->meja && (@!in_array($value->code.'-'.$i, $meja_isi) || @!in_array($value->code.'-'.$i, $meja_tergabung))) { 
               $rev = true; ?>
               <a style="margin:0px 40px 50px 0px;box-shadow: 5px 5px 8px #222;" onclick="rev_cek('<?php echo $value->code.'-'.$i ?>')" class="tile bg-yellow">
                  <div class="tile-body">
                     <img src="assets/img/photo1.jpg" alt="">
                     <h4>Reserved</h4>
                     <p><?php echo $reservasi[$j]->nama; ?></p>
                     <p><?php echo $reservasi[$j]->phone; ?></p>
                     <p><?php echo basename($reservasi[$j]->jam,':00'); ?></p>
                  </div>
                  <div class="tile-object">
                     <div class="name">
                        <?php echo $value->nama; ?>
                     </div>
                     <div class="number">
                        <?php echo $i ?>
                     </div>
                  </div>
               </a> <?php 
            }
         } 
         if (!$rev) { 
            if (!empty($meja_isi) && !empty($meja_tergabung)) {
               if (in_array($value->code.'-'.$i, $meja_isi)) {
                  $target = '';
                  $toggle = '';
                  $href = base_url().'kasir/pesan/'.$value->code.'-'.$i;
                  $class = 'bg-red';
                  $img = '/isi1.png';
               } else if (in_array($value->code.'-'.$i, $meja_tergabung)) {
                  $target = '';
                  $toggle = '';
                  $href = '#';
                  $class = 'bg-yellow';
                  $img = '/isi1.png';
               } else {
                  $target = '#member';
                  $toggle = 'modal';
                  $href = '#';
                  $class = 'bg-green';
                  $img = '/kosong1.png';
               }               
            } else if (!empty($meja_isi)) {
               if (in_array($value->code.'-'.$i, $meja_isi)) {
                  $target = '';
                  $toggle = '';
                  $href = base_url().'kasir/pesan/'.$value->code.'-'.$i;
                  $class = 'bg-red';
                  $img = '/isi1.png';
               } else {
                  $target = '#member';
                  $toggle = 'modal';
                  $href = '#';
                  $class = 'bg-green';
                  $img = '/kosong1.png';
               }
            } else {
               $target = '#member';
               $toggle = 'modal';
               $href = '#';
               $class = 'bg-green';
               $img = '/kosong1.png';
            }
            ?>
            <a style="margin:0px 40px 50px 0px;box-shadow: 5px 5px 8px #222;" 
               onclick="$('#url').html('<?php echo base_url().'kasir/pesan/'.$value->code.'-'.$i ?>')"
               data-target="<?php echo $target ?>"
               data-toggle="<?php echo $toggle ?>"
               href="<?php echo $href ?>"
               class="tile <?php echo $class ?>"
            >               
               <div class="tile-body">
                  <!-- <i class="icon-th-large"></i> -->
                  <!-- <i> -->
                     <img style="margin-top:0px; margin-left:5px; height:95px; width:auto;" src="<?php echo base_url('assets/image');echo $img; ?>">
                  <!-- </i> -->
               </div>
               <div class="tile-object">
                  <div class="name">
                     <?php echo $value->nama; ?>
                  </div>
                  <div class="number">
                     <?php echo $i; ?>
                  </div>
               </div>
            </a> <?php  
         } else {
            $rev = false;
         }     
      }
   }
?>   
</div>
</div>
<!-- END PAGE CONTENT-->

<!-- static modal-->
<div id="member" class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog">
      <div class="modal-content">
         <form id="form_member" enctype="multipart/form-data" method="post" >
            <div class="modal-body">
               <!-- BEGIN FORM-->
               <table style="margin-left:auto;margin-right:auto;">
                  <div style="display:none" id="url"></div>                  
                  <tr>
                     <td>No Telepon</td>
                     <td>:</td>
                     <td><input onkeyup="getMember()" id="member-telp" name="phone" type="text" class="form-control" placeholder="No Telepon Pelanggan"></td>
                  </tr>
                  <tr>
                     <td width="105px">Jumlah Kedatangan</td>
                     <td width="20px">:</td>
                     <td><input id="member-visit" name="visit" type="text" class="form-control" placeholder="Jumlah Kedatangan" readonly></td>
                     </tr>
                  <tr>
                     <td width="105px">Status</td>
                     <td width="20px">:</td>
                     <td><input id="member-status" name="status" type="text" class="form-control" placeholder="Status Pelanggan" readonly></td>
                     <td><a onclick="membersip()" href="#" class="btn bg-green"><i class="icon-repeat"></i> Membership</a></td>
                  </tr>
                  <tr>
                     <td width="105px">Id</td>
                     <td width="20px">:</td>
                     <td><input id="member-id" name="id" type="text" class="form-control" placeholder="Id Pelanggan" readonly></td>
                  </tr>
                  <tr>
                     <td width="105px">Nama</td>
                     <td width="20px">:</td>
                     <td><input id="member-nama" name="name" type="text" class="form-control" placeholder="Nama Pelanggan"></td>
                  </tr>
                  <!-- <tr>
                     <td>Twitter</td>
                     <td>:</td>
                     <td><input id="member-twitter" name="twitter" type="text" class="form-control" placeholder="Twitter Pelanggan"></td>
                  </tr>   -->                
               </table>
               <!-- END FORM-->
            </div>
            <div class="modal-footer">
               <!-- <input type="text" name="mode" id="mode" hidden> -->
               <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
               <button type="submit" class="btn blue">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- static modal-->
<div id="static" class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog">
      <div class="modal-content">
         <form id="form_reservasi" enctype="multipart/form-data" method="post" >
            <div class="modal-body">
               <!-- BEGIN FORM-->
               <table style="margin-left:auto;margin-right:auto;">
                  <tr>
                     <td width="105px">Nama</td>
                     <td width="20px">:</td>
                     <td><input id="m-nama" name="m-nama" type="text" class="form-control" placeholder="Nama Pelanggan"></td>
                  </tr>
                  <tr>
                     <td>No Telepon</td>
                     <td>:</td>
                     <td><input id="m-telp" name="m-telp" type="text" class="form-control" placeholder="No Telepon Pelanggan"></td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td>:</td>
                     <td><input id="m-alamat" name="m-alamat" type="text" class="form-control" placeholder="Alamat Pelanggan"></td>
                  </tr>
                  <tr id="jam">
                     <td>Jam</td>
                     <td>:</td>
                     <td>
                        <select name="m-jam" id="m-jam" class="form-control select2me" data-placeholder="Pilih jam...">
                           <option value=""></option>
                           <?php
                           for ($j=00; $j <= 24; $j++) {
                           for ($i=00; $i <= 60 ; $i+=5) {
                           ?>
                           <option value="<?php echo complete_zero($j,2).':'.complete_zero($i,2); ?>"><?php echo complete_zero($j,2).':'.complete_zero($i,2); ?></option>
                           <?php
                           }
                           }
                           ?>
                        </select>
                     </td>
                  </tr>
                  <tr id="meja">
                     <td>Meja</td>
                     <td>:</td>
                     <td>
                        <select name="m-meja" id="m-meja" class="form-control select2me" data-placeholder="Pilih meja...">
                           <option value=""></option>
                           <?php
                           foreach ($meja as $key => $value) {
                           for ($i=1; $i <= $value->qty ; $i++) {
                           ?>
                           <option value="<?php echo $value->code.'-'.$i; ?>"><?php echo $value->code.'-'.$value->nama.' '.$i; ?></option>
                           <?php
                           }
                           }
                           ?>
                        </select>
                     </td>
                  </tr>
               </table>
               <!-- END FORM-->
            </div>
            <div class="modal-footer">
               <input type="text" name="mode" id="mode" hidden>
               <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
               <button type="submit" class="btn blue">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
   function hover(object)
   {
      document.getElementById(object).style.opacity = 0.7;
   }

   function out(object)
   {
      document.getElementById(object).style.opacity = 1.0;
   }

   function set_mode(object)
   {
      $('#mode').val(object);
      if (object == "TA") {
         $('#jam').hide();
         $('#meja').hide();
      } else {
         $('#jam').show();
         $('#meja').show();
      };
   }

   function clear()
   {
      $('#mode').val('');
      $('#m-meja').val('');
      $('#m-jam').val('');
      $('#m-nama').val('');
      $('#m-phone').val('');
      $('#m-alamat').val('');
      $('#m-jam').select2().trigger("change");
      $('#m-meja').select2().trigger("change");
   }

   function rev_cek(object)
   {
      // confirm dialog
      alertify.set({ labels: {
         ok     : "Datang",
         cancel : "Belum"
      } });
      alertify.confirm("Apakah pemesan ruangan sudah datang?", function (e) {

          if (e) {
              // user clicked "ok"
               var url = "<?php echo base_url($this->cname); ?>/revs_attend";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: {meja:object},
                  success: function(msg)
                  {
                     window.location = "<?php echo base_url().'kasir/pesan/'; ?>" + msg;
                  }
               });
          } else {
              // user clicked "cancel"
              window.location = "<?php echo base_url().'kasir/pesan/'; ?>"+object;
          }
      });




      // var url = "<?php echo base_url($this->cname); ?>/revs_attend";
      // $.ajax({
      //    type: "POST",
      //    url: url,
      //    data: {meja:object},
      //    success: function(msg)
      //    {
      //       window.location = "<?php echo base_url().'kasir/pesan/'; ?>" + msg;
      //    }
      // });
   }

   function membersip()
   {
      var url = "<?php echo base_url($this->cname); ?>/update_to_member";
      var id = $('#member-id').val();
      var status = $('#member-status').val();
      if (status == "member") {
         status = "non member";
      } else{
         status = "member";
      };
      $.ajax({
         type: "POST",
         url: url,
         data: {id:id,status:status},
         success: function(msg)
         {
            $('#member-status').val(status);
         }
      });
   }

   function getMember()
   {
      var url = "<?php echo base_url($this->cname); ?>/get_member";
      var phone = $('#member-telp').val();
      $.ajax({
         type: "POST",
         url: url,
         data: {phone:phone},
         success: function(msg)
         {
            if (msg != 0) {
               var data = JSON.parse(msg);
               // $('#member-twitter').val(data.twitter);
               $('#member-id').val(data.id);
               $('#member-nama').val(data.name);
               $('#member-status').val(data.status);
               $('#member-visit').val(data.visit);
            } else {
               $('#member-id').val('Belum Terdaftar');
               $('#member-status').val('non member');
               $('#member-visit').val('');
               $('#member-nama').val('');
               // $('#member-twitter').val('');
            }
         }
      });
   }

   $("#form_reservasi").submit(function(){
      var url = "<?php echo base_url($this->cname); ?>/reservasi";
      $.ajax({
         type: "POST",
         url: url,
         data: $('#form_reservasi').serialize(),
         success: function(msg)
         {
            // alert(msg);
            if(msg == 'R'){
               window.location = "<?php echo base_url($this->cname); ?>";
            } else if(msg == 'TA') {
               window.location = "<?php echo base_url().'kasir/pesan/Take-away'; ?>";
            } else {
               alert('Mohon isi dengan benar!');
            }
         }
      });
      return false;
   });

   $("#form_member").submit(function(){
      var urlto = $('#url').html();
      var member = $('#member-id').val();
      if ($('#member-id').val() == "Belum Terdaftar") {
         var url = "<?php echo base_url($this->cname); ?>/member";
         $.ajax({
            type: "POST",
            url: url,
            data: $('#form_member').serialize(),
            success: function(msg)
            {
               var data = msg.split('|');
               if(data[0] == '1'){
                  window.location = urlto + "?member=" + data[1];
               } else {
                  alert(data[1]);
               }
            }
         });
      } else {
         // alert(urlto + "?member=" + member);
         window.location = urlto + "?member=" + member;
      };
      return false;
   });

   $('#code_meja').on('change', function(){
      var code = $('#code_meja').val();
      // alert('<?php echo base_url($this->cname); ?>/meja/'+code);
      window.location = '<?php echo base_url($this->cname); ?>/meja/'+code;
   });
</script>