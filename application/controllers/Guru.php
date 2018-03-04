<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guru extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_guru');
        $this->load->model('m_agama');
      if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }
    function index(){
        $data=array(
            'data' => $this->m_guru->data_guru()
        );
          $this->template->display('guru/view',$data);
    }
    function tambah(){
       if(isset($_POST['submit'])){
 
        $this->m_guru->tambah();
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('guru');
    }else {
            $data=array('agama' => $this->m_agama->data_agama()  );           
            $this->template->display('guru/tambah',$data);
        }
    }
    function ubah(){
        $id = $this->input->post('id');
        $gambar_dulu=$this->input->post('gambar_dulu');
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '300';
        $config['max_width']  = '1000';
        $config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar=$gambar_dulu;
                }else{
                    $gambar=$this->upload->file_name;
                }
        $data = array(
            'nip' =>$this->input->post('nip'),
'nuptk'=>$this->input->post('nuptk'),
'npwp'=>$this->input->post('npwp'),
'tempat_lahir'=>$this->input->post('tempat'),
'tanggal lahir'=>$this->input->post('tanggal'),
'jk'=>$this->input->post('jk'),
'status'=>$this->input->post('status'),
'gol_darah'=>$this->input->post('gol_darah'),
'agama'=>$this->input->post('agama'),
'no_hp'=>$this->input->post('no_hp'),
'alamat'=>$this->input->post('alamat'),
'foto'=>$gambar
        );
        $this->m_guru->ubah($data,$id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('guru');
    }
    function hapus($id){
       $this->db->where('u_id',$id);
        $this->db->delete('user');
        $this->db->where('nip',$id);
        $this->db->delete('tb_guru');
         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('guru');
    
    }
}