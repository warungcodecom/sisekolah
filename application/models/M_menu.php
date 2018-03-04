<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_menu extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_menu(){
        $query = $this->db->get('tb_menu');
        return $query->result();
    }
    function cek_akses($link){
 $this->db->select('*');
     $this->db->from('tb_menu');
      $this->db->where('tb_menu.link',$link);
     $this->db->join('group_menu','group_menu.id_menu=tb_menu.id_menu');
     $this->db->where('id_role',$this->session->userdata('role'));

     $querys=$this->db->get();
     $dat=$querys->row();
     return $dat;
    }
    function data_menu_join_group(){
    $this->db->select('*');
     $this->db->from('group_menu');
     $this->db->order_by('tb_role.name','asc');
     $this->db->join('tb_menu','tb_menu.id_menu=group_menu.id_menu');
     $this->db->join('tb_role','tb_role.name=group_menu.id_role');
     $querys=$this->db->get();
    return $querys->result();
    }
    function data_group_menu(){
        $query = $this->db->get('group_menu');
        return $query->result();
    }
    function tambah($data){
        $this->db->insert('tb_menu', $data);
        return TRUE;
    }
    function tambah_group($data){
        $this->db->insert('group_menu', $data);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_menu',$id);
        $this->db->update('tb_menu', $data);
        return TRUE;
    }
    function ubah_group_menu($data, $id){
        $this->db->where('id',$id);
        $this->db->update('group_menu', $data);
        return TRUE;
    }
    function data_kategori(){
       $query = $this->db->get_where('tb_menu', array('kat_menu' =>0));
       return $query->result();
     }
     function data_role(){
        $query = $this->db->get('tb_role');
        return $query->result();
    }
    function get_menu_role_m($id){
      #$this->db->where("id_menu NOT IN('SELECT id_menu FROM group_menu WHERE id_role='$id'')");
   #return $this->db->get('tb_menu')->result();
      $query = $this->db->get('tb_menu');
      return $query->result();

    }
    function get_menu_json($id){
      $this->db->select('id_menu');
      $this->db->from('group_menu');
      $this->db->where('id_role',$id);
      $data=$this->db->get();
   return $data->result();

    }
}
