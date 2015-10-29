<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_stock extends MY_Model {
	public function get_rak()
	{
		$this->db->select('kode, nama');
		$this->db->group_by('kode');
		$sql = $this->db->get_where('atombizz_rack',array('status' => 'produk'));
		return $sql->result();
	}

	public function produk($value='')
	{
		$sql = $this->db->get('menu');
		return $sql->result();
	}

	public function data_stock($value='')
	{
		$this->db->select('code, nama, rak_name,saldo,status');
		if(@$value['rak']){
			$this->db->where('rak_code', $value['rak']);
		}
		if(@$value['produk']){
			$this->db->where('code', $value['produk']);
		}
		if(@$value['status']){
			$this->db->where('status', $value['status']);
		}
		$this->db->where('rak_code like', '%GP%');
		$sql = $this->db->get('view_stok_produk');
		return $sql->result();
	}

	public function min_stock()
	{
		$sql = "SELECT
					vws.product_code,
					vws.product_name,
					vws.rak_name,
					vws.saldo,
					(	SELECT
							ap.`min`
						FROM
							atombizz_product ap
						WHERE
							ap. CODE = vws.product_code
					) AS minimal
				FROM
					view_warehouse_stok vws
				WHERE
					saldo <= (
						SELECT
							ap.`min`
						FROM
							atombizz_product ap
						WHERE
							ap. CODE = vws.product_code
					)";
		$result = $this->db->query($sql);
		return $result->result();
	}
}

/* End of file mdl_retur.php */
/* Location: ./application/modules/stok_produk/models/mdl_retur.php */