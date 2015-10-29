<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_input extends MY_Model {

	public function opt_product()
    {
        $sql = "SELECT * FROM atombizz_product";
        $res = $this->db->query($sql);

        if($res->num_rows() > 0) {
            $hasil[''] = "Pilih Produk";
            foreach($res->result_array() as $val) {
                $hasil[trim($val['code'])] = trim($val['name']);
            }
        } else {
            $hasil[''] = "Tidak Ada Data";
        }

        return $hasil;
    }

    public function get_detail_product($code)
    {
    	$sql = "SELECT * FROM view_products WHERE code = '$code'";
    	$res = $this->db->query($sql);
    	if($res->num_rows() > 0){
    		$hasil = $res->result_array();
    	} else {
    		$hasil = 'nope';
    	}
    	return $hasil[0];
    }

}

/* End of file mdl_pembelian.php */
/* Location: ./application/modules/stok_bahan/models/mdl_pembelian.php */