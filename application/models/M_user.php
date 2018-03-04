<?php

class M_user extends CI_Model {

    private $table = "user";


    function semua() {
      $hasil=$this->db->query("SELECT * FROM user");
           return $hasil->result();
    }


     public function update(){
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
                                'u_name'  =>  $_POST['u_name'],
                                'u_paswd' =>  get_hash($_POST['password']),
                                'role' => $_POST['role'],
                                'photo' => $gambar
                            );
        return $this->db->update('user',$data);
    }
    public function cek_username(){
        $username=$this->input->post('username');
     $this->db->where('u_name' ,$username);
  $query = $this->db->get('user');

  if($query->num_rows()>0){
   return true;
  }
  else {
   return false;
  }

    }
     public function cek_nip(){
        $nip=$this->input->post('nip');
     $this->db->where('u_id' ,$nip);
  $query = $this->db->get('user');

  if($query->num_rows()>0){
   return true;
  }
  else {
   return false;
  }

    }
    public function filter(){
        $role=$this->input->post('filter_roles');
     $this->db->where('role' ,$role);
  $query = $this->db->get('user');

 return $query;

}
}
