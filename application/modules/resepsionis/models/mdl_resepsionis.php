<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_resepsionis extends MY_Model {

	public function get_room_category($value='')
	{
		$sql = "SELECT * FROM atombizz_room_category WHERE code != 'LAKI'";
		$query = $this->db->query($sql);
		$list = '<option value="">Pilih Filter Antrian</option>'; 
		foreach ($query->result() as $key => $value) {
			$list .= '
				<option value="'.$value->code.'">'.$value->name.'</option>
			';
		}
		$list_null = '<option>Tidak ada data.</option>';
		return (isset($value)) ? $list : $list_null;
	}

	public function get_list_antrian($value='')
	{
		$date = date('Y-m-d');
		if(!empty($value)){
			$cat = "AND category_room ='".$value."'";
		} else $cat = "";
		$sql = "SELECT * FROM view_antrian WHERE `date` = ? ".$cat;
		$query = $this->db->query($sql,$date);
		$list = ''; $i = 1;
		if($query->num_rows() >= 1){
			foreach ($query->result() as $key => $value) {
				$status = ($value->member == 'yes') ? 'Member' : 'Non Member';
				$list .= '
				<a href="#" class="list-group-item bg-'.$this->get_color($value->category_room).'" style="border-top:1px solid #eee !important">
                    <button id="room'.$i.'" data-id="'.$value->id.'" data-guest="'.$value->guest_code.'" data-cashdraw="'.$value->cashdraw_code.'" data-invoice="'.$value->invoice_code.'" data-category="'.$value->category_room.'" class="btn btn-xs red pull-right" onclick="actCheckin(this.id)">Check In</button>
                    <h4 class="list-group-item-heading">'.$value->guest_name.'</h4>
                    <p class="list-group-item-text">'.$status.'</p>
                </a>
				';
				$i++;
			}
		} else {
			$list = '
			<a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Tidak Ada Antrian</h4>
                <p class="list-group-item-text">Untuk saat ini data antrian tidak ada.</p>
            </a>
			';
		}
		return $list;
	}

	public function get_list_room()
	{
		$date = date('Y-m-d');
		$sql = "SELECT * FROM atombizz_room";
		$query = $this->db->query($sql);
		$list = ''; $i=1;
		foreach ($query->result() as $key => $value) {
			$sql2 = "SELECT * FROM view_tmp WHERE `date` = ? AND room_number = ?";
			$query2 = $this->db->query($sql2,array($date,$value->number));
			// echo $this->db->last_query();exit;
			$total = $query2->num_rows();

			$row = $query2->result();
			$var_value = json_decode($value->category_code);
			$color = $this->get_color($var_value[0]);
			$image = ($total >= 1) ? 'room' : 'room-open';
			$status = ($total >= 1) ? 'Terisi' : 'Kosong';
			$status_color = ($total >= 1) ? 'danger' : 'success';
			$uid = ($total >= 1) ? $row[0]->guest_code : '#';
			$button = ($total >= 1) ? '<button id="but'.$i.'" data-id="'.$row[0]->id.'" onclick="actCheckout(this.id)" class="btn btn-xs yellow pull-right">checkout</button>' : '';
			$list .= '
			<div class="col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a onclick="actRoom('.$uid.')" class="thumbnail bg-'.$color.'">
                            <img src="'.base_url('public').'/img/room/'.$image.'.png" alt="100%x180" style="height: 180px; width: 100%; display: block;">
                       </a>
                    </div>
                    <div class="panel-footer">
                    	<span class="label label-'.$status_color.'">'.$status.'</span> '.$value->number.'
                    	'.$button.'
                    </div>
               </div>
            </div>
			';
			$i++;
		}
		return $list;
	}

	public function get_color($value='')
	{
		$color = '';
		// $value = json_decode($value);
		// $count = count($value);
		if($value == 'LULUR'){
			$color = 'green';
		} else if($value == 'HAIRSPA'){
			$color = 'blue';
		} else if($value == 'FACIAL'){
			$color = 'yellow';
		} else {
			$color = 'purple';
		}
		return $color;
	}

	public function opt_room_tersedia($param='')
	{
		$date = date('Y-m-d');
		$sql = "SELECT * FROM view_tmp WHERE category_room = ? AND `date` = ? AND NOT ISNULL(room_number) AND room_number != ''";
		$query = $this->db->query($sql,array($param['category'],$date));
		$num = $query->num_rows();
		$opt = '<option value="">Pilih Ruangan</option>';

		if($num >= 1){
			$sql = "SELECT * FROM `atombizz_room` AS `room` WHERE `room`.`number` NOT IN (
					SELECT `tmp`.`room_number` FROM `view_tmp` AS `tmp` WHERE `tmp`.`category_room` = ? AND `tmp`.`date` = ? AND `tmp`.`room_number` != '' AND NOT ISNULL(`tmp`.`room_number`)) AND `room`.`category_code` LIKE ".$this->protectLike($param['category']);
			$query = $this->db->query($sql, array($param['category'],$date));
		} else {
			$sql = "SELECT * FROM atombizz_room WHERE category_code LIKE ".$this->protectLike($param['category']);
			$query = $this->db->query($sql);
		}
		// echo $this->db->last_query();exit;
		foreach ($query->result() as $key => $value) {
			$opt .= '
				<option value="'.$value->number.'">'.$value->number.'</option>
			';
		}
		
		return $opt;
	}

	public function checkout($param='')
	{
		$data = array('room_number'=>'','status'=>'checkout');
		$where = array('id'=>$param['id']);
		$update = $this->replace('atombizz_tmp_use_facilities',$data,$where);
		echo $this->db->last_query();exit;
		return $update;
	}

}

/* End of file mdl_resepsionis.php */
/* Location: ./application/modules/resepsionis/models/mdl_resepsionis.php */