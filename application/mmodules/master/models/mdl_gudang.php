<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_gudang extends MY_Model {


	public function ambil_data($param='')
	{
		$where = array('id'=>$param['id']);
		$query = $this->find('atombizz_rack',$where);
		$data = $query->row();
		return $data;
	}

	public function count_data()
	{
		$total = $this->total('atombizz_rack');
		return $total;
	}
}

/* End of file mdl_produk.php */
/* Location: ./application/modules/master/models/mdl_produk.php */