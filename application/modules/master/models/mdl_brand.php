<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_brand extends MY_Model {

	public function get_opt_bahan()
	{
		$this->db->where('type', 'reguler');
		$query = $this->db->get('atombizz_product');
		return $query;
	}

	public function get_opt_satuan($value='')
	{
		$this->db->where('kategori', 'satuan');
		$query = $this->db->get('atombizz_converter');
		return $query;
	}

	public function get_satuan($value='')
	{
		$this->db->where('code',$value);
		$result = $this->db->get('atombizz_product');
		$product = $result->row();

		$this->db->where('kategori',$product->unit);
		$query = $this->db->get('atombizz_converter');
		// echo $this->db->last_query();exit;
		if($query){
			$opt = '';
			foreach ($query->result() as $key => $value) {
				$opt .= '<option value="'.$value->id.'">'.$value->nama.'</option>';
			}
		} else {
			$opt = false;
		}
		return $opt;
	}

	public function detail_konversi($value='')
	{
		$this->db->where('id', $value['id']);
		$query = $this->db->get('atombizz_brand_converter');
		return $query->row();
	}

}

/* End of file mdl_brand.php */
/* Location: ./application/modules/master/models/mdl_brand.php */