<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_cashdraw extends MY_Model {
	//menampilkan karyawan untuk kasir
	public function get_kasir($id){
		// $this->db->select('code,date,start_cash,omset,total_cash,end_cash,(end_cash-start_cash) as selisih, operator_name');
		$this->db->where('id', $id);
		$sql = $this->db->get('view_selling_cashdraw');
		// echo $this->db->last_query();exit;
		return $sql->result();
	}

	public function validasi_kasir($param=''){
		$data = array('status' => 'yes',
						'valid_by' => $param['by']  );
		$this->db->where('id', $param['id']);
		$this->db->update('atombizz_cashdraw', $data);
		return $this->db->affected_rows();
	}
}
/* End of file mdl_cashdraw.php */
/* Location: ./application/modules/laporan/models/mdl_cashdraw.php */