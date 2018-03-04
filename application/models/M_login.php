<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('u_name',$this->input->post('username'));
		return $this->db->get();
		
	}
	

}
