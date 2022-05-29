<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
    $this->load->model('Data_model');
    $this->load->helper('url');
    $this->load->library('cart');

        parent::__construct();
        $this->load->model('Data_model');
        $this->load->model('M_riwayat');
    }

   public function index()
    {
        // if ($this->input->post()) {
        //     $tanggal_awal = $this->input->post('tanggal_awal');
        //     $tanggal_akhir = $this->input->post('tanggal_akhir');
        //     $data['laporan'] = $this->Data_model->getwhere('riwayat', ['tanggal >' => $tanggal_awal, 'tanggal <' => $tanggal_akhir]);
        // } else {
        //     $data['laporan'] = $this->Data_model->getdata('riwayat');
        // }
        $this->load->view('templates/auth_header');
        $this->load->view('perhitungan_tebu/riwayat_perhitungan');
        $this->load->view('templates/auth_footer');
    }
    // function detail()
    // {
    //     $id = $this->input->get('id');
    //     $data = $this->Data_model->getjoinfilter('detail_penjualan', 'barang', 'detail_penjualan.kode_barang=barang.kode_barang', ['kode_penjualan' => $id]);
    //     echo json_encode($data);
    // }
    // function show()
    // {
    //     $output = "";
    //     $tanggal_awal = $this->input->post('tanggal_awal');
    //     $tanggal_akhir = $this->input->post('tanggal_akhir');
    //     $data = $this->Data_model->getwhere('dummy', ['tanggal >' => $tanggal_awal, 'tanggal <' => $tanggal_akhir]);
    //     foreach ($data as $a) {
    //         $output .= '<tr>
    //         <td>' . $a->id . '</td>
    //         <td>' . $a->tanggal . '</td>
    //         </tr>';
    //     }
    //     return $output;
    // }
    // function tampil()
    // {
    //     $tanggal_awal = $this->input->post('tanggal_awal');
    //     $tanggal_akhir = $this->input->post('tanggal_akhir');
    //     $list = $this->M_laporan->get_datatables(['tanggal >' => $tanggal_awal, 'tanggal <' => $tanggal_akhir]);
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $field) {
    //         $no++;
    //         $row = array();
    //         $row[] = $no;
    //         $row[] =  date('d-m-Y', strtotime($field->tanggal));;
    //         $row[] = $field->nama_customer;
    //         $row[] = $field->alamat;
    //         $row[] = 'Rp. ' . number_format($field->total, 0, ',', '.');
    //         $row[] = 'Rp. ' . number_format($field->bayar, 0, ',', '.');
    //         $row[] = 'Rp. ' . number_format($field->kembali, 0, ',', '.');
    //         $row[] = '<a href="javascript:;" role="button" id="edit" data-id="' . $field->kode_penjualan . '"><i class="fas fa-eye"></i></a>';

    //         $data[] = $row;
    //     }

    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->M_laporan->count_all($data),
    //         "recordsFiltered" => $this->M_laporan->count_filtered($data),
    //         "data" => $data,
    //     );
    //     //output dalam format JSON
    //     echo json_encode($output);
    // }
}
