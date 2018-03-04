<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        date_default_timezone_set('Asia/Jakarta');
        
    }
public function index() {
        $u_id=$this->session->userdata('u_id');
        $data   =   array(  'last_login' =>  date('Y-m-d H:i:s')
                            );
            $this->db->where('u_id',$u_id);
            $this->db->update('user',$data);
    $this->session->unset_userdata('isLog');
$this->session->unset_userdata('u_id');
$this->session->unset_userdata('nama');
$this->session->unset_userdata('u_name');$this->session->unset_userdata('photo');
$this->session->unset_userdata('role');

$this->session->set_flashdata('result_login', 'Logut berhasil.');
redirect('login');
    }
}