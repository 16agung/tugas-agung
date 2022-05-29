<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class M_crud extends CI_Model{
  

   
  function updatedata($tabel, $where, $data)
   {
       $this->db->update($tabel, $data, $where);
       return $this->db->affected_rows();
   }   
   function delete($tabel, $where)
   {
       $this->db->delete($tabel, $where);
       return $this->db->affected_rows();
    }

    function getarray($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }
    function getdata($tabel)
    {
        return $this->db->get($tabel)->result();
    }
    function insertdata($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }
    function getjoinfilter($tabel, $tabel1, $join, $where)
    {
        return $this->db->from($tabel)->join($tabel1, $join)->where($where)->get()->result();
    }
    function getjoinfilter2($where)
    {
       $this->db->select('*');
       $query   =  $this->db->from('detail_riwayat');
        $this->db->join('tabel_plan', 'detail_riwayat.id_plan = tabel_plan.id_plan');
        $this->db->join('tabel_kebun', 'detail_riwayat.id_kebun = tabel_kebun.id_kebun','left');
        $this->db->where($where); 
        $query = $this->db->get()->result();
        return $query;
    }
    function getwhere($tabel, $where)
    {
        return $this->db->get_where($tabel, $where)->get()->result();
    }
    
    function getjoin($tabel, $tabel1, $join)
    {
        return $this->db->from($tabel)->join($tabel1, $join)->get()->result();
    }

}
