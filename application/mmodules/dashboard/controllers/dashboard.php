<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->module = 'dashboard';
		$this->cname = 'dashboard';
        $this->load->model('mdl_grafik','mg');
	}

	public function index()
	{
		// $data['cname'] = $this->module;
		// $data['title'] = "Dashboard";
		// $this->load->view('/dashboard', $data);
		$data['config'] = $this->config->item('astro');
		$data['sidebar_active']='dashboard';
        $data['title']='Aplikasi Resto';
        $data['content'] = $this->load->view('/dashboard',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function grafik_top_produk(){
        $this->load->library('highcharts');
        $param['tgl_awal'] =  date('Y-m-01');
        $param['tgl_akhir'] =  date('Y-m-t');
        // print_r($param);exit;
        $top = $this->mg->get_top_produk($param);
        $count = $this->mg->count_selling();
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

    public function grafik_low_produk(){
        $this->load->library('highcharts');
        $param['tgl_awal'] =  date('Y-m-01');
        $param['tgl_akhir'] =  date('Y-m-t');
        // print_r($param);exit;
        $low = $this->mg->get_low_produk($param);
        $count = $this->mg->count_selling();
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
        
        $data['charts'] = $this->highcharts->render2();
        echo $data['charts'];
        }else{
            echo "<span>Tidak ada Data</span>";
        }
    }

    public function grafik_omset(){
        $this->load->library('highcharts');
        $param['tgl_awal'] =  date('Y-m-01');
        $param['tgl_akhir'] =  date('Y-m-t');
        // print_r($param);exit;
        $omset = $this->mg->get_omset($param);
        $count = $omset->num_rows();
        // echo $this->db->last_query();exit;
        $bulan ='';
        if($count>0){
        foreach ($omset->result() as $key => $value) {
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

}