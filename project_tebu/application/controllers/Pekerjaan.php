<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_pekerjaan');
        $this->load->model('Data_model');
        $this->load->model('M_crud');
    }
   public function index()
    {
        
        $data['pekerjaan'] =  $this->M_crud->getdata('tabel_pekerjaan');
        $this->load->view('templates/serverside/navbar');
        $this->load->view('serverside/pekerjaan', $data);
        $this->load->view('templates/serverside/sidebar');
        $this->load->view('templates/serverside/footer');
        // $this->load->view('templates/serverside/header');
        // $this->load->view('serverside/pekerjaan', $data);
       
    }
    public function tambah_pekerjaan(){
   
   
   $data=[
       'nama_pekerjaan'=> htmlspecialchars($this->input->post('nama_pekerjaan')),
       'ongkos_pekerjaan'=> htmlspecialchars($this->input->post('ongkos_pekerjaan')),
   ];
if ($this->M_crud->insertdata('tabel_pekerjaan', $data)> 0){
$message ['status']= 'success';

}else{
    $message ['status']= 'failed';

};

$this->output->set_content_type('application/json')->set_output(json_encode($message));
   
   
    
    }
    
   public function getData()
    {
        $result = $this->M_pekerjaan->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_pekerjaan;
            $row[] = $field->ongkos_pekerjaan;
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_pekerjaan. "','edit'".')" ></i> Edit Data </> </a> 
            
            <a href="#"  <i class="btn btn-danger btn-sm" onclick="byid ('."'". $field->id_pekerjaan. "','delete'".')" ></i> Hapus Data</> </a>' ; 
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_pekerjaan->count_all(),
            "recordsFiltered" => $this->M_pekerjaan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function byid($id_pekerjaan){
        $data = $this->M_pekerjaan->getdataById($id_pekerjaan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ubah_pekerjaan(){
        $data=[
            'id_pekerjaan'=> htmlspecialchars($this->input->post('id_pekerjaan')),
            'nama_pekerjaan'=> htmlspecialchars($this->input->post('nama_pekerjaan')),
            'ongkos_pekerjaan'=> htmlspecialchars($this->input->post('ongkos_pekerjaan')),
        ];
     if ($this->M_crud->updatedata('tabel_pekerjaan',['id_pekerjaan'=> $this->input->post('id_pekerjaan')], $data)> 0){
     $message ['status']= 'success';
     
     }else{
         $message ['status']= 'failed';
     
     };
     $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function delete_pekerjaan($id_pekerjaan){
        if ($this->M_crud->delete('tabel_pekerjaan',['id_pekerjaan'=>$id_pekerjaan])> 0){
            $message ['status']= 'success';
            
            }else{
                $message ['status']= 'failed';
            
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }
    }
    

