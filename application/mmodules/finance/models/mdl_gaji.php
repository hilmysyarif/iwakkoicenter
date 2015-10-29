<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_gaji extends MY_Model {

	public function gen_kode($value='')
	{
		$sql = "SELECT MAX(`urut`) AS `order` FROM `atombizz_accounting_buku_besar` WHERE `kode` = ?";
		$query = $this->db->query($sql,$value);
		$max = $query->row();
		$total = (!empty($max->order)? $max->order+1 : 0+1);
		$today = date('Y-m-d');
		$code = $value.'.'.$today.'.'.complete_zero($total,3);
		$arr_data = array('code'=>$code, 'order'=>$total);

		return $arr_data;
	}

	public function ambil_data($param='')
	{
		$where = array('id'=>$param['id']);
		$query = $this->find('atombizz_salary',$where);
		$data = $query->row();
		return $data;
	}

	public function count_data()
	{
		$sql = "SELECT * FROM atombizz_accounting_buku_besar WHERE valid = 'no' AND (kode = 'PDL' OR kode = 'OPR' OR kode = 'PLL')";
		$query = $this->db->query($sql);
		$total = $query->num_rows();
		// $where = array('valid'=>'no',);
		// $total = $this->total('atombizz_accounting_journal',$where);
		return $total;
	}
	public function opt_karyawan($value='')
	{
		$sql = "SELECT * FROM view_employee WHERE status = 1 AND jabatan != 'Super Admin'";
		$query = $this->db->query($sql);
		$opt = '<option>Pilih Karyawan</option>';
		foreach ($query->result() as $key => $value) {
			$opt .= '<option value="'.$value->no_ktp.'">'.$value->no_ktp.' - '.$value->nama.'</option>';
		}
		return $opt;
	}

	public function get_data_employee($param='')
	{
		$sql = "SELECT * FROM atombizz_employee WHERE no_ktp = ?";
		$query = $this->db->query($sql,$param['code']);
		return $query->row();
	}

	public function get_kasbon_info($param='')
	{
		$sql = "SELECT * FROM view_kasbon WHERE no_ktp = ?";
		$query = $this->db->query($sql,$param['code']);
		$hutang = $query->row();
		return (empty($hutang)) ? 0 : $hutang->saldo;
	}

}

/* End of file mdl_gaji.php */
/* Location: ./application/modules/finance/models/mdl_gaji.php */