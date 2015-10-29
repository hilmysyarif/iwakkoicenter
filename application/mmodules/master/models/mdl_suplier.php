<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_suplier extends MY_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_order($clasification=''){
		$this->db->select_max('urut');
		$sql = $this->db->get_where('atombizz_suppliers',array('classification'=>$clasification));
		return $sql->result();
	}

	public function get_suplier($id=''){
		$sql = $this->db->get_where('atombizz_suppliers',array('id'=>$id));
		return $sql->result();
	}

	//both
	public function count_data()
	{
		$total = $this->total('atombizz_suppliers');
		return $total;
	}

}
/* End of file m_kelas.php */

/* Location: ./application/modules/laporan/models/m_kelas.php */