<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sekolah extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('m_sekolah');
        $this->load->model('m_menu');
        $this->load->library(array('template','form_validation','pagination','upload'));
        $this->load->helper(array('form', 'url'));
      if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }

     function index(){
       $link=$this->uri->segment(1);
        $data=array(
            'data' => $this->m_sekolah->data_sekolah(),
            'dat'=>$this->m_menu->cek_akses($link),
            'title'=>'Sekolah'
        );
          $this->template->display('sekolah/view',$data);
    }
    function ubah()
    {
        if(isset($_POST['submit']))
        {
           //setting konfiguras upload image
                $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '2000';
        $config['max_height']  = '1024';

                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar=$_POST['logo'];
                }else{
                    $gambar=$this->upload->file_name;
                }



            $data   =  array(  'nama_sekolah'=>$_POST['nama_sekolah'],
'npsn'=>$_POST['npsn'],
'jenjang_pendidikan'=>$_POST['jenjang_pendidikan'],
'status_sekolah'=>$_POST['status_sekolah'],
'alamat'=>$_POST['alamat'],
'rt_rw'=>$_POST['rt_rw'],
'kode_pos'=>$_POST['kode_pos'],
'kelurahan'=>$_POST['kelurahan'],
'kecamatan'=>$_POST['kecamatan'],
'kota'=>$_POST['kota'],
'provinsi'=>$_POST['provinsi'],
'negara'=>$_POST['negara'],
'sk_sekolah'=>$_POST['sk_sekolah'],
'tanggal_sk'=>$_POST['tanggal_sk'],
'status_pemilikan'=>$_POST['status_pemilikan'],
'sk_izinop'=>$_POST['sk_izinop'],
'tanggal_skop'=>$_POST['tanggal_skop'],
'no_rek'=>$_POST['no_rek'],
'nama_bank'=>$_POST['nama_bank'],
'npwp'=>$_POST['npwp'],
'luas_tanah'=>$_POST['luas_tanah'],
'nomer_telepon'=>$_POST['nomer_telepon'],
'fax'=>$_POST['fax'],
'email'=>$_POST['email'],
'web'=>$_POST['web'],
'akreditasi'=>$_POST['akreditasi'],
'kurikulum'=>$_POST['kurikulum'],
'tanggal_edit'=>date('Y-m-d'),
'logo'=>$gambar
                            );

            $this->db->where('id',$_POST['id']);
            $this->db->update('tb_sekolah',$data);
             $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('sekolah');
        }
        else {
          $link=$this->uri->segment(1);
            $id= $this->uri->segment(3);
            $data=array('data'=>  $this->db->get_where('tb_sekolah',array('id'=> $id))->result(),
                        'jenjang'=>  $this->db->get('tb_jenjang')->result(),
                        'kurikulum'=>  $this->db->get('tb_kurikulum')->result(),
                        'dat'=>$this->m_menu->cek_akses($link),
                        'title' => 'Dashboard');
            //$data['username']=$this->db->get_where('user', array('u_id' =>0))->result();
            $this->template->display('sekolah/ubah',$data);
        }
    }
}
