<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Group_menu extends CI_Controller{

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
             'data' => $this->m_menu->data_menu_join_group(),
             'menu'=>$this->m_menu->data_menu(),
             'roles'=>$this->m_role->data_role(),
             'dat'=>$this->m_menu->cek_akses($link),
             'title' => 'Group Menu'
         );
           $this->template->display('menu/group_menu',$data);
     }
       function tambah() {
  if(isset($_POST['submit'])) {
      $add_data=$_POST['add_data'];
      $edit_data=$_POST['edit_data'];
      $delete_data=$_POST['delete_data'];
      $akses_data=$_POST['akses_data'];
      if($add_data==""){
      $add_data="0";
      }
      if($edit_data==""){
      $edit_data="0";
      }
      if($delete_data==""){
      $delete_data="0";
      }
      if($akses_data==""){
      $akses_data="0";
      }

            $data   =   array( 'id_menu' =>  $_POST['id_menu'],
                                'id_role'      =>  $_POST['id_role'],
                                'akses'      =>  $akses_data,
                                'add'  =>  $add_data,
                                'edit' => $edit_data,
                                'delete' => $delete_data

                            );
           $this->m_menu->tambah_group($data);
           $this->session->set_flashdata('notif', "
           <script type='text/javascript'>
             setTimeout(function () {
             swal({
               title: 'Berhasil !',
               text:  'Data Berhasil ditambahkan !',
               type: 'success',
               timer: 3000,
               showConfirmButton: true
             });
             },10);

           </script>");
      redirect('group_menu');
    }else{
    redirect('dashboard','refresh');
            }
        }
        function edit_data()
        {
          if(isset($_POST['submit'])) {
              $add_data=$_POST['add_data'];
              $edit_data=$_POST['edit_data'];
              $delete_data=$_POST['delete_data'];
              $akses_data=$_POST['akses_data'];
              if($add_data==""){
              $add_data="0";
              }
              if($edit_data==""){
              $edit_data="0";
              }
              if($delete_data==""){
              $delete_data="0";
              }
              if($akses_data==""){
              $akses_data="0";
              }
            $id = $this->input->post('id');
            $data   =   array( 'id_menu' =>  $_POST['id_menu'],
                                'id_role'      =>  $_POST['id_role'],
                                'akses'      =>  $akses_data,
                                'add'  =>  $add_data,
                                'edit' => $edit_data,
                                'delete' => $delete_data

                            );

            $this->m_menu->ubah_group_menu($data,$id);
            $this->session->set_flashdata('notif', "
            <script type='text/javascript'>
              setTimeout(function () {
              swal({
                title: 'Berhasil !',
                text:  'Data Berhasil diubah !',
                type: 'success',
                timer: 3000,
                showConfirmButton: true
              });
              },10);

            </script>");
       redirect('group_menu');
     }else{
     redirect('dashboard','refresh');
             }
        }
  function delete_data($id){
        $this->db->where('id',$id);
        $this->db->delete('group_menu');
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
            redirect('group_menu');
        }
    function get_menu_role(){
      $id=$_POST['id'];
      $data=$this->m_menu->get_menu_json($id);

      $query=array();
    foreach ($data as $key) {
$query[]=$key->id_menu;
    }
      $this->db->where_not_in('id_menu',$query);
      $this->db->from('tb_menu');
      $query2=$this->db->get()->result();
      foreach ($query2 as $k) {

        echo "<option value='$k->id_menu'";
        echo">$k->nama_menu</option>";
                }


        }
        function get_json()
        {
          $data=$this->m_menu->get_menu_json();

          $query=array();
        foreach ($data as $key) {
$query[]=$key->id_menu;
        }
          $this->db->where_not_in('id_menu',$query);
          $this->db->from('tb_menu');
          $query2=$this->db->get()->result();

          echo json_encode($query2);
        }

}
