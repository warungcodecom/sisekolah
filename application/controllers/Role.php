<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Role extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_role');
	 if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
	}
	function index(){
		$data=array(
			'data' => $this->m_role->data_role()
		);
		  $this->template->display('role/view',$data);
	}
	function tambah(){
        $data = array(
            'name'		=> $this->input->post('nama'),
            'keterangan'	=> $this->input->post('keterangan')
        );
        $this->m_role->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('role');
    }
    function ubah(){
    	$id = $this->input->post('id');
        $data = array(
             'name'     => $this->input->post('nama'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->m_role->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('role');
    }
    function hapus($id){
       
        $this->db->where('id_role',$id);
        $this->db->delete('tb_role');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('role');
    
    }
}