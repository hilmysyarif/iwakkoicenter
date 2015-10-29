<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_grafik extends MY_Model {

	//menampilkan top produk
	public function get_top_produk($param=''){
		$sql = "SELECT
					code,
					name,
					count(code) AS top
				FROM
					view_selling
				WHERE
					(date BETWEEN ? AND ?)
				GROUP BY
					code
				ORDER BY
					top DESC
				LIMIT 5";
				// echo $this->db->last_query();exit;
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil->result();
	}

	//menghitung pada view selling
	public function count_selling($param=''){
		if(!empty($param))
			$this->db->where('date BETWEEN '.$this->protect($param['tgl_awal']).' AND '.$this->protect($param['tgl_akhir']));
		$res = $this->db->get('view_selling');
		return $res->num_rows();
	}

	public function get_low_produk($param=''){
		$sql = "SELECT
					code,
					name,
					COUNT(code) AS top
				FROM
					view_selling
				WHERE
					(date BETWEEN ? AND ?)
				GROUP BY
					code
				ORDER BY
					top ASC
				LIMIT 5";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil->result();
	}

	public function get_omset($param=''){
		$sql = "SELECT penjualan.date, sum(penjualan.bayar) as grand_total FROM penjualan WHERE (`date` BETWEEN ? AND ?) GROUP BY date";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil;
	}
	
}
/* End of file mdl_view_selling.php */
/* Location: ./application/modules/laporan/models/mdl_view_selling.php */