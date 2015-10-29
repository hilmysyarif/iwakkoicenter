<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_grafik extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->module='laporan';
        $this->cname=$this->module.'/lap_grafik';
        $this->load->model('mdl_view_selling','vsdb');
	}

	// halaman menu untuk data grafik top produk
    public function load_top_produk(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Top Produk';
        $data['content'] = $this->load->view('/grafik_top_produk',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data grafik low produk
    public function load_low_produk(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Low Produk';
        $data['content'] = $this->load->view('/grafik_low_produk',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data grafik omset
    public function load_omset(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Omset';
        $data['content'] = $this->load->view('/grafik_omset',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data grafik terapis
    public function load_pelanggan(){
        $data['sidebar_active']='laporan';
        $data['title']='Laporan - Apotek';
        $data['content'] = $this->load->view('/grafik_top_terapis',$data,TRUE);
        $this->load->view('template',$data);
    }

    //menampilkan grafik top produk
    public function grafik_top_produk(){
        $this->load->library('highcharts');
        $param = $this->input->post();
        // print_r($param);exit;
        $top = $this->vsdb->get_top_produk($param);
        $count = $this->vsdb->count_selling($param);
        // print_r($count);exit;
        if($count!=0){
        foreach ($top as $key => $value) {
            $output[] = (object)array(
                // 'bulan'=> $bulan,
                'produk'=>$value->name,
                'jumlah'=>$value->top,
            );
        }
            // print_r($output);exit;

        $dat2['x_labels']   = 'produk'; // optionnal, set axis categories from result row
        $dat2['series']     = array('qty'=>'jumlah'); // set values to create series, values are result rows
        $dat2['data']       = $output;

        $this->highcharts
            ->set_type('column')
            ->set_title('Grafik Top Produk', 'Periode '.tanggalIndo($param['tgl_awal']).' s/d '.tanggalIndo($param['tgl_akhir'])) // set chart title: title, subtitle(optional)
            ->set_axis_titles('produk', 'quantity') // axis titles: x axis, y axis
            // ->initialize('shared_options')
            ->set_dimensions('', 400) // dimension: width, height
            ->from_result($dat2)
            ->add(); // second graph
        
        $data['charts'] = $this->highcharts->render();
        echo $data['charts'];
        }else{
            echo "<span>Tidak ada Data</span>";
        }
    }

    //menampilkan grafik low produk
    public function grafik_low_produk(){
        $this->load->library('highcharts');
        $param = $this->input->post();
        // print_r($param);exit;
        $low = $this->vsdb->get_low_produk($param);
        $count = $this->vsdb->count_selling($param);
        // print_r($count);exit;
        if($count!=0){
        foreach ($low as $key => $value) {
            $output[] = (object)array(
                // 'bulan'=> $bulan,
                'produk'=>$value->name,
                'jumlah'=>$value->top,
            );
        }
            // print_r($output);exit;

        $dat2['x_labels']   = 'produk'; // optionnal, set axis categories from result row
        $dat2['series']     = array('qty'=>'jumlah'); // set values to create series, values are result rows
        $dat2['data']       = $output;

        $this->highcharts
            ->set_type('column')
            ->set_title('Grafik Low Produk', 'Periode '.tanggalIndo($param['tgl_awal']).' s/d '.tanggalIndo($param['tgl_akhir'])) // set chart title: title, subtitle(optional)
            ->set_axis_titles('produk', 'quantity') // axis titles: x axis, y axis
            ->set_dimensions('', 400) // dimension: width, height
            ->from_result($dat2)
            ->add(); // second graph
        
        $data['charts'] = $this->highcharts->render();
        echo $data['charts'];
        }else{
            echo "<span>Tidak ada Data</span>";
        }
    }

    //menampilkan grafik omset
    public function grafik_omset(){
        $this->load->library('highcharts');
        $param = $this->input->post();
        // print_r($param);exit;
        $omset = $this->vsdb->get_omset($param);
        $count = $this->vsdb->count_selling($param);
        // echo $this->db->last_query();exit;
        $bulan ='';
        if($count!=0){
        foreach ($omset as $key => $value) {

            // if($value->bulan == 1){
            //     $bulan = 'Januari';
            // }else if($value->bulan == 2){
            //     $bulan = 'Februari';
            // }else if($value->bulan == 3){
            //     $bulan = 'Maret';
            // }else if($value->bulan == 4){
            //     $bulan = 'April';
            // }else if($value->bulan == 5){
            //     $bulan = 'Mei';
            // }else if($value->bulan == 6){
            //     $bulan = 'Juni';
            // }else if($value->bulan == 7){
            //     $bulan = 'Juli';
            // }else if($value->bulan == 8){
            //     $bulan = 'Agustus';
            // }else if($value->bulan == 9){
            //     $bulan = 'September';
            // }else if($value->bulan == 10){
            //     $bulan = 'Oktober';
            // }else if($value->bulan == 11){
            //     $bulan = 'November';
            // }else if($value->bulan == 12){
            //     $bulan = 'Desember';
            // }
            $output[] = (object)array(
                'tanggal'=>tanggalIndo($value->date),
                'omset'=>$value->grand_total,
            );
        }
            // print_r($output);exit;

        $dat2['x_labels']   = 'tanggal'; // optionnal, set axis categories from result row
        $dat2['series']     = array('omset'=>'omset'); // set values to create series, values are result rows
        $dat2['data']       = $output ;

        $this->highcharts
            ->set_type('line')
            ->set_title('Grafik Omset', 'Periode '.tanggalIndo($param['tgl_awal']).' s/d '.tanggalIndo($param['tgl_akhir'])) // set chart title: title, subtitle(optional)
            ->set_axis_titles('tanggal', 'omset') // axis titles: x axis, y axis
            ->set_dimensions('', 400) // dimension: width, height
            ->from_result($dat2)
            ->add(); // second graph
        
        $data['charts'] = $this->highcharts->render();
        echo $data['charts'];
        }else{
            echo "<span>Tidak ada Data</span>";
        }
    }

    //menampilkan grafik terapis
    public function grafik_top_terapis(){
        $this->load->library('highcharts');
        $param = $this->input->post();
        // print_r($param);exit;
        $terapis = $this->vsdb->get_top_terapis($param);
        $count = $terapis->num_rows();
        // print_r($terapis);exit;
        $bulan ='';
        if($count>0){
            foreach ($terapis->result() as $key => $value) {
                $output[] = (object)array(
                    'nama'=>$value->nama,
                    'jumlah'=>$value->top,
                );
            }
                // print_r($output);exit;

            $dat2['x_labels']   = 'nama'; // optionnal, set axis categories from result row
            $dat2['series']     = array('jumlah'=>'jumlah'); // set values to create series, values are result rows
            $dat2['data']       = $output;

            $this->highcharts
                ->set_type('column')
                ->set_title('Grafik Top Pelanggan', 'Periode '.tanggalIndo($param['tgl_awal']).' s/d '.tanggalIndo($param['tgl_akhir'])) // set chart title: title, subtitle(optional)
                ->set_axis_titles('pelanggan', 'total pembelanjaan') // axis titles: x axis, y axis
                ->set_dimensions('', 400) // dimension: width, height
                ->from_result($dat2)
                ->add(); // second graph
            
            $data['charts'] = $this->highcharts->render();
            echo $data['charts'];
        }else{
            echo "<span>Tidak ada Data</span>";
        }
    }
}

/* End of file lap_grafik.php */
/* Location: ./application/modules/laporan/controllers/lap_grafik.php */