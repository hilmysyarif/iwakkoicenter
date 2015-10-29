<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_cashdraw extends MY_Model {

	public function get_status(){
		// $user = $this->session->userdata('astrosession');
		$tgl=date('Y-m-d');
		// $user_id=$user[0]->id;

		$sql = "SELECT * FROM atombizz_cashdraw WHERE `date`='$tgl' AND user_id='$user_id' AND status='temporary'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		return ($total >= 1) ? 'sudah buka' : 'belum buka';
	}

	public function get_cashdraw(){
		$date = date('Y-m-d');
		$kode = 'CASH';
		$sql = "SELECT COUNT(id) as total FROM atombizz_cashdraw WHERE `date`='$date'";
		$result = $this->db->query($sql);
		$fetch = $result->result();
		$total = $fetch[0]->total;
		$koder=$total + 1;

		$bln = date('dmy');
		$urut = complete_zero($koder,2);
		$reference = $kode.$urut.'/'.$bln;
		return $reference;
	}

	public function get_omset($id){
		$sql = "SELECT SUM(bayar) as omset FROM penjualan WHERE `id-cashdraw` = '$id' ";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0){
			$data = $result->row();
			$omset = $data->omset;
		} else {
			$omset = 0;
		}
		
		return $omset;
	}

	public function get_kas($id){
		$sql = "SELECT SUM(bayar) as kas FROM penjualan WHERE `id-cashdraw` = '$id' ";
		$result = $this->db->query($sql);
		$hasil = $result->result();

		return $hasil[0]->kas;
	}

	public function get_start_cash($cash){
		$sql = "SELECT start_cash FROM atombizz_cashdraw WHERE `code` = '$cash'";
		$result = $this->db->query($sql);
		$hasil = $result->result();

		return $hasil[0]->start_cash;
	}

	public function get_cash($id,$date){
		$sql = "SELECT id, code FROM atombizz_cashdraw WHERE status = 'temporary' AND employee_id = '$id'";//`date`='$date' AND employee_id = '$id'";
		$result = $this->db->query($sql);
		$hasil = $result->result();

		return $hasil[0];
	}

	public function get_transaksi_status(){
		// $user = $this->session->userdata('astrosession');
		$tgl=date('Y-m-d');
		// $user_id=$user[0]->id;

		$sql = "SELECT * FROM atombizz_cashdraw WHERE `date`='$tgl'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		$data = $result->row();
		return $data;
	}

	public function cek($id,$date){
		$hasil = $this->find('atombizz_cashdraw',array('employee_id'=>$id,/*'date'=>$date, */ 'status'=>'temporary'));
		if (!empty($hasil)){
			$hasil = $hasil->num_rows();
		} else {
			$hasil = 0;
		}
		return $hasil;
	}

	public function cektutup($id,$date){
		$hasil = $this->find('atombizz_cashdraw',array('employee_id'=>$id/*,'date'=>$date*/,'status'=>'no'));
		if (!empty($hasil)){
			$hasil = $hasil->num_rows();
		} else {
			$hasil = 0;
		}
		return $hasil;
	}

	public function get_cashdraw_list($value='')
	{
		$sql = "SELECT * FROM atombizz_cashdraw WHERE code = ?";
		$query = $this->db->query($sql,$value);
		return $query->row();
	}

}

/* End of file mdl_kasir.php */
/* Location: ./application/modules/kasir/models/mdl_kasir.php */