<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {

	public function pembelian(){	
		$this->datatables->select('id,kode_perkuliahan,dosen_id,kode_kelas,kode_tarif')
		// ->edit_column('name', space_data('$1,$2'),'name,space')
		// ->unset_column('space')
		->add_column('Actions', get_detail_edit_delete('$1'),'id')
        ->from('perkuliahan');

        echo $this->datatables->generate();
	}
}