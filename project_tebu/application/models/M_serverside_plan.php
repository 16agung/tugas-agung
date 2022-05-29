<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class M_serverside_plan extends CI_Model{
  var  $table = 'detail_riwayat';
   
    var $column_order = array(null, 'tanggal',  'nama_mandor', 'nama_plan'); //field yang ada di table user
   
    var $column_search = array('tanggal', 'nama_mandor', 'nama_plan'); //field yang diizin untuk pencarian 
 var    $order = array('tanggal' => 'asc'); // default order

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
private function _get_datatables_query(){
    $this->db->from($this->table);
        $this->db->join('tabel_pekerjaan', 'detail_riwayat.id_pekerjaan=tabel_pekerjaan.id_pekerjaan');
       $this->db->join('riwayat', 'riwayat.id_riwayat=detail_riwayat.id_riwayat');
        $this->db->join('tabel_mandor', 'tabel_mandor.id_mandor=detail_riwayat.id_mandor');
        $this->db->join('tabel_kebun', 'tabel_kebun.id_kebun=detail_riwayat.id_kebun');
         $this->db->join('tabel_plan', 'tabel_plan.id_plan=detail_riwayat.id_plan');
    $i = 0;

    foreach ($this->column_search as $item) // looping awal
    {
        if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
        {

            if ($i === 0) // looping awal
            {
                $this->db->group_start();
                $this->db->like($item, $_POST['search']['value']);
            } else {
                $this->db->or_like($item, $_POST['search']['value']);
            }

            if (count($this->column_search) - 1 == $i)
                $this->db->group_end();
        }
        $i++;
    }

    if (isset($_POST['order'])) {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}



   public function getDataTable()
    {
        
        $this->_get_datatables_query();

        if($_POST['length']!=-1){
            $this->db->limit($_POST['length'],$_POST['start']);
        }
        $query = $this->db->get();
        
        return $query->result();      
    }
function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 

    function getjoinfilter($where)
    {
       $this->db->select('*');
       $query   =  $this->db->from('detail_riwayat');
        // $this->db->join('tabel_plan', 'detail_riwayat.id_plan = tabel_plan.id_plan');
        $this->db->join('tabel_kebun', 'detail_riwayat.id_kebun = tabel_kebun.id_kebun','left');
        $this->db->join('tabel_pekerjaan', 'detail_riwayat.id_pekerjaan = tabel_pekerjaan.id_pekerjaan','left');
      
        $this->db->where($where) ; 
        $this->db->where(['id_plan'=> '1']) ; 
        $query = $this->db->get()->result();
        return $query;
    }
}
