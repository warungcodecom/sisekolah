<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kom_keahlian extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_prog');
        $this->load->model('m_kom');
        $this->load->model('m_bid');
       if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }
    function index(){
        $data=array(
            'data'=> $this->m_kom->data_kom(),
            'prog' => $this->m_prog->data_prog(),
            'bid'=>$this->m_bid->data_bid()
        );
          $this->template->display('kompetensi_keahlian/view',$data);
    }
    function tambah(){
        $data = array(
            'nama'      => $this->input->post('nama'),
            'keterangan'    => $this->input->post('keterangan'),
            'id_bid'=>$this->input->post('id_bid'),
            'id_prog'=>$this->input->post('id_prog')
        );
        $this->m_kom->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kom_keahlian');
    }
    function ubah(){
        $id = $this->input->post('id');
        $data = array(
             'nama'     => $this->input->post('nama'),
            'keterangan'    => $this->input->post('keterangan'),
             'id_bid'=>$this->input->post('id_bid'),
            'id_prog'=>$this->input->post('id_prog')

        );
        $this->m_kom->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kom_keahlian');
    }
    function hapus($id){
       
        $this->db->where('id_komd',$id);
        $this->db->delete('tb_komkeahlian');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kom_keahlian');
    
    }
}