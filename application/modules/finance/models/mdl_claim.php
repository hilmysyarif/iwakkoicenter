<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_claim extends MY_Model {

	public function getDataDebet($param='')
	{
		if ($param['debet'] == 'all') {
			$where = '';
		} elseif ($param['debet'] == 'yes') {
			$where = "AND `debet-claimed` = 'yes'";
		} else {
			$where = "AND `debet-claimed` = 'no'";
		}
		if($param['bank']!='all' && $param['bank']!=''){
			$where2 = "AND note = ".$this->protect($param['bank']);
		} else $where2 = '';
		$sql = "SELECT
					note as bank,
					coalesce(sum(bayar),0) AS jumlah,
					`debet-claimed` as claimed
				FROM
					penjualan
				WHERE
					(date BETWEEN ? AND ?) AND cash = '0' $where $where2
				GROUP BY
					note, `debet-claimed`";
		$hasil=$this->db->query($sql,array($param['tgl_awal'],$param['tgl_akhir']));
		return $hasil;
	}

}

/* End of file mdl_claim.php */
/* Location: ./application/modules/finance/models/mdl_claim.php */