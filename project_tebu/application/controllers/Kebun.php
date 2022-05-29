<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebun extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
        $this->load->database();
        $this->load->model('M_kebun');
        $this->load->model('Data_model');
        $this->load->model('M_crud');
    }
   public function index()
    {
        $this->load->view('templates/serverside/navbar');
        $this->load->view('serverside/kebun');
        $this->load->view('templates/serverside/sidebar');
        $this->load->view('templates/serverside/footer');
        // $this->load->view('templates/serverside/header');
        // $this->load->view('serverside/kebun');
       
    }
    public function tambah_kebun(){
   
   
   $data=[
       'id_kebun'=> htmlspecialchars($this->input->post('id_kebun')),
       'kebun'=> htmlspecialchars($this->input->post('nama_kebun')),
       'luas'=> htmlspecialchars($this->input->post('luas_kebun')),
   ];
if ($this->M_kebun->tambah_kebun($data)> 0){
$message ['status']= 'success';

}else{
    $message ['status']= 'failed';

};

$this->output->set_content_type('application/json')->set_output(json_encode($message));
   
   
        //     $this->form_validation->set_rules('nama_kebun', 'Nama_kebun', 'required|trim');
    //    if($this->form_validation->run()== FALSE){
    //     $data['kebun'] =  $this->Data_model->getAllKebun();
    //        $judul['title'] = 'Halaman Tambah Plan';
    //        $this->load->view('templates/auth_header',$judul);
    //        $this->load->view('perhitungan_tebu/tambah_kebun', $data);
    //        $this->load->view('templates/auth_footer');
    //    }else{
    // $this->Data_model->tambahDataPlan();
    // $this->session->set_flashdata('flash', 'Ditambahkan');
    // redirect('data/kebun');
    //    }
    }
    
   public function getData()
    {
        $result = $this->M_kebun->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kebun;
            
            $row[] = $field->luas;
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_kebun. "','edit'".')" ></i> Edit Data </> </a> 
            
            <a href="#"  <i class="btn btn-danger btn-sm" onclick="byid ('."'". $field->id_kebun. "','delete'".')" ></i> Hapus Data</> </a>' ; 
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_kebun->count_all(),
            "recordsFiltered" => $this->M_kebun->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function byid($id_kebun){
        $data = $this->M_kebun->getdataById($id_kebun);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ubah_kebun(){
        $data=[
            'id_kebun'=> htmlspecialchars($this->input->post('id_kebun')),
            'kebun'=> htmlspecialchars($this->input->post('nama_kebun')),
            'luas'=> htmlspecialchars($this->input->post('luas_kebun')),
        ];
     if ($this->M_crud->updatedata('tabel_kebun',['id_kebun'=> $this->input->post('id_kebun')], $data)> 0){
     $message ['status']= 'success';
     
     }else{
         $message ['status']= 'failed';
     
     };
     $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function delete_kebun($id_kebun){
        if ($this->M_crud->delete('tabel_kebun',['id_kebun'=>$id_kebun])> 0){
            $message ['status']= 'success';
            
            }else{
                $message ['status']= 'failed';
            
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }
    }
    

