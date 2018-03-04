<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_rombel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_rombel(){
        $query = $this->db->get('tbl_rombel');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tbl_rombel', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_rombel',$id);
        $this->db->update('tbl_rombel', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_rombel", $id);
        $this->db->delete("tbl_rombel");
    }
}