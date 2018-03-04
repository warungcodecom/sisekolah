<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_bid extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_bid(){
        $query = $this->db->get('tb_bidkeahlian');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_bidkeahlian', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_bid',$id);
        $this->db->update('tb_bidkeahlian', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_bid", $id);
        $this->db->delete("tb_bidkeahlian");
    }
}