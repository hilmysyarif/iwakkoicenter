<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_sync extends MY_Model {

	public function get_where($table=''){
		$sql = $this->db->get_where('temp_sync', array('table'=>$table, 'sync'=>'no'));
		return $sql->result();
	}

	public function get(){
		$sql = $this->db->get_where('temp_sync', array('sync'=>'no'));
		return $sql->result();
	}

	public function success_where($table=''){
		$sql = $this->db->query("UPDATE temp_sync SET sync = 'yes' WHERE table = '$table'");
	}

	public function success(){
		$sql = $this->db->query("UPDATE temp_sync SET sync = 'yes'");
	}

}

/* End of file mdl_kas.php */
/* Location: ./application/modules/resepsionis/models/mdl_kas.php */