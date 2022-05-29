<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
    parent:: __construct();
    if ($this->session->userdata('logged_in') != true) {
        redirect(base_url('auth'));
    }
}
    public function index()
     {
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        // echo'Ini adalah halaman my profile '. $data['user'] ['username'];
  var_dump($data);
        die;
         $judul['title'] = 'Halaman User';
             $this->load->view('templates/auth_header',$judul);
        //     // $this->load->view('auth/login');
             $this->load->view('user/my_profile',$data);
             $this->load->view('templates/auth_footer');
    
}

public function edit_profile(){
    $judul['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user',['username'=>
    $this->session->userdata('username')])->row_array();  
$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

if($this->form_validation->run()== false){

    $this->load->view('templates/auth_header',$judul);
    $this->load->view('user/edit_profile',$data);
    $this->load->view('templates/auth_footer');
}else{

    $username = $this->input->post('username');
    $name = $this->input->post('name');

//cek jika ada gambar yang akan diupload
$upload_image = $_FILES['image']['name'];
if ($upload_image) {
    $config['upload_path']          = './assets/img/profile/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = '2048';
   
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {

        $old_image = $data['user']['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }
        $new_image = $this->upload->data('file_name');
           $this->db->set('image', $new_image); 
    }else{
        echo $this->upload->display_errors(); 
    }
    
} 


   $this->db->set('name', $name);
    $this->db->where('username', $username);
    $this->db->update('user'); 

    $this->session->set_flashdata('message', 'div class="alert alert-success" role="alert">Profilmu berhasil diupdate!</div>');
    redirect('profile');
}

}
}