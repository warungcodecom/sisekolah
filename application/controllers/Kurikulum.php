<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kurikulum extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_kurikulum');
       if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }
    function index(){
        $data=array(
            'data' => $this->m_kurikulum->data_kurikulum()
        );
          $this->template->display('kurikulum/view',$data);
    }
    function tambah(){
        $data = array(
            'nama_kurikulum'      => $this->input->post('nama'),
            'is_aktif'    => $this->input->post('aktif')
        );
        $this->m_kurikulum->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kurikulum');
    }
    function ubah(){
        $id = $this->input->post('id');
        $data = array(
             'nama_kurikulum'      => $this->input->post('nama'),
            'is_aktif'    => $this->input->post('aktif')
        );
        $this->m_kurikulum->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kurikulum');
    }
    function hapus($id){
       
        $this->db->where('id_kurikulum',$id);
        $this->db->delete('tb_kurikulum');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kurikulum');
    
    }
}