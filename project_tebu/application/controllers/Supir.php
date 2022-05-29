<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_supir');
        $this->load->model('Data_model');
        $this->load->model('M_crud');
    }
   public function index()
    {
        
        // $data['pekerjaan'] =  $this->M_crud->getdata('tabel_pekerjaan');
        $this->load->view('templates/serverside/header');
        $this->load->view('serverside/supir');
       
    }
    
    
   public function getData()
    {
        $result = $this->M_supir->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->ongkos_sopir;
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_ongkos_sopir. "','edit'".')" ></i> Edit Data </> </a>  ' ; 
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_supir->count_all(),
            "recordsFiltered" => $this->M_supir->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function byid($id_ongkos_sopir){
        $data = $this->M_supir->getdataById($id_ongkos_sopir);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ubah_supir(){
        $data=[
            'id_ongkos_sopir'=> htmlspecialchars($this->input->post('id_ongkos_sopir')),
            'ongkos_sopir'=> htmlspecialchars($this->input->post('ongkos_sopir')),
        ];
     if ($this->M_crud->updatedata('ongkos_sopir',['id_ongkos_sopir'=> $this->input->post('id_ongkos_sopir')], $data)> 0){
     $message ['status']= 'success';
     
     }else{
         $message ['status']= 'failed';
     
     };
     $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

       }
    

