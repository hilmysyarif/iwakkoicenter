<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_stock extends MY_Model {
	public function get_rak()
	{
		$this->db->select('rak_code, rak_name');
		$this->db->group_by('rak_code');
		$sql = $this->db->get('view_warehouse_stok');
		return $sql->result();
	}

	public function produk($value='')
	{
		$this->db->select('product_name,product_code');
		// $this->db->where('rak_code', $value);
		$this->db->group_by('product_code');
		$sql = $this->db->get('view_warehouse_stok');
		return $sql->result();
	}

	public function data_stock($value='')
	{
		$this->db->select('product_code, product_name, rak_name, saldo');
		if(@$value['rak']){
			$this->db->where('rak_code', $value['rak']);
		}
		if(@$value['produk']){
			$this->db->where('product_code', $value['produk']);
		}
		$sql = $this->db->get('view_warehouse_stok');
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
/* Location: ./application/modules/gudang/models/mdl_retur.php */