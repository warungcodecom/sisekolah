<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
         $this->load->library('user_agent');
        $this->load->model('m_user');
        $this->load->model('m_login');
        date_default_timezone_set('Asia/Jakarta');
       
        
    }
    function index() {
        $this->load->view('login');
    }

     public function proses()
  {
    $this->form_validation->set_rules('username','username','trim|required|xss_clean|max_length[128]');
    $this->form_validation->set_rules('password','password','required|max_length[20]');
    if($this->form_validation->run() == FALSE)
    {
       $this->load->view('login');
    }
    else
    {
       if($this->m_login->cek()->num_rows()==1)
       {
                     // hash verifikasi
         $secure=$this->m_login->cek()->row();
         if(hash_verified($this->input->post('password'),$secure->u_paswd))
         {
          if($secure->activate_login==0){
            $this->session->set_flashdata('result_login','Akun Anda belum akti atau di nonaktifkan silahkan hubungi Admin');
          redirect('login');
          }
           $sess_data['u_id'] = $secure->u_id;
                    
                    $sess_data['u_name'] = $secure->u_name;
                    $sess_data['role'] = $secure->role;
                    $sess_data['photo'] = $secure->photo;
                    $this->session->set_userdata($sess_data);
          
            $u_id=$secure->u_id;

if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}



            $data   =   array(  'create_login' =>  date('Y-m-d H:i:s')
                            );
            $this->db->where('u_id',$u_id);
            $this->db->update('user',$data);
            $update   =   array(  'id_user'=>$u_id,
'ip_user'=>$this->input->ip_address(),
'browser'=>$agent,
'os'=>$this->agent->platform(),
'tanggal'=>date('Y-m-d H:i:s'),
'agent'=>$this->agent->agent_string(),
'kota'=>$u_id,
'negara'=>$u_id
                            );



           
            $this->db->insert('history_user',$update);
            redirect('dashboard','refresh');
        }else{
          $this->session->set_flashdata('result_login','Password invalid');
          redirect('login');
      }
      
  }else{
   $this->session->set_flashdata('result_login','Username tidak terdaftar');
   redirect('login');
}
}

}

 
}

