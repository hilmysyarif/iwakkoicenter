<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_hutang extends MY_Model {

	public function gen_kode($param='')
	{
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
		$query = $this->find('atombizz_kasbon',$where);
		$data = $query->row();
		return $data;
	}

	public function count_data()
	{
		$sql = "SELECT SUM(saldo) as kasbon FROM view_kasbon WHERE saldo > 0";
		$query = $this->db->query($sql);
		$data = $query->result();
		$total = $data[0]->kasbon;
		return $total;
	}

	public function opt_suplier()
    {
        $sql = "SELECT * FROM atombizz_suppliers";
    	$res = $this->db->query($sql);

    	if($res->num_rows() > 0) {
    		$hasil[''] = "";
    		foreach($res->result_array() as $val) {
    			$hasil[trim($val['code'])] = trim($val['name']);
    		}
    	} else {
    		$hasil[''] = "Tidak Ada Data";
    	}

    	return $hasil;
    }

    public function saldo($param='')
    {
    	$sql = "SELECT * FROM view_hutang WHERE person = ?";
    	$query = $this->db->query($sql,$param['person']);
    	if($query->num_rows() > 0){
    		$data = $query->row();
    	} else {
    		$data = FALSE;
    	}
    	return $data;
    }
}

/* End of file mdl_accounting.php */
/* Location: ./application/modules/master/models/mdl_accounting.php */