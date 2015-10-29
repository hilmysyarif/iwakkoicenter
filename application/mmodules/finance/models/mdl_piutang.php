<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_piutang extends MY_Model {

	//input_produk
	function gen_kode(){
		$sql = "SELECT
					COUNT(kode) AS total
				FROM
					atombizz_accounting_buku_besar
				WHERE
					kode = 'PTG'";
		$data = $this->db->query($sql);
		foreach ($data->result() as $das) {
			$kode = 'PTG';
			$urut = $das->total+1;
			if($urut<10){
				$urut = '0000'.$urut;
			} else if($urut<100){
				$urut = '000'.$urut;
			} else if($urut<1000){
				$urut = '00'.$urut;
			}  else if($urut<10000){
				$urut = '0'.$urut;
			}
		}
		$result = array('kode'=>$kode, 'urut'=>$kode.$urut);
		return $result;
	}

	function gen_kode_bayar($param='')
	{
		// $param = $this->input->post();
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

	public function get_customer()
    {
    	$sql = "SELECT * FROM atombizz_customers";
    	$res = $this->db->query($sql);

    	if($res->num_rows() > 0) {
    		$hasil[''] = "";
    		foreach($res->result_array() as $val) {
    			$hasil[trim($val['id'])] = trim($val['name']);
    		}
    	} else {
    		$hasil[''] = "Tidak Ada Data";
    	}

    	return $hasil;
    }

    function get_faktur($id){
		$sql = "SELECT * FROM view_piutang WHERE person='$id' AND saldo > 0 AND valid = 'yes'";
		$data = $this->db->query($sql);
		
		return $data;
	}

	function get_saldo($faktur){
		$sql = "SELECT * FROM view_piutang WHERE faktur='$faktur'";
		$data = $this->db->query($sql);
		if ($data->num_rows()>0) {
				foreach ($data->result() as $das) {
				$result = $das->saldo;
			}
		} else {
			$result = 0;
		}
		return $result;
	}

	public function get_data($param='')
	{
		$sql = "SELECT * FROM view_piutang WHERE no_referensi = ?";
		$query = $this->db->query($sql,$param['reference']);
		
		return $query;
	}


}

/* End of file mdl_accounting.php */
/* Location: ./application/modules/master/models/mdl_accounting.php */