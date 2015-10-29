<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_data extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->module='laporan';
        $this->cname=$this->module.'/lap_data';
        $this->load->model('mdl_mutasi','mdb');
        $this->load->model('mdl_pembelian','pdb');
        $this->load->model('mdl_penjualan','jdb');
        $this->load->model('mdl_kasir','kdb');
        $this->load->model('mdl_keuangan','kudb');
        $this->load->model('mdl_view_selling','visdb');
	}

    public function index($value='')
    {
        redirect($this->module.'/data');
    }

    public function menu_stok($value='')
    {
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        // $data['karyawan']=$this->kdb->get_karyawan();
        $data['content'] = $this->load->view('/menu_stok',$data,TRUE);
        $this->load->view('template',$data);
    }

	// halaman menu untuk data pdf gaji
    public function load_gaji(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['karyawan']=$this->kdb->get_karyawan();
        $data['content'] = $this->load->view('/data_gaji',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf transaksi
    public function load_transaksi(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['operator'] = $this->kudb->getOperator();
        $data['content'] = $this->load->view('/data_transaksi',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf transaksi
    public function load_keuangan(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['content'] = $this->load->view('/data_keuangan',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf pembelian
    public function load_pembelian(){
        $data['produk'] = $this->pdb->getProduk();
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['content'] = $this->load->view('/data_pembelian',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf stok
    public function load_stok(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['rak'] = $this->visdb->get_rak();
        $data['content'] = $this->load->view('/data_stok',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_paramedik(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['cust_name'] = $this->visdb->get_param_name();
        $data['content'] = $this->load->view('/data_paramedik',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_hutang(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['supplier'] = $this->visdb->get_supp();
        $data['content'] = $this->load->view('/data_hutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_piutang(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['supplier'] = $this->visdb->get_paramedik();
        $data['content'] = $this->load->view('/data_piutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf omset
    public function load_omset(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        // $data['operator'] = $this->kdb->getOperator();
        $data['content'] = $this->load->view('/data_omset',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf perawatan
    public function load_perawatan(){
        $data['customer'] = $this->mlp->get_customer();
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['content'] = $this->load->view('/data_perawatan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_barang(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['produk'] = $this->mdb->getProduct();
        $data['content'] = $this->load->view('/data_barang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_penjualan(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        // $data['gudang'] = $this->jdb->getGudang();
        $data['content'] = $this->load->view('/data_penjualan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_compliment(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        // $data['gudang'] = $this->jdb->getGudang();
        $data['content'] = $this->load->view('/data_compliment',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_debet(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['content'] = $this->load->view('/data_debet',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_rl(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['content'] = $this->load->view('/data_rl',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function load_retur(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Resto';
        $data['content'] = $this->load->view('/data_retur',$data,TRUE);
        $this->load->view('template',$data);
    }

    //mengeprint pdf gaji karyawan
    public function table_gaji(){
        $param = $this->input->post();
        $data = $this->mlp->get_daftar_gaji($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td width="100px">'.bulanIndo($value->bulan).'</td>
                <td width="100px">'.$value->tahun.'</td>
                <td>'.$value->employee_code.'</td>
                <td>'.$value->employee_name.'</td>
                <td width="125px">'.format_rupiah($value->penerimaan).'</td>
                <td width="125px">'.format_rupiah($value->potongan).'</td>
                <td width="125px">'.format_rupiah($value->total).'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="8">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_gaji()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->mlp->get_daftar_gaji($param);
        $data['param'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        $this->load->view('/print_gaji',$data);
    }

    public function table_kas(){
        $param = $this->input->post();
        $data = $this->kudb->getDataKas($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            // $selisih = $value->total_cash - $value->end_cash;
            // $var_selisih = ($selisih < 0) ? '('.format_rupiah(abs($selisih)).')' : format_rupiah(abs($selisih));
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.tanggalIndo($value->tanggal).'</td>
                <td>'.$value->no_referensi.'</td>
                <td>'.format_rupiah($value->debit).'</td>
                <td>'.format_rupiah($value->kredit).'</td>
                <td>'.$value->keterangan.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_kas()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->kudb->getDataKas($param);
        $data['param'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_kas',$data);
    }

    public function table_keuangan(){
        $param = $this->input->post();
        $data = $this->kudb->getDataKeuangan($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            // $selisih = $value->total_cash - $value->end_cash;
            // $var_selisih = ($selisih < 0) ? '('.format_rupiah(abs($selisih)).')' : format_rupiah(abs($selisih));
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.tanggalIndo($value->tanggal).'</td>
                <td>'.$value->no_referensi.'</td>
                <td>'.format_rupiah($value->debit).'</td>
                <td>'.format_rupiah($value->kredit).'</td>
                <td>'.$value->keterangan.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_keuangan()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->kudb->getDataKeuangan($param);
        $data['param'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_keuangan',$data);
    }

    public function table_barang(){
        $param = $this->input->post();
        // print_r($param);exit;
        $data = $this->mdb->getDataBarang($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            // $selisih = $value->total_cash - $value->end_cash;
            // $var_selisih = ($selisih < 0) ? '('.format_rupiah(abs($selisih)).')' : format_rupiah(abs($selisih));
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.$value->product_code.'</td>
                <td>'.$value->product_name.'</td>
                <td>'.$value->date.'</td>
                <td>'.$value->description.'</td>
                <td>'.$value->quantity.'</td>
                <td>'.$value->operator.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_barang()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->mdb->getDataBarang($param);
        $data['setup'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_barang',$data);
    }

    public function table_penjualan(){
        $param = $this->input->post();
        $data = $this->jdb->getDataPenjualan($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            // $selisih = $value->total_cash - $value->end_cash;
            // $var_selisih = ($selisih < 0) ? '('.format_rupiah(abs($selisih)).')' : format_rupiah(abs($selisih));
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.$value->code.'</td>
                <td>'.$value->name.'</td>
                <td>'.$value->qty.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_penjualan()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->jdb->getDataPenjualan($param);
        $data['setup'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_penjualan',$data);
    }

    public function table_debet(){
        $param = $this->input->post();
        $data = $this->jdb->getDataDebet($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            if ($value->claimed == 'no') {
                $claimed = '<span class="label label-sm label-danger">Unclaimed</span>';
            } else {
                $claimed = '<span class="label label-sm label-success">Claimed</span>';
            }
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.$value->bank.'</td>
                <td style="text-align:right;">'.format_rupiah($value->jumlah).'</td>
                <td>'.$claimed.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_debet()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->jdb->getDataDebet($param);
        $data['setup'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_debet',$data);
    }

    public function table_rl(){
        $param = $this->input->post();

        $where = "code IN ('200000','300000','600000','700000','800000')";
        $data = $this->kudb->find('atombizz_accounting_master_akun', $where, $field = NULL, $limit = NULL, 'code', $join = FALSE, $like = FALSE);
        $table = ''; $no = 1;
        foreach ($data->result() as $key => $value) {
            $table .= '
            <tr>
                <td>'.$no.'</td>
                <td colspan="2"><strong>'.$value->name.'</strong></td>
                <td></td>
            </tr>
            ';

            $where_list = array('parent'=>$value->code);
            $list = $this->kudb->find('atombizz_accounting_master_akun', $where_list, $field = NULL, $limit = NULL, 'code', $join = FALSE, $like = FALSE);
            $total = 0;
            foreach ($list->result() as $kunci => $isi) {
                $param['kode'] = $isi->code;
                $subtotal = abs($this->kudb->getValueAkun($param));
                if($subtotal > 0){
                    $total += $subtotal;
                    $table .= '
                    <tr>
                        <td></td>
                        <td colspan="2">'.$isi->name.'</td>
                        <td align="right">'.format_rupiah($subtotal).'</td>
                    </tr>
                    ';
                }
            }
            $nominal[] = $total;
            $table .= '
            <tr>
                <td colspan="3" class="text-center"><strong> TOTAL '.strtoupper($value->name).'</strong></td>
                <td align="right">'.format_rupiah($total).'</td>
            </tr>
            ';

            $no++;
        }

        $laba = ($nominal[0]-$nominal[1])-($nominal[2]+$nominal[3]+$nominal[4]);

        $table .= '
        <tr>
            <td colspan="3" class="text-center"><strong>LABA/RUGI BERSIH</strong></td>
            <td align="right">'.format_rupiah($laba).'</td>
        </tr>
        ';

        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_rl()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        $data['param'] = $param;
        $data['config'] = $this->config->item('astro');

        $this->load->view('/print_rl',$data);
    }

    //bagian stock
    //filter no ruang
    public function no_ruang(){
        $param = $this->input->post();
        $no_ruang = $this->visdb->no_ruang($param);
        $opt = '<option value="">Semua</option>';
        // $opt .= '<option value="all">Semua</option>';
        foreach ($no_ruang as $key => $value) {
            $opt .= "<option value=".$value->room_number.">".$value->room_number."</option>";
        }
        echo $opt;
    }

    // filter nama produk
    public function produk(){
        $param = $this->input->post('rak');
        // print_r($param);exit;
        $opt = '<option value="">Semua</option>';
        $produk = $this->visdb->produk($param);
        foreach ($produk as $key => $value) {
            // $opt = '<option value="">Semua</option>';
            $opt .= "<option value=".$value->product_code.">".$value->product_name."</option>";
        }
        echo $opt;
    }

    //menampilkan table stock
    public function table_stock(){
        $param = $this->input->post();
        $data = $this->visdb->data_stock($param);
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px">'.$i.'</td>
                <td width="100px">'.$value->product_code.'</td>
                <td width="100px">'.$value->product_name.'</td>
                <td width="150px">'.$value->rak_name.'</td>
                <td width="150px">'.$value->saldo.'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }

    public function table_hutang(){
        $param = $this->input->post('sup');
        $data = $this->visdb->data_hutang($param);
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px">'.$i.'</td>
                <td width="100px">'.$value->person.'</td>
                <td width="100px">'.$value->name.'</td>
                <td width="150px">'.format_rupiah($value->saldo).'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }

    public function table_piutang(){
        $param = $this->input->post('sup');
        $data = $this->visdb->data_piutang($param);
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px">'.$i.'</td>
                <td width="100px">'.$value->person.'</td>
                <td width="100px">'.$value->name.'</td>
                <td width="100px">'.tanggalIndo($value->jatuh_tempo).'</td>
                <td width="150px">'.format_rupiah($value->saldo).'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }

    public function pdf_setock(){
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        $data['stock'] = $this->visdb->data_stock($param);
        $data['config'] = $this->config->item('astro');
        $data['setup'] = $param;
        $this->load->view('/print_setok',$data);
    }

    public function pdf_hutang(){
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post('sup');
        $data['stock'] = $this->visdb->data_hutang($param);
        $data['config'] = $this->config->item('astro');
        $data['setup'] = $param;
        $this->load->view('/print_hutang',$data);
    }
    public function pdf_piutang(){
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post('sup');
        $data['stock'] = $this->visdb->data_piutang($param);
        $data['config'] = $this->config->item('astro');
        $data['setup'] = $param;
        $this->load->view('/print_piutang',$data);
    }

    public function pdf_stock(){
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        $data['stock'] = $this->visdb->data_stock($param);
        $data['config'] = $this->config->item('astro');
        $data['setup'] = $param;
        $this->load->view('/print_stock',$data);
    }

    public function pdf_paramedik(){
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        $data['param'] = $this->visdb->get_data_param($param);
        $data['config'] = $this->config->item('astro');
        $data['setup'] = $param;
        $this->load->view('/print_paramedik',$data);
    }

    //untuk omset
    //menampilkan table omset
    public function table_omset(){
        $param = $this->input->post();
        // print_r($param);exit;
        $data = $this->kdb->getDataOmset($param);
        // print_r($data);exit;
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td width="125px">'.tanggalIndo($value->tgl).'</td>
                <td width="125px">'.$value->total_transaksi.'</td>
                <td width="125px">'.format_rupiah($value->grand_total).'</td>
            </tr>
            ';
            $i++;
        }
        echo $table;
    }

    public function table_param(){
        $param = $this->input->post();
        // print_r($param);exit;
        $data = $this->visdb->get_data_param($param);
        // print_r($data);exit;
        $table = ''; $i=1;$total='';
        foreach ($data as $key => $value) {
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td width="125px">'.$value->invoice_no.'</td>
                <td width="125px">'.tanggalIndo($value->date).'</td>
                <td width="125px">'.format_rupiah($value->total).'</td>
            </tr>
            ';
            $i++;
            $total += $value->total;
        }
            $table .= '<tr>
                            <td width="50px" colspan=3>
                                Total
                            </td>
                            <td width="125px" id="total">
                            '.format_rupiah($total).'
                            </td>
                        </tr>';
        echo $table.'|'.$total;
    }

    public function pdf_omset()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $data['omset'] = $this->kdb->getDataOmset($param);
        $data['setup'] = $param;
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_omset',$data);
    }

    public function table_pembelian(){
        $param = $this->input->post();
        $data = $this->pdb->getDataPembelian($param);
        if($data->num_rows() > 0){
            $table = ''; $i=1; $total = 0;
            foreach ($data->result() as $key => $value) {
                $table .= '
                <tr>
                    <td align="center" width="50px">'.$i.'</td>
                    <td>'.$value->reference_no.'</td>
                    <td align="center">'.tanggalIndo($value->date).'</td>
                    <td>'.$value->supplier_name.'</td>
                    <td>'.$value->product_name.'</td>
                    <td>'.$value->quantity.'</td>
                    <td align="right">'.format_rupiah($value->unit_price).'</td>
                    <td align="right">'.format_rupiah($value->gross_total).'</td>
                </tr>
                ';
                $total += $value->gross_total;
                $i++;
            }
            $table .= '
            <tr>
                <td colspan="7" align="center">T O T A L</td>
                <td align="right">'.format_rupiah($total).'</td>
            </tr>
            ';
        } else {
            $table = '
                <tr>
                    <td colspan="8">Tidak Ada Data</td>
                </tr>
            ';
        }

        
        echo $table;
    }

    public function pdf_pembelian()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->pdb->getDataPembelian($param);
        $data['setup'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_pembelian',$data);
    }

    public function table_perawatan(){
        $param = $this->input->post();
        $data = $this->mlp->get_daftar_perawatan($param);
        $table = ''; $i = 1;
        foreach ($data as $key => $value) {
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.tanggalIndo($value->date).'</td>
                <td>'.$value->selling_code.'</td>
                <td>'.$value->therapist_name.'</td>
            </tr>
            ';
            $i++;
        }
        echo $table;
    }

    public function pdf_perawatan()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $data['perawatan'] = $this->mlp->get_daftar_perawatan($param);
        $data['setup'] = $param;
        $data['config'] = $this->config->item('astro');

        // print_r($data['perawatan']);exit;

        $this->load->view('/print_perawatan',$data);
    }

    public function get_reference_purchase($value='')
    {
        $param = $this->input->post();
        $data = $this->mlp->get_reference_purchase($param);
        echo $data;
    }
    //menampilkan table stock
    public function table_retur(){
        $param = $this->input->post();
        $data = $this->mdb->getDataRetur($param);
        $table = ''; $i=1;
        foreach ($data->result() as $key => $value) {
            $table .= '<tr>
                <td width="50px">'.$i.'</td>
                <td>'.$value->tgl.'</td>
                <td>'.$value->referensi.'</td>
                <td>'.$value->code_produk.'</td>
                <td>'.$value->code_name.'</td>
                <td>'.$value->qty.'</td>
                <td>'.format_rupiah($value->price).'</td>
                <td>'.format_rupiah($value->tot).'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }

    public function pdf_retur(){
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        $data['retur'] = $this->mdb->getDataRetur($param);
        $data['config'] = $this->config->item('astro');
        $data['setup'] = $param;
        $this->load->view('/print_stock',$data);
    }

    public function table_compliment(){
        $param = $this->input->post();
        $data = $this->jdb->getDataCompliment($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            // $selisih = $value->total_cash - $value->end_cash;
            // $var_selisih = ($selisih < 0) ? '('.format_rupiah(abs($selisih)).')' : format_rupiah(abs($selisih));
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.$value->code.'</td>
                <td>'.$value->date.'</td>
                <td>'.$value->meja.'</td>
                <td style="text-align:right;">'.format_rupiah($value->jumlah).'</td>
                <td>'.$value->by.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

    public function pdf_compliment()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = $this->input->post();
        // $where = array('bulan'=>$param['bulan'],'tahun'=>$param['tahun']);
        $faktur = $this->jdb->getDataCompliment($param);
        $data['setup'] = $param;
        $data['data'] = $faktur->result();
        $data['config'] = $this->config->item('astro');

        // print_r($data['data']);exit;

        $this->load->view('/print_compliment',$data);
    }
}

/* End of file lap_data.php */
/* Location: ./application/modules/laporan/controllers/lap_data.php */