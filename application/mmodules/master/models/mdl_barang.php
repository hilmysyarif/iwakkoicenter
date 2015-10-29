<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_barang extends MY_Model {

	public function detail_barang($value='')
	{
		$this->db->where('id', $value['id']);
		$query = $this->db->get('atombizz_inventaris');
		return $query;
	}

}

/* End of file mdl_barang.php */
/* Location: ./application/modules/master/models/mdl_barang.php */