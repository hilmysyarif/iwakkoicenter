<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_penjualan extends MY_Model {
	public function getGudang()
	{
		$this->db->select('kode,nama');
		$this->db->group_by('kode');
		$sql = $this->db->get('atombizz_rack');
		return $sql->result();
	}
	public function getDataPenjualan($param='')
	{
		$sql = "SELECT
					code,
					nama as name,
					coalesce(sum(qty),0) AS qty
				FROM
					view_menu_terjual
				WHERE
					(date BETWEEN ? AND ?) OR date is null
				GROUP BY
					code";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil;
	}
	public function getDataDebet($param='')
	{
		if ($param['debet'] == 'all') {
			$where = '';
		} elseif ($param['debet'] == 'yes') {
			$where = "AND `debet-claimed` = 'yes'";
		} else {
			$where = "AND `debet-claimed` = 'no'";
		}

		

		$sql = "SELECT
					note as bank,
					coalesce(sum(bayar),0) AS jumlah,
					`debet-claimed` as claimed
				FROM
					penjualan
				WHERE
					(date BETWEEN ? AND ?) AND cash = '0' $where
				GROUP BY
					note, `debet-claimed`";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil;
	}
	public function getDataCompliment($param='')
	{
		$sql = "SELECT
					`invoice-code` as code,
					`date`,
					meja,
					coalesce(bayar,0) AS jumlah,
					`note` as 'by'
				FROM
					penjualan
				WHERE
					(date BETWEEN ? AND ?) AND cash = '2'";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil;
	}
}

/* End of file mdl_penjualan.php */
/* Location: ./application/modules/penjualan/models/mdl_penjualan.php */