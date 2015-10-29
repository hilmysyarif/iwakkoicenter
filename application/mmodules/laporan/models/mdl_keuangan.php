<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_keuangan extends MY_Model {
	public function getOperator()
	{
		$this->db->select('valid_by');
		$this->db->group_by('valid_by');
		$sql = $this->db->get('atombizz_accounting_buku_besar');		
		return $sql->result();
	}
	public function getDataKeuangan($value='')
	{
		$this->db->select('tanggal,no_referensi,debit,kredit,keterangan');
		$this->db->where('valid', 'yes');
		$this->db->where_in('no_akun', array('110000','120000'));
		$this->db->where('tanggal BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
		// $this->db->last_query();exit;
		// $this->db->group_by('date');
		$sql = $this->db->get('atombizz_accounting_buku_besar');		
		return $sql;
	}
	public function getDataKas($value='')
	{
		$this->db->select('tanggal,no_referensi,debit,kredit,keterangan');
		if(@$value['operator']){
			$this->db->where('valid_by', $value['operator']);
		}
		$this->db->where('tanggal BETWEEN \''.$value['tgl_awal'].'\' AND \''.$value['tgl_akhir'].'\'');
		// $this->db->last_query();exit;
		// $this->db->group_by('date');
		$sql = $this->db->get('atombizz_accounting_buku_besar');		
		return $sql;
	}

	public function getValueAkun($param='')
	{
		$sql = "SELECT atombizz_accounting_buku_besar.no_akun, sum(atombizz_accounting_buku_besar.debit) as debit, sum(atombizz_accounting_buku_besar.kredit) as kredit, sum(atombizz_accounting_buku_besar.debit) - sum(atombizz_accounting_buku_besar.kredit)as saldo FROM atombizz_accounting_buku_besar WHERE no_akun = ? AND (tanggal BETWEEN ? AND ?) GROUP BY no_akun";
		$query = $this->db->query($sql,array($param['kode'],$param['tgl_awal'],$param['tgl_akhir']));
		if($query->num_rows() > 0){
			$data = $query->row();
			$saldo = $data->saldo;
		} else {
			$saldo = 0;
		}
		return $saldo;
	}
}

/* End of file mdl_keuangan.php */
/* Location: ./application/modules/keuangan/models/mdl_keuangan.php */