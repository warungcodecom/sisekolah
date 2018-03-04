<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_sekolah extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_sekolah(){
        $query = $this->db->get('tb_sekolah');
        return $query->result();
    }
}