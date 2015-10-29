<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_kas extends MY_Model {

	public function get_status(){
		$user = $this->session->userdata('astrosession');
		$tgl=date('Y-m-d');
		$user_id=$user[0]->id;

		$sql = "SELECT * FROM atombizz_selling_cashdraw WHERE `date`='$tgl' AND user_id='$user_id' AND status='temporary'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		return ($total >= 1) ? 'sudah buka' : 'belum buka';
	}

	public function get_cashdraw(){
		$date = date('Y-m-d');
		$kode = 'CASH';
		$sql = "SELECT COUNT(id) as total FROM atombizz_selling_cashdraw WHERE `date`='$date'";
		$result = $this->db->query($sql);
		$fetch = $result->result();
		$total = $fetch[0]->total;
		$koder=$total + 1;

		$bln = date('dmy');
		$urut = complete_zero($koder,2);
		$reference = $kode.$urut.'/'.$bln;
		return $reference;
	}

	public function get_transaksi_status(){
		$user = $this->session->userdata('astrosession');
		$tgl=date('Y-m-d');
		$user_id=$user[0]->id;

		$sql = "SELECT * FROM atombizz_selling_cashdraw WHERE `date`='$tgl' AND user_id='$user_id'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		$data = $result->row();
		return $data;
	}

	public function get_omset($value='')
	{
		$sql = "SELECT SUM(total) AS total FROM atombizz_selling WHERE cashdraw_no = ? AND `status` = 'cash'
				GROUP BY cashdraw_no";
		$result = $this->db->query($sql,$value);
		$data = $result->row();
		return (empty($data->total)) ? 0 : $data->total;
	}

	public function get_data($value='')
	{
		$sql = "SELECT * FROM atombizz_selling_cashdraw WHERE cashdraw_no = ?";
		$result = $this->db->query($sql,$value);
		$data = $result->row();
		return $data;
	}
}

/* End of file mdl_kas.php */
/* Location: ./application/modules/resepsionis/models/mdl_kas.php */