<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_view_selling extends MY_Model {

	//menampilkan top produk
	public function get_top_produk($param=''){
		$sql = "SELECT
					`id-menu`,
					nama as name,
					coalesce(sum(qty),0) AS top
				FROM
					view_menu_terjual
				WHERE
					(date BETWEEN ? AND ?)
				GROUP BY
					`id-menu`
				ORDER BY
					top DESC
				LIMIT 5";
				// echo $this->db->last_query();exit;
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil->result();
	}

	//menampilkan low produk
	public function get_low_produk($param=''){
		$sql = "SELECT
					`id-menu`,
					nama as name,
					coalesce(sum(qty),0) AS top
				FROM
					view_menu_terjual
				WHERE
					(date BETWEEN ? AND ?) 
				ORDER BY
					top ASC
				LIMIT 5";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil->result();
	}

	//menampilkan omset
	public function get_omset($param=''){
		// $sql = "SELECT
		// 		`atombizz_cashdraw`.`date`,
		// 		MONTH(`atombizz_cashdraw`.`date`) AS bulan,
		// 		YEAR(`atombizz_cashdraw`.`date`) AS tahun,
		// 		SUM(`atombizz_cashdraw`.`omset`) AS omset
		// 		FROM
		// 		atombizz_cashdraw
		// 		WHERE `status` = 'closed' AND (`date` BETWEEN ? AND ?)
		// 		GROUP BY `atombizz_cashdraw`.`date`";
		$sql = "SELECT
				`date`,
				omset AS grand_total
				FROM
				view_omset
				WHERE
				(`date` BETWEEN ? AND ?) AND omset > 0
				GROUP BY `date`";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil->result();
	}

	//menampilkan omset
	public function get_top_terapis($param=''){
		$sql = "SELECT customer_id, customer_name as nama, SUM(total) as top
				FROM atombizz_selling s, atombizz_customers d
				WHERE (date BETWEEN ? AND ?) AND s.customer_id = d.id
				GROUP BY customer_id";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil;
	}

	//menghitung pada view selling
	public function count_selling($param=''){
		if(!empty($param))
			$this->db->where('date BETWEEN '.$this->protect($param['tgl_awal']).' AND '.$this->protect($param['tgl_akhir']));
		$res = $this->db->get('penjualan');
		return $res->num_rows();
	}

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

	public function get_supp()
	{
		$this->db->select('person, name');
		$this->db->group_by('person');
		$sql = $this->db->get('view_hutang');
		return $sql->result();
	}

	public function get_paramedik()
	{
		$this->db->select('person, name');
		$this->db->group_by('person');
		$sql = $this->db->get('view_piutang');
		return $sql->result();
	}

	public function data_hutang($value='')
	{
		$this->db->select('name,person,saldo');
		// $this->db->where('person', $value);
		if($value){
			$this->db->where('person', $value);
		}
		$sql = $this->db->get('view_hutang');
		return $sql->result();
	}

	public function data_piutang($value='')
	{
		$this->db->select('name,person,saldo,jatuh_tempo');
		$this->db->where('person', $value);
		$this->db->where('saldo >', 0);
		$sql = $this->db->get('view_piutang');
		return $sql->result();
	}

	public function get_param_name()
	{
		$this->db->select('customer_name,customer_id');
		$this->db->group_by('customer_id');
		$sql = $this->db->get('atombizz_selling');
		return $sql->result();
	}
	public function get_data_param($value='')
	{
		$this->db->select('invoice_no,date,customer_name,total');
		if(@$value['operator']){
			$this->db->where('customer_id', $value['operator']);
		}
		$this->db->where('date BETWEEN '.$this->protect($value['tgl_awal']).' AND '.$this->protect($value['tgl_akhir']));
		$this->db->group_by('invoice_no');
		$sql = $this->db->get('atombizz_selling');
		// echo $this->db->last_query();exit;
		return $sql->result();
	}

	public function get_nominal($kode='',$date='')
	{
		$sql = "SELECT SUM(tagihan) as tagihan FROM penjualan WHERE meja = ? AND date = ?";
		$query = $this->db->query($sql,array($kode,$date));
		$data = $query->row();
		return $data->tagihan;
	}
}
/* End of file mdl_view_selling.php */
/* Location: ./application/modules/laporan/models/mdl_view_selling.php */