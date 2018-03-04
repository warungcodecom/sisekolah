<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          $this->load->library('user_agent');
      if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
}
    public function index() {
      $data=array(
          'title' => 'Dashboard'
      );
        $this->template->display('dashboard',$data);
    }
    function profile() {
        $this->db->order_by('id_status', 'DESC');
         $id_user=$this->session->userdata('u_id');
   $data['record'] = $this->db->get_where('status', array('id_user'=>$id_user))->result();
   $this->template->display('user/profile',$data);

    }



}
