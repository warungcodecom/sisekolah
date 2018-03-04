<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kurikulum extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_kurikulum(){
        $query = $this->db->get('tb_kurikulum');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_kurikulum', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_kurikulum',$id);
        $this->db->update('tb_kurikulum', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_kurikulum", $id);
        $this->db->delete("tb_kurikulum");
    }
}