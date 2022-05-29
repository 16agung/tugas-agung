<?php

class M_riwayat extends CI_Model
{

    var $table = 'riwayat'; //nama tabel dari database
    var $column_order = array(null, 'nama_customer',  'alamat', 'tanggal_penjualan', 'total', 'bayar', 'kembali'); //field yang ada di table user
    var $column_search = array('nama_customer', 'alamat', 'tanggal_penjualan', 'total', 'bayar', 'kembali'); //field yang diizin untuk pencarian 
    var $order = array('id_riwayat' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($data)
    {

        $this->db->from($this->table)->where($data);

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

    function get_datatables($data)
    {
        $this->_get_datatables_query($data);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($data)
    {
        $this->_get_datatables_query($data);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($data)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results($data);
    }
}
