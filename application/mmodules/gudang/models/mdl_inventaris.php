<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_inventaris extends MY_Model {

	public function get_opt_barang($value='')
	{
		$this->db->where('category', $value['category']);
		$query = $this->db->get('atombizz_inventaris');
		$opt = '<option value=""></option>';
		foreach ($query->result() as $key => $value) {
			$opt .= '<option value="'.$value->code.'">'.$value->name.'</option>';
		}
		return $opt;
	}

}

/* End of file mdl_inventaris.php */
/* Location: ./application/modules/gudang/models/mdl_inventaris.php */
