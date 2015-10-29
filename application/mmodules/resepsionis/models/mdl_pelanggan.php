<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pelanggan extends MY_Model {

	public function get_data_pelanggan($value='')
	{
		$sql = "SELECT * FROM atombizz_guest WHERE code = ?";
		$query = $this->db->query($sql,$value);
		if($query->num_rows() >= 1){
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function get_count_patient($value='')
	{
		$sql = "SELECT COUNT(id) AS total FROM atombizz_guest";
		$query = $this->db->query($sql);
		$data = $query->row();
		return $data->total;
	}

	public function get_count_member($value='')
	{
		$sql = "SELECT COUNT(id) AS total FROM atombizz_guest WHERE member = 'yes'";
		$query = $this->db->query($sql);
		$data = $query->row();
		return $data->total;
	}

}

/* End of file mdl_pelanggan.php */
/* Location: ./application/modules/resepsionis/models/mdl_pelanggan.php */