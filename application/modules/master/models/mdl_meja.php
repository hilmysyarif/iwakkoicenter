<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_meja extends MY_Model {
	
	public function get_meja($id=''){
		$sql = $this->db->get_where('meja',array('id'=>$id));
		return $sql->result();
	}

	public function count_data()
	{
		$sql = "SELECT SUM(qty) as qty, COUNT(id) as jml FROM meja";
    	$res = $this->db->query($sql);
    	$res = $res->result();
    	$total = $res[0];

		return $total;
	}

}
/* End of file m_kelas.php */

/* Location: ./application/modules/laporan/models/m_kelas.php */