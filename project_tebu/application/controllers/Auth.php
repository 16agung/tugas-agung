<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
    parent:: __construct();
  
    $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1','required|trim');
       
        if($this->form_validation->run() == false){
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header_login',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer_login');
        }else{
            //validasi sukses
            $this->_login();
        }

    }
    private function _login()
    {
         $username = $this->input->post('username');
        $password = $this->input->post('password1');
            // var_dump($password);die;
        $user = $this->db->get_where('user',['username'=>$username])->row_array(); 
        
        if ($user){
            if(password_verify($password, $user['password'])){
               // echo "pass benar";
               $data = [
                   'username' => $user['username'],
                   'role_id' => $user['role_id'],
                   'logged_in' => true
               ];
               $this->session->set_userdata($data);
               redirect('user');
    } else {
         echo"pass salah";
    }
    } else {
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>');
    redirect('auth');
    }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]',[
            'matches' =>'password dont match',
            'min_length' =>'password pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        if($this->form_validation->run()==false){

            $data['title'] = 'project Tebu';
            $this->load->view('templates/auth_header_login', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer_login');
        } else{
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'),
            PASSWORD_DEFAULT),
            'role_id' => 2,
            'date_created' => time()

            
        ];
        
         $this->db->insert('user', $data);
         redirect('auth');
        }
    }


    public function logout(){

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil logout bos!</div>');
        redirect('auth');
    }
}