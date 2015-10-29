<ul class="nav navbar-nav pull-right">
   <!-- BEGIN INBOX DROPDOWN -->
   <li class="dropdown" id="header_inbox_bar">
      <a href="<?php echo base_url(); ?>finance/hutang/daftar" class="dropdown-toggle" style="color:white; padding-top:11px; padding-right:10px; padding-bottom:11px;">
         <i class="icon-warning-sign"></i>
         <?php 
            $sql="SELECT COUNT(no_referensi) as notif FROM view_hutang WHERE saldo > 0 AND jatuh_tempo BETWEEN DATE(NOW()) AND DATE(NOW() + INTERVAL 3 DAY)" ;
            $res = $this->db->query($sql);
            $res = $res->result();
            $notif = $res[0]->notif;
            // echo $this->db->last_query();exit;
            if ($notif>0){
               echo '<span class="badge" style="left: 77px; right: -5px;">'.$notif.'</span>';
            }
         ?>
         Hutang
      </a>
   </li>
  
      
   
   <!-- END TODO DROPDOWN -->
   <!-- BEGIN USER LOGIN DROPDOWN -->
   <li class="dropdown user">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
         <span class="username"><?php $user = @$this->session->userdata('astrosession'); echo $user[0]->uname; ?></span>
         <i class="icon-angle-down"></i>
      </a>
      <ul class="dropdown-menu">
         <li>
            <a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a>
         </li>
         <li>
            <a href="<?php echo base_url('authenticate/logout'); ?>"><i class="icon-key"></i> Log Out</a>
         </li>
      </ul>
   </li>
<!-- END USER LOGIN DROPDOWN -->
</ul>