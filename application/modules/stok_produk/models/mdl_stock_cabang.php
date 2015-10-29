<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_stock_cabang extends MY_Model {
	public function get_rak()
	{
		$this->db->select('rak_code, rak_name');
		$this->db->group_by('rak_code');
		$sql = $this->db->get('view_warehouse_stok_cabang');
		return $sql->result();
	}

	public function get_cabang()
	{
		$this->db->distinct();
		$this->db->select('dept');
		$sql = $this->db->get('view_warehouse_stok_cabang');
		return $sql->result();
	}

	public function produk($value='')
	{
		$this->db->select('product_name,product_code');
		// $this->db->where('rak_code', $value);
		$this->db->group_by('product_code');
		$sql = $this->db->get('view_warehouse_stok_cabang');
		return $sql->result();
	}

	public function data_stock($value='')
	{
		$this->db->select('product_code, product_name, rak_name, saldo, dept');
		if(@$value['rak']){
			$this->db->where('rak_code', $value['rak']);
		}
		if(@$value['produk']){
			$this->db->where('product_code', $value['produk']);
		}
		if(@$value['dept']){
			$this->db->where('dept', $value['dept']);
		}
		$sql = $this->db->get('view_warehouse_stok_cabang');
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
					) AS minimal,
					vws.dept
				FROM
					view_warehouse_stok_cabang vws
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

	public function sync($query='')
	{
		$counter = 0;
		foreach ($query as $row) {
			$sql = $this->db->query(str_replace("atombizz_warehouses_stok","atombizz_warehouses_stok_cabang",$row->query));
			$return[$counter]['id'] = $row->id;
			$return[$counter]['result'] = $this->db->affected_rows();
			$counter++;
		}
		return json_encode($return);
	}
}

/* End of file mdl_retur.php */
/* Location: ./application/modules/stok_produk/models/mdl_retur.php */