<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model {

	public function add(){
		       $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '300';
        $config['max_width']  = '1000';
        $config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="default_avatar.png";
                }else{
                    $gambar=$this->upload->file_name;
                }
            $data   =   array(  'nama' =>  $_POST['nama'],
                                'u_name'      =>  $_POST['u_name'],
                                'u_paswd'      =>  get_hash($_POST['password']),
                                'role' => $_POST['role'],
                                'photo' => $gambar
                            );
		return $this->db->insert('user',$data);
	}
	

}

/* End of file M_daftar.php */
/* Location: ./application/models/M_daftar.php */