<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kom extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_kom(){
        $query = $this->db->get('tb_komkeahlian');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_komkeahlian', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_kom',$id);
        $this->db->update('tb_komkeahlian', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_kom", $id);
        $this->db->delete("tb_komkeahlian");
    }
}