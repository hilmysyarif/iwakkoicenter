<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribusi extends ASTRO_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "gudang";
		$this->cname = $this->module.'/distribusi';

		$this->load->model('mdl_pos','mp');
		$this->load->model('mdl_checking','mc');
	}

	public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        
        
        $data['sidebar_active']='gudang';
        $data['title']='Menu - Distribusi';
        $data['content'] = $this->load->view('/pos',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function reguler()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
       
        $data['sidebar_active']='gudang';
        $data['title']='Menu - Distribusi';
        $data['content'] = $this->load->view('/pos_reguler',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function invoice()
    {
        $value = $this->input->get('invoice');
        $data['outlet']=$this->config->item('astro');
        $data['sidebar_active']='gudang';
        $data['title']='Menu - Distribusi';
        $data['content'] = $this->load->view('/invoice',$data);
    }

    public function daftar($value='')
    {
        
        $data['sidebar_active']='gudang';
        $data['title']='Resepsionis - Data Transaksi';
        $data['content'] = $this->load->view('/data_transaksi',$data,TRUE);
        $this->load->view('template',$data);
    }

	public function cashdraw_check()
	{
		$hasil = $this->mc->kas();
		echo $hasil;
	}

    public function ceksession_member()
    {
        $member = $this->session->userdata('membersession'); 
        // print_r($member);exit;
        if (is_array($member)) {
            $member = 'member';
        }else{
            $member = $member;
        }
        echo $member;
    }

    public function ceksession_paramedik()
    {
        $member = $this->session->userdata('membersession'); 
        // print_r($member);exit;
        if (is_array($member)) {
            $member = 'member';
        }else{
            $member = $member;
        }
        echo $member;
    }

	public function guest_check()
	{
		$param = $this->input->post();
		$hasil = $this->mc->tamu($param);
		echo $hasil;
	}

	public function temporary_check()
	{
		$param = $this->input->post();
		$hasil = $this->mc->temporary($param);
		echo $hasil;
	}

    public function get_suspend_data(){
        $param = $this->input->post();
        $hasil = $this->mp->temp_suspended($param);
        echo $hasil;
    }

    public function suspen_back(){
        $param = $this->input->get('invoice');
        $hasil = $this->mp->suspen_back($param);
        echo $hasil;
    }

    public function cancel_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->cancel_transaction($param);
        echo $hasil;
    }

    public function invoice_request()
    {
        $param = $this->input->post();
        $hasil = $this->mp->request_invoice($param);
        echo $hasil;
    }

    public function total_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->total_transaksi($param);
        echo $hasil;
    }

    public function cek_member_reguler()
    {
        $this->session->set_userdata('membersession', 'reguler');
    }

    public function cek_member()
    {
        $param = $this->input->post();
        $cek = $this->mc->cek_member($param);
        echo $cek;
    }

    public function get_code_member()
    {
        $data = $this->mp->get_code_member();
        $opt = '<option value="">Cari Member</option>';
        foreach ($data->result() as $das) {
            $opt .= '<option value="'.$das->code.'">'.$das->name.'</option>';
        }
        echo $opt;
    }

    public function get_produk_display()
    {
        $data = $this->mp->get_produk_display();
        $opt = '<option value="">Pilih Produk</option>';
        foreach ($data->result() as $das) {
            $opt .= '<option value="'.$das->product_code.'">'.$das->product_name.'</option>';
        }
        echo $opt;
    }

    public function get_satuan()
    {        
        $param = $this->input->post();
        $data = $this->mp->get_satuan($param['code']);
        $data = $data->result();
        $satuan = $data[0]->satuan;
        $satuan = json_decode($satuan);
        $i=0;
        $opt = '';
        foreach ($satuan as $das) {
            $opt .= '<option value="'.$i.'">'.$das.'</option>';
            $i++;
        }
        echo $opt;
    }

    public function cek_saldo_produk_display(){
        $param = $this->input->post();
        $qty = $param['qty'];
        $data = $this->mp->cek_stok_display($param['barcode']);
        if($qty<=$data->saldo){
            echo "ada";
        } else {
            echo "tidak cukup";
        }
    }

    public function get_produk_racik()
    {
        $data = $this->mp->get_produk_racik();
        $opt = '<option value="">Pilih Obat</option>';
        foreach ($data->result() as $das) {
            $opt .= '<option value="'.$das->product_code.'">'.$das->product_name.'</option>';
        }
        echo $opt;
    }

    public function cek_saldo_produk_racik(){
        $param = $this->input->post();
        $x = $param['qty'];
        $qty_satuan = $this->mp->cek_qty_satuan($param['barcode'],$param['satuan_id']);
        $qty = $qty_satuan*$x;
        $data = $this->mp->cek_stok_racik($param['barcode']);
        if($qty<=$data->saldo){
            echo "ada";
        } else {
            echo "tidak cukup";
        }
    }

    public function add_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->add_transaction($param);
        echo $hasil;
    }

    public function add_racik(){
        $param = $this->input->post();
        $hasil = $this->mp->add_racik($param);
        echo $hasil;
    }

    public function get_temp_data(){
        $param = $this->input->post();
        $hasil = $this->mp->temp_transaction($param);
        echo $hasil;
    }

    public function get_pelanggan()
    {
        $data = $this->mp->get_pelanggan();
        $opt = '<option value="">Pilih Pelanggan</option>';
        foreach ($data->result() as $das) {
            $opt .= '<option value="'.$das->id.'">'.$das->name.'</option>';
        }
        echo $opt;
    }

    public function nominal($value='')
    {
        $param = $this->input->post();
        $total = $param['total'] - ($param['total']*$param['discount']/100) + ($param['total']*$param['tax']/100);
        $kembalian = $param['bayar'] - $total;
        $hutang = $total - $param['bayar'];
        $param['total'] = $total;
        $param['kembalian'] = $kembalian;
        $param['nominal_kembalian'] = format_rupiah($kembalian);
        $param['hutang'] = $hutang;
        $param['nominal_hutang'] = format_rupiah($hutang);
        $param['nominal_bayar'] = format_rupiah($param['bayar']);
        $param['nominal_total'] = format_rupiah($total);
        echo json_encode($param);
    }

    public function view_detail_temp(){
        $param = $this->input->post();
        $hasil = $this->mp->view_detail_temp($param);
        echo $hasil;
    }

    public function edit_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->edit_transaction($param);
        echo $hasil;
    }

    public function insert_racik(){
        $param = $this->input->post();
        $hasil = $this->mp->insert_racik($param['invoice']);
        echo $hasil;
    }

    public function temp_count_check()
    {
        $param = $this->input->post();
        $hasil = $this->mp->temp_count_check($param);
        echo $hasil;
    }

    public function suspend_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->suspend_transaction($param);
        echo $hasil;
    }

    public function payment_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->payment_transaction($param);
        echo $hasil;
    }

    public function move_transaction(){
        $param = $this->input->post();
        $hasil = $this->mp->move_transaction($param);
        echo $hasil;
    }

    public function del_session(){
        $this->session->unset_userdata('membersession');
    }

    public function print_invoice()
    {
        // $id = $this->input->get('invoice');
        // $data['hasil'] = $this->Mdl_selling->print_invoice($id);
        // echo $this->load->view($this->module.'/invoice',$data);
        $astro = $this->config->item('astro');
        $param = $this->input->get();
        $hasil = $this->mp->print_invoice($param);
        
        /* text */  
         $printTestText =  "          ".$astro['pot_name']."        \n";
         $printTestText .= "      ".$astro['pot_city']."      \n";
        // $printTestText .= "      TOKO BASMALAH CAB. WONOREJO      \n";
         $printTestText .= "   ".$astro['pot_address']."/ ".$astro['pos_telp']."    \n";
         $printTestText .= "\n";
         $printTestText .= "Inv. ID : ".$hasil[0]->invoice."\n";
         $printTestText .= "Date    : ".date('d M Y H:i:s')."\n";
         $printTestText .= "Payment : ".$hasil[0]->status."\n";
         $printTestText .= "----------------------------------------\n";
         $printTestText .= "Item        Harga   Jml  Disc Subtotal\n";
         $printTestText .= "----------------------------------------\n";

         foreach ($hasil as $key => $value) {
            if ($value->racik == 'yes') {

            } else {
                $produk = explode(' ', $value->product_name);
            $nama_produk = "";
            $a = 0;
            if (count($produk) > 2) {
                for ($i=0; $i < count($produk)-1; $i++) { 
                    if ($i == 0) {
                        $nama_produk .= @$produk[$a]." ".@$produk[$a+1]."\n";
                    }else{
                        $nama_produk .= @$produk[$a+1]." ".@$produk[$a+2]."\n";
                    }
                    
                    $a++;
                }
                
            }else{
                $nama_produk = $value->product_name."\n";
            }
            $printTestText .= $nama_produk."          Rp.".$value->price.",-  ".$value->qty." ".$value->satuan."    ".$value->discount."%  Rp.".$value->discount_sub.",-\n";
            }
            
         }

         $printTestText .= "----------------------------------------\n";
         $printTestText .= "      Detail Pembayaran\n";
         $printTestText .= "      Total : Rp. ".$hasil[0]->total.",-\n";
         $printTestText .= "      Bayar : Rp. ".$hasil[0]->pay.",-\n";
         $printTestText .= "      Kembali: Rp. ".$hasil[0]->pay_back.",-\n";
         // $printTestText .= "    Harga sudah termasuk PPN 10%\n";
         $printTestText .= "----------------------------------------\n";
         $printTestText .= "               Terima Kasih             \n";
         $printTestText .= "        Barang yang sudah dibeli        \n";
         $printTestText .= "    Tidak dapat ditukar/dikembalikan    \n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";
         $printTestText .= "\n";

         
        // /* tulis dan buka koneksi ke printer */    
        // $printer = printer_open("SP-POS76II");  
        // /* write the text to the print job */ 
        // printer_set_option($handle, PRINTER_MODE, "RAW"); 
        // printer_write($printer, $printTestText);   
        // /* close the connection */ 
        // printer_close($printer); 
         $handle = printer_open('\\\ASTROBOY-1-PC\Canon_iP2700_series'); 
             printer_set_option($handle, PRINTER_MODE, "RAW");
             printer_write($handle, $printTestText); 
             printer_close($handle);
    }

    public function get_price()
    {
        $param = $this->input->post();
        $data = $this->mp->get_price($param);
        echo $data;
    }

    public function delete_temp1(){
        $param = $this->input->post();
        $hasil = $this->mp->delete_temp1($param);
        echo $hasil;
    }
    public function delete_temp(){
        $param = $this->input->post();
        $hasil = $this->mp->delete_temp($param);
        echo $hasil;
    }

}

/* End of file pos.php */
/* Location: ./application/modules/resepsionis/controllers/pos.php */