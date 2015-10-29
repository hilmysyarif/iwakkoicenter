<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_kasir extends MY_Model {
	public function getOperator()
	{
		$this->db->select('nama');
		$this->db->group_by('nama');
		$sql = $this->db->get('view_selling_cashdraw');
		return $sql->result();
	}
	public function getDataOmset($param='')
	{
		// $this->db->select('date,cashdraw_no,nama,start_cash,omset,total_cash,end_cash,(start_cash-end_cash) as selisih,status');
		// if(@$value['operator']){
		// 	$this->db->where('nama', $value['operator']);
		// }
		// $this->db->where('DATE BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
		// $sql = $this->db->get('view_selling_cashdraw');		
		// return $sql;

		$this->db->select('date as tgl, COUNT(bayar) as total_transaksi, SUM(bayar) AS grand_total');
		$this->db->where('(date BETWEEN '.$this->protect($param['tgl_awal']).' AND '.$this->protect($param['tgl_akhir']).')');
		$this->db->group_by('date');
		$sql = $this->db->get('penjualan');
		// echo $this->db->last_query();exit;
		return $sql->result();
	}
}

/* End of file mdl_kasir.php */
/* Location: ./application/modules/kasir/models/mdl_kasir.php */