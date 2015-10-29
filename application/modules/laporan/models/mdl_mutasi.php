<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_mutasi extends MY_Model {
	public function getProduct()
	{
		$this->db->select('product_code, product_name');
		$this->db->group_by('product_code');
		$sql = $this->db->get('atombizz_mutasi');
		return $sql->result();
	}
	public function getDataBarang($value='')
	{
		$this->db->select('product_code,product_name,date,description,quantity,operator');
		if(@$value['produk']){
			$this->db->where('product_code', $value['produk']);
		}
		$this->db->where('DATE BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
		// $this->db->last_query();exit;
		// $this->db->group_by('date');
		$sql = $this->db->get('atombizz_mutasi');		
		return $sql;
	}
	public function getDataRetur($value='')
	{
		if($value['opt'] == 'konsumen'){
			$this->db->select('date as tgl, reference as referensi, product_code as code_produk, product_name as code_name,quantity as qty,hpp as price,total as tot');
			$this->db->where('DATE BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
			$sql = $this->db->get('view_retur_in');
			return $sql;
		}else if($value['opt'] == 'supplier'){
			$this->db->select('date as tgl, reference as referensi, product_code as code_produk, product_name as code_name,quantity as qty,hpp as price,total as tot');
			$this->db->where('DATE BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
			$sql = $this->db->get('view_retur_out');
			return $sql;
		}else if($value['opt'] == 'internal'){
			$this->db->select('date as tgl, reference as referensi, product_code as code_produk, product_name as code_name,quantity as qty,hpp as price,total as tot');
			$this->db->where('date BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
			$sql = $this->db->get('view_retur_internal');
			return $sql;
		}
	}
}

/* End of file mdl_mutasi.php */
/* Location: ./application/modules/mutasi/models/mdl_mutasi.php */