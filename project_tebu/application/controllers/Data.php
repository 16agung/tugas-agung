<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    public function __construct()
    {
    parent:: __construct();
    $this->load->model('Data_model');
    }
    public function index()
     {
        $data['tabel_mandor'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        // echo'Ini adalah halaman my profile '. $data['user'] ['username'];

         $judul['title'] = 'Halaman User';
             $this->load->view('templates/auth_header',$judul);
        //     // $this->load->view('auth/login');
             $this->load->view('perhitungan_tebu/mandor',$data);
             $this->load->view('templates/auth_footer');
    
}
    public function mandor()
     {
        $data['mandor'] = $this->Data_model->getAllMandor();
        // echo'Ini adalah halaman my profile '. $data['user'] ['username'];

         $judul['title'] = 'Halaman User';
             $this->load->view('templates/auth_header',$judul);
        //     // $this->load->view('auth/login');
             $this->load->view('perhitungan_tebu/mandor',$data);
             $this->load->view('templates/auth_footer');
    
}

public function tambah_mandor(){
    $this->form_validation->set_rules('nama_mandor', 'Nama_mandor', 'required|trim');
   if($this->form_validation->run()== FALSE){

       $judul['title'] = 'Halaman User';
       $this->load->view('templates/auth_header',$judul);
   //     // $this->load->view('auth/login');
       $this->load->view('perhitungan_tebu/tambah_mandor');
       $this->load->view('templates/auth_footer');
   }else{
$this->Data_model->tambahDataMandor();
$this->session->set_flashdata('flash', 'Ditambahkan');
redirect('data/mandor');
   }


}

public function hapus_mandor($id_mandor)
{
    $this->Data_model->hapusMandor($id_mandor);
    redirect('data/mandor');
}
public function ubah_mandor($id_mandor){
    
    $judul['title'] = 'Form Ubah Data Mandor';
    $data['mandor'] = $this->Data_model->getMandorById($id_mandor);
   
    $this->form_validation->set_rules('nama_mandor', 'Nama_mandor', 'required|trim');
   if($this->form_validation->run()== FALSE){

       $this->load->view('templates/auth_header',$judul);
       $this->load->view('perhitungan_tebu/ubah_mandor', $data);
       $this->load->view('templates/auth_footer');
   }else{
$this->Data_model->ubahDataMandor();
$this->session->set_flashdata('flash', 'Berhasil Diubah');
redirect('data/mandor');
   }


}
public function plan()
{
   $data['plan'] = $this->Data_model->getAllPlan();
   $this->load->library('pagination');
   //config
   $config['base_url'] = 'http://localhost/project_tebu/data/plan/index';
   $config['total_rows'] = $this->Data_model->countAllPlan();
   $config['per_page'] = 10;
  
  //styling
  $config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
  $config['full_tag_close'] = '</ul></nav>';
  
  $config['first_link'] = 'First';
  $config['first_tag_open'] = '<li class="page-item">';
  $config['first_tag_close'] = '</li>';
  
  
  $config['last_link'] = 'Last';
  $config['last_tag_open'] = '<li class="page-item">';
  $config['last_tag_close'] = '</li>';
  
  $config['next_link'] = '&raquo';
  $config['next_tag_open'] = '<li class="page-item">';
  $config['next_tag_close'] = '</li>';
  
  $config['prev_link'] = '&laquo';
  $config['prev_tag_open'] = '<li class="page-item">';
  $config['prev_tag_close'] = '</li>';
  
  $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
  $config['cur_tag_close'] = '</a></li>';
  
  $config['num_tag_open'] = '<li class="page-item ">';
  $config['num_tag_close'] = '</li>';
  
  $config['attributes'] = array('class' => 'page-link');
  
  //inisialisasi pagination
   $this->pagination->initialize($config);

   $data['start'] = $this->uri->segment(4);
   $data['plan'] = $this->Data_model->getPlans($config['per_page'], $data['start']);
// var_dump( $data['plan']); die;
    $judul['title'] = 'Halaman Plan';
        $this->load->view('templates/auth_header',$judul);
   //     // $this->load->view('auth/login');
        $this->load->view('perhitungan_tebu/plan',$data);
        $this->load->view('templates/auth_footer');

        //pagination
       
}
public function tambah_plan(){
    $this->form_validation->set_rules('nama_plan', 'Nama_plan', 'required|trim');
   if($this->form_validation->run()== FALSE){
    $data['kebun'] =  $this->Data_model->getAllKebun();
       $judul['title'] = 'Halaman Tambah Plan';
       $this->load->view('templates/auth_header',$judul);
       $this->load->view('perhitungan_tebu/tambah_plan', $data);
       $this->load->view('templates/auth_footer');
   }else{
$this->Data_model->tambahDataPlan();
$this->session->set_flashdata('flash', 'Ditambahkan');
redirect('data/plan');
   }


}
public function pekerjaan()
     {
        $data['pekerjaan'] = $this->Data_model->getAllpekerjaan();
        // echo'Ini adalah halaman my profile '. $data['user'] ['username'];

         $judul['title'] = 'Halaman User';
             $this->load->view('templates/auth_header',$judul);
        //     // $this->load->view('auth/login');
             $this->load->view('perhitungan_tebu/pekerjaan',$data);
             $this->load->view('templates/auth_footer');
    
}

public function tambah_pekerjaan(){
    $this->form_validation->set_rules('nama_pekerjaan', 'Nama_pekerjaan', 'required|trim');
   if($this->form_validation->run()== FALSE){

       $judul['title'] = 'Halaman User';
       $this->load->view('templates/auth_header',$judul);
   //     // $this->load->view('auth/login');
       $this->load->view('perhitungan_tebu/tambah_pekerjaan');
       $this->load->view('templates/auth_footer');
   }else{
$this->Data_model->tambahDataPekerjaan();
$this->session->set_flashdata('flash', 'Ditambahkan');
redirect('data/pekerjaan');
   }


}

public function hapus_pekerjaan($id_pekerjaan)
{
    $this->Data_model->hapuspekerjaan($id_pekerjaan);
    redirect('data/pekerjaan');
}
public function ubah_pekerjaan($id_pekerjaan){
    
    $judul['title'] = 'Form Ubah Data pekerjaan';
    $data['pekerjaan'] = $this->Data_model->getpekerjaanById($id_pekerjaan);
   
    $this->form_validation->set_rules('nama_pekerjaan', 'Nama_pekerjaan', 'required|trim');
   if($this->form_validation->run()== FALSE){

       $this->load->view('templates/auth_header',$judul);
       $this->load->view('perhitungan_tebu/ubah_pekerjaan', $data);
       $this->load->view('templates/auth_footer');
   }else{
$this->Data_model->ubahDatapekerjaan();
$this->session->set_flashdata('flash', 'Berhasil Diubah');
redirect('data/mandor');
   }


}



public function input_budidaya()
    {
        $this->Data_model->tambahInputBudidaya();
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('perhitungan_tebu/hasil');
    }

//    $this->db->set('name', $name);
//     $this->db->where('username', $username);
//     $this->db->update('user'); 

//     $this->session->set_flashdata('message', 'div class="alert alert-success" role="alert">Profilmu berhasil diupdate!</div>');
//     redirect('profile');
// }

// }
}