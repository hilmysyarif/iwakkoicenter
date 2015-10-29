<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_checking extends MY_Model {

	public function kas(){
		$user = $this->session->userdata('astrosession');
		$tgl=date('Y-m-d');
		$user_id=$user[0]->id;
		$sql = "SELECT * FROM atombizz_selling_cashdraw WHERE `date`='$tgl' AND user_id='$user_id'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$fetch1=$result->result();
			$status = $fetch1[0]->status;
			$cash = $fetch1[0]->cashdraw_no;
			return $status.'|'.$cash;
		}else{
			return FALSE;
		}
	}

	public function cek_member($param='')
	{
		$today = date("Y-m-d");

		$member = $this->db->get_where('atombizz_customers',array('code'=>$param['code_member']));
		$member = $member->result();

		if ($member != null) {
			$expired = @$member[0]->expired;
			if ($today > $expired) {
				echo 'Member has been expired';
			}else{
				$this->session->set_userdata('membersession',$member);
				echo 'Member Success';
			}
		}else{
			echo "Member is not exist";
		}
		
	}

	public function temporary($param=''){
		$user = $this->session->userdata('astrosession');
  	  	$user_id = $user[0]->id;
  	  	$kas = $param['cash'];
  	  	$tgl = date('Y-m-d');
  	  	// $guest = $param['guest'];

  	  	$sql = "SELECT * FROM atombizz_tmp_detail_jual WHERE orderdate='$tgl' AND userid='$user_id' AND cashdraw='$kas' AND status='temporary'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$fetch=$result->result();
			return $fetch[0]->invoice;
		}else{
			return '';
		}
  	}

  	public function get_count_transaction()
  	{
  		$date = date('Y-m-d');
  		$sql = "SELECT * FROM atombizz_selling WHERE `date` = ?";
  		$query = $this->db->query($sql,$date);
  		return $query->num_rows();
  	}
}

/* End of file mdl_checking.php */
/* Location: ./application/modules/resepsionis/models/mdl_checking.php */