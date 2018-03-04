<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('m_menu');
        $this->load->model('m_role');
       if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
    }

   function index(){
         $link=$this->uri->segment(1);
        $data=array(
            'data' => $this->m_menu->data_menu(),
            'menus'=>$this->m_menu->data_kategori(),
            'roles'=>$this->m_role->data_role(),
            'dat'=>$this->m_menu->cek_akses($link),
            'title' => 'Menu Aplikasi'
        );
          $this->template->display('menu/view',$data);
    }


    function tambah() {

            $data   =   array( 'nama_menu' =>  $_POST['nama'],
                                'link'      =>  $_POST['link'],
                                'icon'      =>  $_POST['icon'],
                                'kat_menu'  =>  $_POST['kat_menu']

                            );
           $this->m_menu->tambah($data);
           $this->session->set_flashdata('notif', "
           <script type='text/javascript'>
             setTimeout(function () {
             swal({
               title: 'Berhasil !',
               text:  'Data  Berhasil ditambah !',
               type: 'success',
               timer: 3000,
               showConfirmButton: true
             });
             },10);

           </script>");
        redirect('menu');
    }


    function ubah()
    {
        $id = $this->input->post('id');
            $data   =   array(  'nama_menu' =>  $_POST['nama'],
                                'link'      =>  $_POST['link'],
                                'icon'      =>  $_POST['icon'],
                                'kat_menu'  =>  $_POST['kat_menu']
                            );

        $this->m_menu->ubah($data,$id);
        $this->session->set_flashdata('notif', "
        <script type='text/javascript'>
          setTimeout(function () {
          swal({
            title: 'Berhasil !',
            text:  'Data  Berhasil diubah !',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
          });
          },10);

        </script>");
        redirect('menu');
    }


    function delete_data($id){
		$this->db->where('id_menu',$id);
		$this->db->delete('tb_menu');
    $this->session->set_flashdata('notif', "
    <script type='text/javascript'>
      setTimeout(function () {
      swal({
        title: 'Berhasil !',
        text:  'Data  Berhasil dihapus !',
        type: 'success',
        timer: 3000,
        showConfirmButton: true
      });
      },10);

    </script>");
       	redirect('menu');
    }
}
