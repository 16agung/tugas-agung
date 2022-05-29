<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
        $this->load->database();
        $this->load->model('M_plan');
        $this->load->model('Data_model');
        $this->load->model('M_crud');
    }
   public function index()
    {
        
        $data['kebun'] =  $this->Data_model->getAllKebun();
        $this->load->view('templates/serverside/header');
        $this->load->view('serverside/plan', $data);
       
    }
    public function tambah_plan(){
   
   
   $data=[
       'id_kebun'=> htmlspecialchars($this->input->post('id_kebun')),
       'nama_plan'=> htmlspecialchars($this->input->post('nama_plan')),
       'luas_plan'=> htmlspecialchars($this->input->post('luas_plan')),
   ];
if ($this->M_plan->tambah_plan($data)> 0){
$message ['status']= 'success';

}else{
    $message ['status']= 'failed';

};

$this->output->set_content_type('application/json')->set_output(json_encode($message));
   
   
        //     $this->form_validation->set_rules('nama_plan', 'Nama_plan', 'required|trim');
    //    if($this->form_validation->run()== FALSE){
    //     $data['kebun'] =  $this->Data_model->getAllKebun();
    //        $judul['title'] = 'Halaman Tambah Plan';
    //        $this->load->view('templates/auth_header',$judul);
    //        $this->load->view('perhitungan_tebu/tambah_plan', $data);
    //        $this->load->view('templates/auth_footer');
    //    }else{
    // $this->Data_model->tambahDataPlan();
    // $this->session->set_flashdata('flash', 'Ditambahkan');
    // redirect('data/plan');
    //    }
    }
    
   public function getData()
    {
        $result = $this->M_plan->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kebun;
            $row[] = $field->nama_plan;
            $row[] = $field->luas_plan;
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_plan. "','edit'".')" ></i> Edit Data </> </a> 
            
            <a href="#"  <i class="btn btn-danger btn-sm" onclick="byid ('."'". $field->id_plan. "','delete'".')" ></i> Hapus Data</> </a>' ; 
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_plan->count_all(),
            "recordsFiltered" => $this->M_plan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function byid($id_plan){
        $data = $this->M_plan->getdataById($id_plan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ubah_plan(){
        $data=[
            'id_kebun'=> htmlspecialchars($this->input->post('id_kebun')),
            'nama_plan'=> htmlspecialchars($this->input->post('nama_plan')),
            'luas_plan'=> htmlspecialchars($this->input->post('luas_plan')),
        ];
     if ($this->M_crud->updatedata('tabel_plan',['id_plan'=> $this->input->post('id_plan')], $data)> 0){
     $message ['status']= 'success';
     
     }else{
         $message ['status']= 'failed';
     
     };
     $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function delete_plan($id_plan){
        if ($this->M_crud->delete('tabel_plan',['id_plan'=>$id_plan])> 0){
            $message ['status']= 'success';
            
            }else{
                $message ['status']= 'failed';
            
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }
    }
    

