<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_accounting extends MY_Model {

	//input_produk
	public function gen_kode($param='')
	{
		$param = $this->input->post();
	 	$tgl = $param['date'];
	 	$kode_tgl = date('ymd',strtotime($tgl));
	 	$kode = $param['code'];

	 	$urut = $this->max('atombizz_accounting_buku_besar', 'urut', array('kode'=>$param['code'],'tanggal'=>$param['date']));
	 	$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$kode_tgl.'.'.complete_zero($num,3);
		$result = array('code'=>$faktur, 'order'=>$num);
		return $result;
	}

	public function ambil_data($param='')
	{
		$where = array('id'=>$param['id']);
		$query = $this->find('atombizz_accounting_buku_besar',$where);
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

	public function opt_akun_biaya($param='')
	{
		$sql = "SELECT * FROM atombizz_accounting_master_akun WHERE code_ref LIKE ".$this->protectLikeAkhir($param['code'])." AND code_ref != ".$this->protect($param['code'])." ORDER BY id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			$opt = '<option value=""></option>';
			foreach ($query->result() as $key => $value) {
				$opt .= '<option value="'.$value->code.'">'.$value->code.' '.$value->name.'</option>';
			}
			return $opt;
		} else {
			return FALSE;
		}

	}
}

/* End of file mdl_accounting.php */
/* Location: ./application/modules/master/models/mdl_accounting.php */