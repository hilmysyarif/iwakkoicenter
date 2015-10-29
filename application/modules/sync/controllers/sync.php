<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sync extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->module = 'sync';
		$this->load->model('Mdl_sync','ms');
	}

	public function index()
	{
		
	}

	public function get()
	{
		$query = "first";
		$dept = $this->config->item('astro');
		$table = $this->input->get('table');
		if (!empty($table)) {
			$data = $this->ms->get_where($table);
		} else {
			$data = $this->ms->get();
		}
		$sql = "INSERT INTO `temp_sync` (`table`,`insert_id`,`pk`,`query`,`action`,`date`,`time`,`sync`, `cabang`) VALUES ";
		foreach ($data as $key => $value) {
			if ($value->query != $query) {
				$sql .= "('".$value->table."',".$value->insert_id.",'".$value->pk."',\"".$value->query."\",'".$value->action."','".$value->date."','".$value->time."','".$value->sync."','".$dept['bas_branch_code']."'),";
				$query = $value->query;
			}
		}
		$sql = rtrim($sql, ',');
		echo $sql;
	}

	public function success()
	{
		$table = $this->input->get('table');
		if (!empty($table)) {
			$data = $this->ms->success_where($table);
		} else {
			$data = $this->ms->success();
		}
	}

}