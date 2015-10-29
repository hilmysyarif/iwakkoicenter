<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pembelian extends MY_Model {
	public function getSupplier()
	{
		$this->db->select('supplier_code,supplier_name');
		$this->db->group_by('supplier_code');
		$sql = $this->db->get('view_purchase');
		return $sql->result();
	}
	public function getDataPembelian($value='')
	{
		$this->db->select('reference_no, date,supplier_name,product_name,quantity,unit_price,gross_total');
		if(@$value['produk']){
			$this->db->where('product_code', $value['produk']);
		}
		$this->db->where('DATE BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
		$sql = $this->db->get('view_purchase');
		return $sql;
	}
	public function getProduk($value='')
	{
		$sql = "SELECT * FROM atombizz_product";
		$query = $this->db->query($sql);
		return $query->result();
	}
}

/* End of file mdl_pembelian.php */
/* Location: ./application/modules/pembelian/models/mdl_pembelian.php */