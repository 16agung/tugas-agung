<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan_tebu extends CI_Controller {
    public function __construct()
    {
    parent:: __construct();
    if ($this->session->userdata('logged_in') != true) {
        redirect(base_url('auth'));
    }
    $this->load->model('Data_model');
    $this->load->model('M_crud');
    $this->load->helper('url');
    $this->load->library('cart');
    $this->cart->product_name_rules = '[:print:]';
    $this->load->helper('string');
    }
    public function index()
     {
        $data['kode'] = date('Ymd') . strtoupper(random_string('alnum', 4));;
        $data['mandor'] = $this->Data_model->getAllMandor();
        $data['kebun'] =  $this->Data_model->getAllKebun();
        $data['plan'] =  $this->Data_model->getAllPlan();
        $data['pekerjaan'] =  $this->Data_model->getAllPekerjaan();
        $data['sopir'] = $this->Data_model->get_ongkos_sopir();
         $judul['title'] = 'Halaman Perhitungan Budidaya Tebu';
         $this->load->view('templates/serverside/navbar');
        $this->load->view('perhitungan_tebu/input_budidaya', $data);
        $this->load->view('templates/serverside/sidebar');
        $this->load->view('templates/serverside/footer');  
         
        //  $this->load->view('templates/auth_header',$judul);
        //      $this->load->view('perhitungan_tebu/input_budidaya',$data);
        //      $this->load->view('templates/auth_footer');
    
}
public function simpan_data()
    {
        $id_riwayat = $this->input->post('id_riwayat'); 
        $tanggal = $this->input->post('tanggal');
        $id_mandor = $this->input->post('id_mandor');
        $id_pekerjaan = $this->input->post('id_pekerjaan');
        $jumlah_pekerja = $this->input->post('jumlah_pekerja');
        $jumlah_sopir = $this->input->post('jumlah_sopir');
        $biaya = $this->input->post('hargatot');
        $biaya_ha = $this->input->post('output_biaya_ha');
        $data = [
            'id_riwayat' => $id_riwayat,
            'tanggal' => $tanggal,
            'id_mandor' => $id_mandor,
            'id_pekerjaan' => $id_pekerjaan,
            'luas_plan' => $this->cart->total(),
            'jumlah_pekerja' => $jumlah_pekerja,
            'jumlah_sopir' => $jumlah_sopir,
            'biaya' => $biaya,
            'biaya_ha' => $biaya_ha
        ];
        $this->M_crud->insertdata('riwayat', $data);
        foreach ($this->cart->contents() as $a) {
            $detail_riwayat = [
                'id_riwayat' => $id_riwayat,
                'id_mandor' => $id_mandor,
                'id_pekerjaan'=> $id_pekerjaan,
                'id_plan' => $a['id'],
                'id_kebun' => $a['options'],
                'biaya_plan' => round($a['price'] * $biaya_ha) ,
                'biaya_ha' => $biaya_ha,
                
            ];
            $this->M_crud->insertdata('detail_riwayat', $detail_riwayat);
        }
        $this->cart->destroy();
        redirect('serverside');
    }
public function proses_plan()
{
    
    $plan = $this->input->post('id');
    $query = $this->Data_model->get_data_barang_bykode($plan);
    $this->output->set_content_type('application/json')->set_output(json_encode($query));
    
}
public function proses_ongkos()
{
    
    $id_pekerjaan = $this->input->post('id');
    $query = $this->Data_model->get_ongkos_bykode($id_pekerjaan);
    $this->output->set_content_type('application/json')->set_output(json_encode($query));
    
}
public function get_plan()
{
    
    $id_kebun = $this->input->post('id');
    $query = $this->Data_model->get_data_plan($id_kebun);
    $output = ' <option value="">-Pilih Nama Plan-</option>';
     foreach ($query as $row){
        $output .= '<option value="' . $row->id_plan . '"> ' . $row->nama_plan . '</option>';   
     }  
     
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
    
}




function add_to_cart(){ //fungsi Add To Cart
   
    $data = array(
        'id' => $this->input->post('id_plan'), 
        'name' => $this->input->post('nama_plan'), 
        'price' => $this->input->post('luas_plan'), 
        'qty'=> '1',
        'options' => $this->input->post('id_kebun') 
    );
    // var_dump($data); die;
    $this->cart->insert($data);
    echo $this->show_cart(); //tampilkan cart setelah added
}
function show_cart(){ //Fungsi untuk menampilkan Cart
    $output = '';
    $no = 0;
    foreach ($this->cart->contents() as $items) {
         
        $no++;
        $output .='
            <tr>
                <td>'.$items['name'].'</td>
                <td>'.$items['subtotal'].'</td>
               
              
                <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
            </tr>
        ';
        
    }
    // $output .= '
    //         <tr>
    //             <th colspan="3">Total</th>
    //             <th colspan="2">'.($this->cart->total()).'</th>
    //         </tr>
    //     ';
    return $output;
}

function load_cart(){ //load data cart
    echo $this->show_cart();
}

 function hapus_cart(){ //fungsi untuk menghapus item cart
     $data = array(
         'rowid' => $this->input->post('row_id'), 
         'qty' => 0, 
     );
     $this->cart->update($data);
     echo $this->show_cart();
 }
function total()
    {
    
        echo $this->cart->total();
    }


}