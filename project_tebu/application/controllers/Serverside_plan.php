<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serverside_plan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
        $this->load->database();
        $this->load->model('M_serverside_plan');
        $this->load->model('M_crud');
    }
   public function index()
    {
        
         $this->load->view('templates/serverside/header');
        $this->load->view('serverside/serverside_plan');
        // $this->load->view('templates/auth_footer');
    }
    
   public function getData()
    {
        $result = $this->M_serverside_plan->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tanggal;
            $row[] = $field->nama_plan;
            $row[] = $field->nama_mandor; 
            $row[] = $field->nama_pekerjaan; 
            $row[] = $field->biaya_plan;
            $row[] = $field->biaya_ha;
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_riwayat. "','detail'".')" ></i> Detail Data </> </a> 
            
            <a href="#"  <i class="btn btn-danger btn-sm" onclick="byid ('."'". $field->id_plan. "',' $field->id_plan ','delete'".')" ></i> Hapus Data</> </a>' ;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_serverside_plan->count_all(),
            "recordsFiltered" => $this->M_serverside_plan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // function detail($id)
    // {
    //     $id = $this->input->get('id');
    //     $data = $this->M_crud->getjoinfilter('detail_penjualan', 'barang', 'detail_penjualan.kode_barang=barang.kode_barang', ['id_plan' => $id]);
    //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
    // }
    function byid($id_riwayat){
        $data = $this->M_serverside_plan->getjoinfilter(['id_riwayat' => $id_riwayat] );
     
     

        echo json_encode($data);
    
    }
    
}
