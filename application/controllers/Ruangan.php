<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ruangan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_ruangan');
       if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }
    function index(){
        $data=array(
            'data' => $this->m_ruangan->data_ruangan()
        );
          $this->template->display('ruangan/view',$data);
    }
    function tambah(){
        $data = array(
            'nama_ruangan'      => $this->input->post('nama')            
        );
        $this->m_ruangan->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('ruangan');
    }
    function ubah(){
        $id = $this->input->post('id');
        $data = array(
             'nama_ruangan'     => $this->input->post('nama')
           
        );
        $this->m_ruangan->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('ruangan');
    }
    function hapus($id){
       
        $this->db->where('id_ruangan',$id);
        $this->db->delete('tb_ruangan');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('ruangan');
    
    }
}