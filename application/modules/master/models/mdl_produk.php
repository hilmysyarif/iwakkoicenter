<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_produk extends MY_Model {

	//input_produk
	public function gen_kode($value='')
	{
		$sql = "SELECT MAX(`order`) AS `order` FROM `atombizz_facility` WHERE `type` = ?";
		$query = $this->db->query($sql,$value);
		$max = $query->row();
		$total = (!empty($max->order)? $max->order+1 : 0+1);
		$code = $value.'-'.complete_zero($total,3);
		$arr_data = array('code'=>$code, 'order'=>$total);

		return $arr_data;
	}

	public function opt_gudang()
    {
        $sql = "SELECT * FROM atombizz_rack";
        $res = $this->db->query($sql);

        if($res->num_rows() > 0) {
            $hasil[''] = "Pilih Gudang";
            foreach($res->result_array() as $val) {
                $hasil[trim($val['kode'])] = trim($val['nama']);
            }
        } else {
            $hasil[''] = "Tidak Ada Data";
        }

        return $hasil;
    }

    public function _opt_produk()
    {
        $sql = "SELECT * FROM atombizz_product";
        $res = $this->db->query($sql);

        if($res->num_rows() > 0) {
            $hasil[''] = "Pilih Bahan";
            foreach($res->result_array() as $val) {
                $hasil[trim($val['code'])] = $val['code']." - ".$val['name'];
            }
        } else {
            $hasil[''] = "Tidak Ada Data";
        }

        return $hasil;
    }

    public function opt_satuan()
    {
        $sql = "SELECT DISTINCT kategori FROM atombizz_converter";
        $query = $this->db->query($sql);
        return $query;
    }

    public function ambil_data_produk($param='')
    {
        $where = array('id'=>$param['id']);
        $query = $this->find('atombizz_product',$where);
        $data = $query->row();
        return $data;
    }

	public function ambil_data($param='')
	{
		$where = array('id'=>$param['id']);
		$query = $this->find('atombizz_product',$where);
		$data = $query->row();
		return $data;
	}

	public function get_data($param='')
    {
        $where = array('code'=>$param['code']);
        $query = $this->find('view_products',$where);
        if ($query==NULL) {
            $data = 'nope';
        } else {
            $data = $query->row();
        }
        return $data;
    }

	public function count_data()
	{
		$total = $this->total('atombizz_product',array('type'=>'reguler'));
		return $total;
	}

    public function stat_satuan($value='')
    {
        $sql = "SELECT * FROM atombizz_converter WHERE kategori = ? AND acuan = 1 LIMIT 1";
        $query = $this->db->query($sql,$value);
        if($query->num_rows() > 0){
            $data = $query->row();
        } else {
            $data = false;
        }
        return $data;
    }
}

/* End of file mdl_produk.php */
/* Location: ./application/modules/master/models/mdl_produk.php */