<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mandor extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
        $this->load->database();
        $this->load->model('M_mandor');
        $this->load->model('Data_model');
        $this->load->model('M_crud');
    }
   public function index()
    {
        
        $data['mandor'] =  $this->M_crud->getdata('tabel_mandor');
        
        $this->load->view('templates/serverside/navbar');
        $this->load->view('serverside/mandor', $data);
        $this->load->view('templates/serverside/sidebar');
        $this->load->view('templates/serverside/footer');
        //  $this->load->view('templates/serverside/header');
        // $this->load->view('serverside/mandor', $data);
       
    }
    public function tambah_mandor(){
   
   
   $data=[
       'nama_mandor'=> htmlspecialchars($this->input->post('nama_mandor')),
   ];
if ($this->M_crud->insertdata('tabel_mandor', $data)> 0){
$message ['status']= 'success';

}else{
    $message ['status']= 'failed';

};

$this->output->set_content_type('application/json')->set_output(json_encode($message));
   
    }
    
   public function getData()
    {
        $result = $this->M_mandor->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_mandor;
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_mandor. "','edit'".')" ></i> Edit Data </> </a> 
            
            <a href="#"  <i class="btn btn-danger btn-sm" onclick="byid ('."'". $field->id_mandor. "','delete'".')" ></i> Hapus Data</> </a>' ; 
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_mandor->count_all(),
            "recordsFiltered" => $this->M_mandor->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function byid($id_mandor){
        $data = $this->M_mandor->getdataById($id_mandor);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ubah_mandor(){
        $data=[
            'id_mandor'=> htmlspecialchars($this->input->post('id_mandor')),
            'nama_mandor'=> htmlspecialchars($this->input->post('nama_mandor')),
        ];
     if ($this->M_crud->updatedata('tabel_mandor',['id_mandor'=> $this->input->post('id_mandor')], $data)> 0){
     $message ['status']= 'success';
     
     }else{
         $message ['status']= 'failed';
     
     };
     $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function delete_mandor($id_mandor){
        if ($this->M_crud->delete('tabel_mandor',['id_mandor'=>$id_mandor])> 0){
            $message ['status']= 'success';
            
            }else{
                $message ['status']= 'failed';
            
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }
    }
    

