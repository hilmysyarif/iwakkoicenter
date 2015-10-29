<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_validasi extends MY_Model {

	function get_opt_pegawai()
	{
		$sql = "SELECT * FROM view_employee";
		$data = $this->db->query($sql);
		return $data;
	}

	function get_valid_cashdraw_data()
    {
        $sql = "SELECT * FROM view_selling_cashdraw
        		where status = 'closed' ";
        $hasil = $this->db->query($sql);
        $data = $hasil->result();
        $list = "";
        if ($data != null) {
            foreach ($data as $das => $value) {
                $selisih = $value->total_cash - $value->end_cash;
                $list .= '
                    <tr>
                        <td class="text-center">'.$value->cashdraw_no.'</td>
                        <td>'.date('d F Y',strtotime($value->date)).'</td>
                        <td>'.format_rupiah($value->start_cash).'</td>
                        <td>'.format_rupiah($value->omset).'</td>
                        <td>'.format_rupiah($value->total_cash).'</td>
                        <td>'.format_rupiah($value->end_cash).'</td>
                        <td>'.format_rupiah($selisih).'</td>
                        <td>'.$value->nama.'</td>
                        <td class="text-center">
                            <a onclick="validasi(this.id)" id="'.$value->cashdraw_no.'" data-toggle="modal" href = "#modal-add" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i> Validasi</a>
                        </td>
                    </tr>
                ';
            }
        }else{
            $list .= '
                <tr>
                    <td colspan="6">No data to view...</td>
                </tr>
            ';    
        }
        
        return $list;
    }

    function proses_validasi($param='')
    {
        $data = array(
           'status' => 'valid'
        );
        $this->db->where('cashdraw_no', $param['cashdraw_no']);
        $this->db->update('atombizz_selling_cashdraw', $data); 

        $hasil = $this->db->affected_rows();

        if ($hasil >= 0) {
            return "Kas kasir dengan nomor kas ".$param['cashdraw_no']." berhasil divalidasi";
        }else{
            return "Kas kasir dengan nomor kas ".$param['cashdraw_no']." gagal divalidasi";
        }
    }

    function get_list_cashdraw($param='')
    {
        $sql = "SELECT * FROM view_selling_cashdraw WHERE `date` = ? AND user_id = ?";
        $hasil = $this->db->query($sql, array($param['tgl_awal'], $param['pegawai']));
        $data = $hasil->result();
        $list = "";
        if ($data != null) {
            foreach ($data as $das => $value) {
                $selisih = $value->total_cash - $value->end_cash;
                $list .= '
                    <tr>
                        <td class="text-center">'.$value->cashdraw_no.'</td>
                        <td>'.format_rupiah($value->start_cash).'</td>
                        <td>'.format_rupiah($value->omset).'</td>
                        <td>'.format_rupiah($value->total_cash).'</td>
                        <td>'.format_rupiah($value->end_cash).'</td>
                        <td>'.format_rupiah($selisih).'</td>
                        <td>'.$value->nama.'</td>
                        <td>'.$value->status.'</td>
                        <td class="text-center">
                            <a onclick="print(this.id)" id="'.$value->id.'" data-toggle="modal" href = "#modal-note"  title="Print" class="btn btn-xs btn-default"><i class="icon-print"></i> Print</a>
                        </td>
                    </tr>
                ';
            }
        }else{
            $list .= '
                <tr>
                    <td colspan="6">No data to view...</td>
                </tr>
            ';    
        }
        
        return $list;
    }

    function get_area_desc($param='')
    {
    	$sql = "SELECT * FROM view_branch WHERE `code` = ?";
    	$data = $this->db->query($sql,$param);
    	$result = $data->result();
    	return $result;
    }

    function get_valid_opname_data()
    {
        // $basmalah = $this->config->item('astro');
        $sql = "SELECT * FROM view_opname WHERE ISNULL(approved_by) AND rule = 'confirm' ORDER by id ASC";
        $hasil = $this->db->query($sql);
        $data = $hasil->result();
        $list = "";
        if ($data != null) {
        	$i = 1;
            foreach ($data as $das => $value) {
                $list .= '
                    <tr>
                    	<td class="text-center">'.$i.'</td>
                        <td class="text-center">'.TanggalIndo($value->date).'</td>
                        <td class="text-center">'.$value->nama.'</td>
                        <td class="text-center">'.$value->reference.'</td>
                        <td class="text-center">
                            <a onclick="actDetail(this.id)" id="'.$value->reference.'" data-toggle="tooltip" title="Detail" class="btn btn-xs btn-primary"><i class="icon-search"></i> Detail Opname</a>
                        </td>
                    </tr>
                ';
                $i++;
            }
        }else{
            $list .= '
                <tr>
                    <td colspan="6">No data to view...</td>
                </tr>
            ';    
        }
        
        return $list;
    }

    public function validasi_transaksional($param='')
    {
        $sql = "SELECT * FROM view_transaksional WHERE id = ?";
        $query = $this->db->query($sql,$param['id']);
        if($query->num_rows() > 0){
            $data = $query->row();
        } else {
            $data = FALSE;
        }
        return $data;
    }

}

/* End of file mdl_validasi.php */
/* Location: ./application/modules/validasi/models/mdl_validasi.php */