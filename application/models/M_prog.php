<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_prog extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_prog(){
        $query = $this->db->get('tb_progkehalian');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_progkehalian', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_prog',$id);
        $this->db->update('tb_progkehalian', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_prog", $id);
        $this->db->delete("tb_progkehalian");
    }
}