<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_role extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_role(){
        $query = $this->db->get('tb_role');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_role', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_role',$id);
        $this->db->update('tb_role', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_role", $id);
        $this->db->delete("tb_role");
    }
}