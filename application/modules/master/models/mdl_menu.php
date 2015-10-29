<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_menu extends MY_Model {

	public function count_data()
	{
		$sql = "SELECT COUNT(id) as jml FROM menu";
    	$res = $this->db->query($sql);
    	$res = $res->row();
    	$total = $res->jml;

		return $total;
	}

	public function get_satuan($value='')
	{
		$this->db->where('code',$value);
		$result = $this->db->get('atombizz_product');
		$product = $result->row();

		$this->db->where('kategori',$product->unit);
		$this->db->where('acuan',1);
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

	public function cek_kode($kode='')
	{
		$this->db->where('code',$kode);
		$this->db->select('*, id as id_menu');
		$result = $this->db->get('menu');
		return $result->row();
	}

	public function list_bahan($value='')
	{
		$this->db->select('atombizz_blended_product.id,atombizz_product.code,atombizz_product.name,atombizz_blended_product.category_bahan,atombizz_blended_product.qty_product,atombizz_converter.nama,atombizz_product.cost');
		$this->db->join('atombizz_product','atombizz_blended_product.barcode_product=atombizz_product.code','left');
		$this->db->join('menu','atombizz_blended_product.barcode_blended=menu.code','left');
		$this->db->join('kategori-menu','menu.kategori=kategori-menu.id','left');
		$this->db->join('atombizz_converter','atombizz_blended_product.id_satuan=atombizz_converter.id','left');
		$this->db->where('atombizz_blended_product.barcode_blended',$value['menu']);
		$query = $this->db->get('atombizz_blended_product');
		$list = ''; $no = 1; $hpp = 0;
		if($query->num_rows() > 0){
			foreach ($query->result() as $key => $value) {
				$hpp += $value->cost*$value->qty_product;
				$aksi = ($value->category_bahan == 'material') ? 'actEdit' : 'actMixEdit';
				$list .= '
				<tr>
                    <td align="center" width="50px">'.$no.'</td>
                    <td align="left" width="">'.$value->name.'</td>
                    <td align="center" width="150px">'.$value->category_bahan.'</td>
                    <td align="center" width="150px">'.$value->qty_product.'</td>
                    <td align="center" width="150px">'.$value->nama.'</td>
                    <td align="center" width="175px">
                    	<button onclick="'.$aksi.'(this.id)" id="'.$value->id.'" class="btn btn-sm green"><i class="icon-pencil"></i> Edit</button>
                    </td>
                </tr>
				';
				$no++;
			}
		} else {
			$hpp = 0;
			$list = '<tr><td colspan="6">Tidak ada data.</td></tr>';
		}

		$data['list'] = $list;
		$data['hpp'] = $hpp;

		return $data;
	}

	// function get_hpp($code)
	// {
	// 	$sql = "SELECT * FROM atombizz_product WHERE `code`= ?";
	// 	$data = $this->db->query($sql,array($code));
	// 	foreach ($data->result_array() as $das) {
	// 	}
	// 	return (isset($das)) ? $das['cost'] : 0 ;
	// }

	public function list_mix($value='')
	{
		$this->db->select('atombizz_mix_product.id,atombizz_product.name,atombizz_mix_product.qty_product,atombizz_converter.nama');
		$this->db->join('atombizz_converter', 'atombizz_converter.id = atombizz_mix_product.id_satuan', 'left');
		$this->db->join('atombizz_product', 'atombizz_product.code = atombizz_mix_product.barcode_product', 'left');
		$this->db->where('atombizz_mix_product.barcode_blended', $value['menu']);
		$query = $this->db->get('atombizz_mix_product');
		if($query->num_rows() > 0){
			$list = ''; $no = 1;
			foreach ($query->result() as $key => $value) {
				$list .= '
				<tr>
                    <td align="center" width="50px">'.$no.'</td>
                    <td align="left" width="">'.$value->name.'</td>
                    <td align="center" width="150px">'.$value->qty_product.'</td>
                    <td align="center" width="150px">'.$value->nama.'</td>
                    <td align="center" width="175px">
                    	<button onclick="actListEdit(this.id)" id="'.$value->id.'" class="btn btn-sm green"><i class="icon-pencil"></i> Edit</button>
                    	<button onclick="actListDel(this.id)" id="'.$value->id.'" class="btn btn-sm red"><i class="icon-close"></i> Delete</button>
                    </td>
                </tr>
				';
				$no++;
			}
			return $list;
		} else {
			return $lift = '<tr><td colspan="5">Tidak ada data.</td></tr>';
		}
	}

	public function detail_bahan($value='')
	{
		$this->db->select('atombizz_blended_product.*, atombizz_product.name');
		$this->db->where('atombizz_blended_product.id',$value);
		$this->db->join('atombizz_product', 'atombizz_blended_product.barcode_product = atombizz_product.code', 'left');
		$query = $this->db->get('atombizz_blended_product');
		$result = $query->row();
		return $result;
	}

	public function get_mix_bahan($value='')
	{
		$sql = "SELECT * FROM atombizz_product WHERE type = 'blended' AND (name = ".$this->protect($value['key'])." OR code = ".$this->protect($value['key']).")";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			$data = $query->row();
		} else {
			$data = false;
		}
		return $data;
	}

}

/* End of file mdl_menu.php */
/* Location: ./application/modules/master/models/mdl_menu.php */