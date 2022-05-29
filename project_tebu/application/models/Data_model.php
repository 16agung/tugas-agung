<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model{

    public function getAllMandor()
    {
        return $this->db->get('tabel_mandor')->result_array();
    }
    public function tambahDataMandor()
    {
        $data = [
            "nama_mandor"=> $this->input->post('nama_mandor', true)
        ];
         $this->db->insert('tabel_mandor', $data);
    }
    public function hapusMandor($id_mandor)
    {
       
        // $this->db->where('id_mandor', $id_mandor); 
        $this->db->delete('tabel_mandor', ['id_mandor'=>$id_mandor]);
    }
 public function getMandorById($id_mandor){
     return $this->db->get_where('tabel_mandor', ['id_mandor'=> $id_mandor])->row_array();
 }   
 public function ubahDataMandor()
    {
        $data = [
            "nama_mandor"=> $this->input->post('nama_mandor', true)
        ];
        $this->db->where('id_mandor', $this->input->post('id'));
         $this->db->update('tabel_mandor', $data);
    }
     public function getAllKebun()
     {
         return $this->db->get('tabel_kebun')->result_array();
     }
    // public function tambahDataPlan()
    // {
    //     $data = [
    //         "nama_plan"=> $this->input->post('nama_plan', true),
    //         "luas_plan"=> $this->input->post('luas_plan', true)
        
    //     ];
    //      $this->db->insert('tabel_plan', $data);
    // }
    // public function countAllPlan(){

    //     return $this->db->get('tabel_plan')->num_rows();
    // }
    // public function getPlans($limit, $start){

    //     return $this->db->get('tabel_plan', $limit, $start)->result_array();
    // }
    public function getAllPlan()
    {
        return $this->db->get('tabel_plan')->result_array();
    }
    public function tambahDataPlan()
    {
        $data = [
            "id_kebun" => $this->input->post('id_kebun', true),
            "nama_plan"=> $this->input->post('nama_plan', true),
            "luas_plan"=> $this->input->post('luas_plan', true)
        
        ];
         $this->db->insert('tabel_plan', $data);
    }
    public function countAllPlan(){

        return $this->db->get('tabel_plan')->num_rows();
    }
    public function getPlans($limit, $start){

        return $this->db->get('tabel_plan', $limit, $start)->result_array();
    }
    

    function get_data_barang_bykode($kode)
    {
        return $this->db->get_where('tabel_plan', ['id_plan'=> $kode])->result();
    }
    function get_ongkos_sopir()
    {
      return  $this->db->get('ongkos_sopir')->result_array();
    }

    public function get_data_plan($id_kebun)
    {
        return $this->db->get_where('tabel_plan', ['id_kebun'=> $id_kebun])->result();
    }

    //pekerjaan
    public function getAllPekerjaan()
    {
        return $this->db->get('tabel_pekerjaan')->result_array();
    }
    function get_ongkos_bykode($kode)
    {
        $this->db->where('id_pekerjaan', $kode);
        $hasil = $this->db->get('tabel_pekerjaan');

        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }
    public function tambahDataPekerjaan()
    {
        $data = [
            "nama_pekerjaan"=> $this->input->post('nama_pekerjaan', true)
        ];
         $this->db->insert('tabel_pekerjaan', $data);
    }
    public function hapusPekerjaan($id_pekerjaan)
    {
       
        // $this->db->where('id_pekerjaan', $id_pekerjaan); 
        $this->db->delete('tabel_pekerjaan', ['id_pekerjaan'=>$id_pekerjaan]);
    }
 public function getPekerjaanById($id_pekerjaan){
     return $this->db->get_where('tabel_pekerjaan', ['id_pekerjaan'=> $id_pekerjaan])->row_array();
 }   
 public function ubahDataPekerjaan()
    {
        $data = [
            "nama_mandor"=> $this->input->post('nama_mandor', true)
        ];
        $this->db->where('id_mandor', $this->input->post('id'));
         $this->db->update('tabel_mandor', $data);
    }
    
    //pupuk
    public function getAllPupuk()
    {
        return $this->db->get('tabel_pupuk')->result_array();
    }
   
    public function tambahInputBudidaya()
    {
        $data = [
            "tanggal"=> $this->input->post('tanggal', true),
            "id_mandor"=> $this->input->post('id_mandor', true),
            "id_kebun"=> $this->input->post('id_kebun', true),
            "id_plan"=> $this->input->post('plan', true),
            "id_pekerjaan"=> $this->input->post('id_pekerjaan', true),
            "biaya_pekerja_sopir"=> $this->input->post('hargatot', true),
            "biaya_pupuk"=> $this->input->post('biaya_real', true),
            "total_biaya"=> $this->input->post('output_total_biaya', true),
            "biaya_ha"=> $this->input->post('output_biaya_ha', true),
            "konsumsi_ha"=> $this->input->post('output_konsumsi_pupuk_ha', true)
        
        ];
         $this->db->insert('tabel_kegiatan', $data);
    }


    public function getAllHasil()
    {
        $this->db->select('*');
        $query = $this->db->from('tabel_kegiatan');
$this->db->join('tabel_mandor', 'tabel_kegiatan.id_mandor=tabel_mandor.id_mandor');
$this->db->join('tabel_plan', 'tabel_kegiatan.id_plan=tabel_plan.id_plan');
$this->db->join('tabel_pekerjaan', 'tabel_kegiatan.id_pekerjaan=tabel_pekerjaan.id_pekerjaan');
$this->db->join('tabel_kebun', 'tabel_kegiatan.id_kebun=tabel_kebun.id_kebun');
$query = $this->db->get();

        return $query;
    }
    // public function tambahDataPekerjaan()
    // {
    //     $data = [
    //         "nama_pekerjaan"=> $this->input->post('nama_pekerjaan', true)
    //     ];
    //      $this->db->insert('tabel_pekerjaan', $data);
    // }
    // public function hapusPekerjaan($id_pekerjaan)
    // {
       
    //     // $this->db->where('id_pekerjaan', $id_pekerjaan); 
    //     $this->db->delete('tabel_pekerjaan', ['id_pekerjaan'=>$id_pekerjaan]);
    // }
    // public function getPekerjaanById($id_pekerjaan){
    //  return $this->db->get_where('tabel_pekerjaan', ['id_pekerjaan'=> $id_pekerjaan])->row_array();
    // }   
    // public function ubahDataPekerjaan()
    // {
    //     $data = [
    //         "nama_mandor"=> $this->input->post('nama_mandor', true)
    //     ];
    //     $this->db->where('id_mandor', $this->input->post('id'));
    //      $this->db->update('tabel_mandor', $data);
    // }
    public 

    //tanda
    
    function getjoin($tabel, $tabel1, $join)
    {
        return $this->db->from($tabel)->join($tabel1, $join)->get()->result();
    }
    function getjoinfilter($tabel, $tabel1, $join, $where)
    {
        return $this->db->from($tabel)->join($tabel1, $join)->where($where)->get()->result();
    }
    function getwhere($tabel, $where)
    {
        return $this->db->get_where($tabel, $where)->result();
    }
    
    
    function multiinsert($tabel, $data)
    {
        return $this->db->insert_batch($data);
    }
    function getarray($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }
    function search($tabel, $column, $keyword)
    {
        return $this->db->like($column, $keyword)->get($tabel)->result();
    }
    function total_record($tabel)
    {
        $this->db->from($tabel);
        return $this->db->count_all_results();
    }
    function total_row($tabel, $where)
    {
        $this->db->from($tabel)->where($where);
        return $this->db->count_all_results();
    }
    //    tampilkan dengan limit
    function user_limit($limit, $start = 0)
    {
        $this->db->order_by('nama', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('dummy')->result_array();
    }
    function bagi($limit, $start = 0, $where)
    {
        $this->db->limit($limit, $start);
        return $this->db->from('detail_penjualan')->join('barang', 'detail_penjualan.kode_barang=barang.kode_barang')->where($where)->get()->result_array();
    }
}

?>