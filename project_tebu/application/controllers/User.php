<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
        echo'Selamat datang '. $data['user'] ['username'];

        $judul['title'] = 'Halaman User';
            $this->load->view('templates/auth_header',$judul);
            // $this->load->view('auth/login');
            $this->load->view('user/index');
            $this->load->view('templates/auth_footer');
    }
    public function tebu_tanam()
     {
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        // echo'Ini adalah halaman tebu tanam '. $data['user'] ['username'];

         $judul['title'] = 'Halaman User';
             $this->load->view('templates/auth_header',$judul);
        //     // $this->load->view('auth/login');
             $this->load->view('user/tebutanam');
            $this->load->view('templates/auth_footer');
    
}
    public function tebu_kepras()
     {
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        // echo'Ini adalah halaman tebu Kepras '. $data['user'] ['username'];


         $judul['title'] = 'Halaman Tebu Kepras';
             $this->load->view('templates/auth_header',$judul);
        //     // $this->load->view('auth/login');
             $this->load->view('user/tebukepras');
             $this->load->view('templates/auth_footer');
          
}

public function hasil(){
    $luasplan = $this->input->post('luas_plan');
    $biayasewa = $this->input->post('biaya_sewa');
    $kepras = $this->input->post('biaya_kepras');
    $putusakar = $this->input->post('biaya_putus_akar');
    $pemupuk1 = $this->input->post('pemupuk_pertama');
    $jumlahpupuk1 = $this->input->post('jumlah_pupuk_pertama');
    $luasmingguanpupuk1 = $this->input->post('luas_mingguan_pupuk_pertama');
    $penyemprot1 = $this->input->post('penyemprot_pertama');
    $jumlahherbisida1 = $this->input->post('jumlah_herbisida_pertama');
    $luasherbisida1 = $this->input->post('luas_mingguan_herbisida_pertama');
    $sulam = $this->input->post('biaya_sulam');
    $pemupuk2 = $this->input->post('pemupuk_kedua');
    $jumlahpupuk2 = $this->input->post('jumlah_pupuk_kedua');
    $luasmingguanpupuk2 = $this->input->post('luas_mingguan_pupuk_kedua');
    $gulud = $this->input->post('biaya_gulud');
    $penyemprot2 = $this->input->post('penyemprot_kedua');
    $jumlahherbisida2 = $this->input->post('jumlah_herbisida_kedua');
    $luasherbisida2 = $this->input->post('luas_mingguan_herbisida_kedua');
    $klentek = $this->input->post('biaya_klentek');
    $biayalain = $this->input->post('biaya_lain');
   
    
    
    
    //perhitungan dengan luas plan (tampil views)
    $biaya_sewa_lahan = $luasplan * $biayasewa;
    $biaya_putus_akar = $luasplan * $putusakar;
    $biaya_Kepras      = $luasplan * $kepras;
    $biaya_sulam = $luasplan * $sulam;
    $biaya_gulud = $luasplan * $gulud;
    $biaya_klentek = $luasplan * $klentek;
    $biaya_lain = $biayalain;

    //perhitungan pupuk dan obat
    
    //pemumpukan1
    $biayapemupuk1 = $pemupuk1 * 25000;
    $ratapupuk1 = $jumlahpupuk1/$luasmingguanpupuk1;
    $ratakerjapupuk1 = $biayapemupuk1/$luasmingguanpupuk1;
    $konsumsipupuk1 = $ratapupuk1*4150 * $luasplan;
    $biayapemupukan1 = $ratakerjapupuk1 * $luasplan;
    $hasil_pupuk1 = $konsumsipupuk1 + $biayapemupukan1;
   
    //Tampil views
    $jumlah_konsumsi_pupuk1 = $konsumsipupuk1;
    $ongkos_pupuk1 = $biayapemupukan1;
    $biaya_pemupukan1 = $hasil_pupuk1;
    
//herbisida1
$biayapenyemprot1 = $penyemprot1 * 30000;
$rataherbisida1 = $jumlahherbisida1 / $luasherbisida1;
$ratakerjaherbisida1 = $biayapenyemprot1 / $luasherbisida1;
$konsumsiherbisida1 = $rataherbisida1 * 115000 * $luasplan;
$biayapenyemprotan1 = $ratakerjaherbisida1 * $luasplan;
$hasil_herbisida1 = $konsumsiherbisida1 + $biayapenyemprotan1;
//tampil views
$jumlah_konsumsi_herbisida1 = $konsumsiherbisida1;
    $ongkos_berbisida1 = $biayapenyemprotan1;
    $biaya_prenyemprotan_herbisida1 = $hasil_herbisida1;
    
   
    
    //pupuk2
    $biayapemupuk2 = $pemupuk2 * 25000;
    $ratapupuk2 = $jumlahpupuk2/$luasmingguanpupuk2;
    $ratakerjapupuk2 = $biayapemupuk2/$luasmingguanpupuk2;
    $konsumsipupuk2 = $ratapupuk2*4150 * $luasplan;
    $biayapemupukan2 = $ratakerjapupuk2 * $luasplan;
    $hasil_pupuk2 = $konsumsipupuk2 + $biayapemupukan2;

    //tampil views
    $jumlah_konsumsi_pupuk2 = $konsumsipupuk2;
    $ongkos_pupuk2 = $biayapemupukan2;
    $biaya_pemupukan2 = $hasil_pupuk2;
   

   
   //hebisida2
   $biayapenyemprot2 = $penyemprot2 * 30000;
$rataherbisida2 = $jumlahherbisida2 / $luasherbisida2;
$ratakerjaherbisida2 = $biayapenyemprot2 / $luasherbisida2;
$konsumsiherbisida2 = $rataherbisida2 * 115000 * $luasplan;
$biayapenyemprotan2 = $ratakerjaherbisida2 * $luasplan;
$hasil_herbisida2 = $konsumsiherbisida2 + $biayapenyemprotan2;
   
//tampil
    $jumlah_konsumsi_herbisida2 = $konsumsiherbisida2;
    $ongkos_berbisida2 = $biayapenyemprotan2;
    $biaya_prenyemprotan_herbisida2 = $hasil_herbisida2;
   
    $subtotal = $biaya_sewa_lahan + $biaya_Kepras + $biaya_putus_akar + $biaya_sulam +
    $biaya_gulud  + $biaya_klentek + $biaya_lain
    + $biaya_pemupukan1 + $biaya_pemupukan2
    + $biaya_prenyemprotan_herbisida1 + $biaya_prenyemprotan_herbisida2;   
    
    $hasilbunga = $subtotal * 13 / 100;
    
    $grandtotal= $subtotal + $hasilbunga; 
   
    // var_dump(  $biaya_sewa_lahan,
    // $biaya_putus_akar,
    // $biaya_Kepras,
    // $biaya_sulam,
    // $biaya_gulud,
    // $biaya_klentek,
    // $biaya_lain, 
    // $jumlah_konsumsi_pupuk1,
    // $ongkos_pupuk1,
    // $biaya_pemupukan1,
    // $jumlah_konsumsi_herbisida1,
    // $ongkos_berbisida1,
    // $biaya_prenyemprotan_herbisida1,
    // $jumlah_konsumsi_pupuk2,
    // $ongkos_pupuk2,
    // $biaya_pemupukan2,
    // $jumlah_konsumsi_herbisida2,
    // $ongkos_berbisida2,
    // $biaya_prenyemprotan_herbisida2, $hasilbunga, $grandtotal);die;
  
 
    $data=[
        'biaya_sewa'=>$biaya_sewa_lahan,
        'biaya_putus_akar'=>$biaya_putus_akar,
        'biaya_kepras'=>$biaya_Kepras,
        'biaya_sulam'=>$biaya_sulam,
        'biaya_gulud'=>$biaya_gulud,
        'biaya_klentek'=>$biaya_klentek,
        'biaya_lain'=>$biaya_lain, 
        'jumlah_konsumsi_pupuk1'=>$jumlah_konsumsi_pupuk1,
        'ongkos_pupuk1'=>$ongkos_pupuk1,
        'biaya_pemupukan1'=>$biaya_pemupukan1,
        'jumlah_konsumsi_herbisida1'=>$jumlah_konsumsi_herbisida1,
        'ongkos_berbisida1'=>$ongkos_berbisida1,
        'biaya_prenyemprotan_herbisida1'=>$biaya_prenyemprotan_herbisida1,
        'jumlah_konsumsi_pupuk2'=> $jumlah_konsumsi_pupuk2,
        'ongkos_pupuk2'=>$ongkos_pupuk2,
        'biaya_pemupukan2'=>$biaya_pemupukan2,
        'jumlah_konsumsi_herbisida2'=>$jumlah_konsumsi_herbisida2,
        'ongkos_berbisida2'=>$ongkos_berbisida2,
        'biaya_prenyemprotan_herbisida2'=>$biaya_prenyemprotan_herbisida2,
        'grandtotal'=>$grandtotal 

    ];
    $this->load->view('templates/auth_header');
    $this->load->view('user/hasil',$data );
    $this->load->view('templates/auth_footer');
    
}
public function hasil_tebu_tanam(){
    $t_luasplan = $this->input->post('t_luas_plan');
    $t_biayasewa = $this->input->post('t_biaya_sewa');
    $t_traktor = $this->input->post('t_biaya_traktor');
    $t_hargabibit = $this->input->post('t_harga_bibit');
    $t_beratbibit = $this->input->post('t_berat_bibit');
    $t_tanam = $this->input->post('t_biaya_tanam');
    $t_penyemprot1 = $this->input->post('t_penyemprot_pertama');
    $t_jumlahherbisida1 = $this->input->post('t_jumlah_herbisida_pertama');
    $t_luasherbisida1 = $this->input->post('t_luas_mingguan_herbisida_pertama');
    $t_pemupuk1 = $this->input->post('t_pemupuk_pertama');
    $t_jumlahpupuk1 = $this->input->post('t_jumlah_pupuk_pertama');
    $t_luasmingguanpupuk1 = $this->input->post('t_luas_mingguan_pupuk_pertama');
    $t_gulud1 = $this->input->post('t_biaya_gulud1');
    $t_penyemprot2 = $this->input->post('t_penyemprot_kedua');
    $t_jumlahherbisida2 = $this->input->post('t_jumlah_herbisida_kedua');
    $t_luasherbisida2 = $this->input->post('t_luas_mingguan_herbisida_kedua');
    $t_pemupuk2 = $this->input->post('t_pemupuk_kedua');
    $t_jumlahpupuk2 = $this->input->post('t_jumlah_pupuk_kedua');
    $t_luasmingguanpupuk2 = $this->input->post('t_luas_mingguan_pupuk_kedua');
    $t_gulud2 = $this->input->post('t_biaya_gulud2');
    $t_klentek = $this->input->post('t_biaya_klentek');
    $t_biayalain = $this->input->post('t_biaya_lain');
    
    
    
    //perhitungan dengan luas plan (tampil views)
    $h_sewalahan = $t_luasplan * $t_biayasewa;
    $h_biayatraktor = $t_luasplan * $t_traktor;
    $h_biayabibit      = $t_hargabibit * $t_beratbibit;
    $h_biayatanam = $t_luasplan * $t_tanam;
    $h_biayagulud1 = $t_luasplan * $t_gulud1;
    $h_biayagulud2 = $t_luasplan * $t_gulud2;
    $h_biayaklentek = $t_luasplan * $t_klentek;
    $h_biayalain = $t_biayalain;

    //perhitungan pupuk dan obat
    
    //pemumpukan1
    $h_biayapemupuk1 = $t_pemupuk1 * 25000;
    $h_ratapupuk1 = $t_jumlahpupuk1/$t_luasmingguanpupuk1;
    $h_ratakerjapupuk1 = $h_biayapemupuk1/$t_luasmingguanpupuk1;
    $h_konsumsipupuk1 = $h_ratapupuk1*4150 * $t_luasplan;
    $h_biayapemupukan1 = $h_ratakerjapupuk1 * $t_luasplan;
    $h_hasil_pupuk1 = $h_konsumsipupuk1 + $h_biayapemupukan1;
   
    //Tampil views
    $h_jumlah_konsumsi_pupuk1 = $h_konsumsipupuk1;
    $h_ongkos_pupuk1 = $h_biayapemupukan1;
    $h_biaya_pemupukan1 = $h_hasil_pupuk1;
    
//herbisida1
$h_biayapenyemprot1 = $t_penyemprot1 * 30000;
$h_rataherbisida1 = $t_jumlahherbisida1 / $t_luasherbisida1;
$h_ratakerjaherbisida1 = $h_biayapenyemprot1 / $t_luasherbisida1;
$h_konsumsiherbisida1 = $h_rataherbisida1 * 115000 * $t_luasplan;
$h_biayapenyemprotan1 = $h_ratakerjaherbisida1 * $t_luasplan;
$h_hasil_herbisida1 = $h_konsumsiherbisida1 + $h_biayapenyemprotan1;
//tampil views
$h_jumlah_konsumsi_herbisida1 = $h_konsumsiherbisida1;
    $h_ongkos_berbisida1 = $h_biayapenyemprotan1;
    $h_biaya_prenyemprotan_herbisida1 = $h_hasil_herbisida1;
    
   
    
    //pupuk2
    $h_biayapemupuk2 = $t_pemupuk2 * 25000;
    $h_ratapupuk2 = $t_jumlahpupuk2/$t_luasmingguanpupuk2;
    $h_ratakerjapupuk2 = $h_biayapemupuk2/$t_luasmingguanpupuk2;
    $h_konsumsipupuk2 = $h_ratapupuk2*4150 * $t_luasplan;
    $h_biayapemupukan2 = $h_ratakerjapupuk2 * $t_luasplan;
    $h_hasil_pupuk2 = $h_konsumsipupuk2 + $h_biayapemupukan2;

    //tampil views
    $h_jumlah_konsumsi_pupuk2 = $h_konsumsipupuk2;
    $h_ongkos_pupuk2 = $h_biayapemupukan2;
    $h_biaya_pemupukan2 = $h_hasil_pupuk2;
   

   
   //hebisida2
   $h_biayapenyemprot2 = $t_penyemprot2 * 30000;
$h_rataherbisida2 = $t_jumlahherbisida2 / $t_luasherbisida2;
$h_ratakerjaherbisida2 = $h_biayapenyemprot2 / $t_luasherbisida2;
$h_konsumsiherbisida2 = $h_rataherbisida2 * 115000 * $t_luasplan;
$h_biayapenyemprotan2 = $h_ratakerjaherbisida2 * $t_luasplan;
$h_hasil_herbisida2 = $h_konsumsiherbisida2 + $h_biayapenyemprotan2;
   
//tampil
    $h_jumlah_konsumsi_herbisida2 = $h_konsumsiherbisida2;
    $h_ongkos_berbisida2 = $h_biayapenyemprotan2;
    $h_biaya_prenyemprotan_herbisida2 = $h_hasil_herbisida2;
   
    $h_subtotal = $h_sewalahan + $h_biayatraktor + $h_biayabibit  + $h_biayatanam +
    $h_biayagulud1  + $h_biayagulud2 + $h_biayaklentek + $h_biayalain
    + $h_biaya_pemupukan1 + $h_biaya_pemupukan2
    + $h_biaya_prenyemprotan_herbisida1 + $h_biaya_prenyemprotan_herbisida2;   
    
    $h_hasilbunga = $h_subtotal * 13 / 100;
    
    $h_grandtotal= $h_subtotal + $h_hasilbunga; 
   
    // var_dump(  $biaya_sewa_lahan,
    // $biaya_putus_akar,
    // $biaya_Kepras,
    // $biaya_sulam,
    // $biaya_gulud,
    // $biaya_klentek,
    // $biaya_lain, 
    // $jumlah_konsumsi_pupuk1,
    // $ongkos_pupuk1,
    // $biaya_pemupukan1,
    // $jumlah_konsumsi_herbisida1,
    // $ongkos_berbisida1,
    // $biaya_prenyemprotan_herbisida1,
    // $jumlah_konsumsi_pupuk2,
    // $ongkos_pupuk2,
    // $biaya_pemupukan2,
    // $jumlah_konsumsi_herbisida2,
    // $ongkos_berbisida2,
    // $biaya_prenyemprotan_herbisida2, $hasilbunga, $grandtotal);die;
  
 
    $data=[
        'h_sewalahan'=>$h_sewalahan,
        'h_biayatraktor'=>$h_biayatraktor,
        'h_biayabibit'=>$h_biayabibit,
        'h_biayatanam'=>$h_biayatanam,
        'h_biayagulud1'=>$h_biayagulud1,
        'h_biayagulud2'=>$h_biayagulud2,
        'h_biayaklentek'=>$h_biayaklentek, 
        'h_biayalain'=>$h_biayalain,
        'h_jumlah_konsumsi_pupuk1'=>$h_jumlah_konsumsi_pupuk1,
        'h_ongkos_pupuk1'=>$h_ongkos_pupuk1,
        'h_biaya_pemupukan1'=>$h_biaya_pemupukan1,
        'h_jumlah_konsumsi_herbisida1'=>$h_jumlah_konsumsi_herbisida1,
        'h_ongkos_berbisida1'=>$h_ongkos_berbisida1,
        'h_biaya_prenyemprotan_herbisida1'=> $h_biaya_prenyemprotan_herbisida1,
        'h_jumlah_konsumsi_pupuk2'=>$h_jumlah_konsumsi_pupuk2,
        'h_ongkos_pupuk2'=>$h_ongkos_pupuk2,
        'h_biaya_pemupukan2'=>$h_biaya_pemupukan2,
        'h_jumlah_konsumsi_herbisida2'=>$h_jumlah_konsumsi_herbisida2,
        'h_ongkos_berbisida2'=>$h_ongkos_berbisida2,
        'h_biaya_prenyemprotan_herbisida2'=>$h_biaya_prenyemprotan_herbisida2,

        'h_grandtotal'=>$h_grandtotal 

    ];
    $this->load->view('templates/auth_header');
    $this->load->view('user/hasil_tebu_tanam',$data );
    $this->load->view('templates/auth_footer');
    
}
    
}