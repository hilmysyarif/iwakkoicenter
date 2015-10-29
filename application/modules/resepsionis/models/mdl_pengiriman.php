<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pengiriman extends MY_Model {

	public function get_selling($param='')
    {
        $sql = "SELECT * FROM view_pengiriman WHERE invoice_no = ?";
        $query = $this->db->query($sql,$param);
        return $query->row();
    }

    public function get_selling_items($param='')
    {
        $sql = "SELECT * FROM atombizz_selling_items WHERE invoice = ?";
        $query = $this->db->query($sql,$param);
        return $query->result();
    }

    public function get_surat($param='')
    {
    	$sql = "SELECT * FROM view_pengiriman WHERE id = ? ";
    	$query = $this->db->query($sql,$param);
        if($query->num_rows() > 0){
        	$data = $query->row();
        	$kode = paramEncrypt($data->invoice_no);
        	return $kode;
        } else {
        	return FALSE;
        }
    }

}

/* End of file mdl_pengiriman.php */
/* Location: ./application/modules/resepsionis/models/mdl_pengiriman.php */