<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serverside extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
        $this->load->database();
        $this->load->model('M_serverside');
        $this->load->model('M_crud');
    }
   public function index()
    {
        
         $this->load->view('templates/serverside/header');
        $this->load->view('serverside/serverside');
        // $this->load->view('templates/auth_footer');
    }
    
   public function getData()
    {
        $result = $this->M_serverside->getDataTable();

        $data = array();
        $no = $_POST['start'];
        foreach ($result as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tanggal;
            $row[] = $field->nama_mandor;
            $row[] = $field->nama_pekerjaan;
            $row[] = $field->luas_plan;
            $row[] = $field->jumlah_pekerja;
            $row[] = $field->jumlah_sopir;
            $row[] = 'Rp. ' . ($field->biaya);
            $row[] = 'Rp. ' . ($field->biaya_ha);
            $row[] = '
            <a href="#"  <i class="btn btn-success btn-sm" onclick="byid ('."'". $field->id_riwayat. "','detail'".')" ></i> Detail Data </> </a> 
            
            <a href="#"  <i class="btn btn-danger btn-sm" onclick="byid ('."'". $field->id_riwayat. "','delete'".')" ></i> Hapus Data</> </a>' ;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_serverside->count_all(),
            "recordsFiltered" => $this->M_serverside->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // function detail($id)
    // {
    //     $id = $this->input->get('id');
    //     $data = $this->M_crud->getjoinfilter('detail_penjualan', 'barang', 'detail_penjualan.kode_barang=barang.kode_barang', ['id_riwayat' => $id]);
    //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
    // }
    function byid($id_riwayat){
        $data = $this->M_crud->getjoinfilter2( ['id_riwayat' => $id_riwayat]);
     

        echo json_encode($data);
    
    }
    public function delete_riwayat($id_riwayat){
        if ($this->M_crud->delete('riwayat',['id_riwayat'=>$id_riwayat])> 0){
            $message ['status']= 'success';
            
            }else{
                $message ['status']= 'failed';
            
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }
}
