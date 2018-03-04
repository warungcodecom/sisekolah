<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelajaran extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_bid');
     if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }
    function index(){
        $data=array(
            'data' => $this->m_bid->data_bid()
        );
          $this->template->display('bidang_keahlian/view',$data);
    }
    function tambah(){
        $data = array(
            'nama'      => $this->input->post('nama'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->m_bid->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('bid_keahlian');
    }
    function ubah(){
        $id = $this->input->post('id');
        $data = array(
             'nama'     => $this->input->post('nama'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->m_bid->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('bid_keahlian');
    }
    function hapus($id){
       
        $this->db->where('id_bid',$id);
        $this->db->delete('tb_bidkeahlian');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('bid_keahlian');
    
    }
}