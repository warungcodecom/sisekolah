<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_agama extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_agama(){
        $query = $this->db->get('tb_agama');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_agama', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_agama',$id);
        $this->db->update('tb_agama', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_agama", $id);
        $this->db->delete("tb_agama");
    }
}