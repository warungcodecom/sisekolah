<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rombel extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_rombel');
        $this->load->model('m_kom');
        $this->load->model('m_ruangan');
    if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }
    function index(){
        $data=array(
            'data'=> $this->m_rombel->data_rombel(),
            'kom' => $this->m_kom->data_kom(),
            'ruangan'=>$this->m_ruangan->data_ruangan()
        );
          $this->template->display('rombel/view',$data);
    }
    function tambah(){
        $data = array(
            'nama_rombel'      => $this->input->post('nama'),
            'kelas'    => $this->input->post('kelas'),
            'id_kom'=>$this->input->post('id_kom'),
            'id_ruangan'=>$this->input->post('id_ruangan')
        );
        $this->m_rombel->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('rombel');
    }
    function ubah(){
        $id = $this->input->post('id');
        $data = array(
             'nama_rombel'      => $this->input->post('nama'),
            'kelas'    => $this->input->post('kelas'),
            'id_kom'=>$this->input->post('id_kom'),
            'id_ruangan'=>$this->input->post('id_ruangan')

        );
        $this->m_rombel->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('rombel');
    }
    function hapus($id){
       
        $this->db->where('id_rombel',$id);
        $this->db->delete('tbl_rombel');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('rombel');
    
    }
}