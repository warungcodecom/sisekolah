<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_ruangan extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_ruangan(){
        $query = $this->db->get('tb_ruangan');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_ruangan', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_ruangan',$id);
        $this->db->update('tb_ruangan', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_ruangan", $id);
        $this->db->delete("tb_ruangan");
    }
}