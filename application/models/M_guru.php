<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_guru extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function data_guru(){
        $query = $this->db->get('tb_guru');
        return $query->result();
    }
    function tambah(){
        $config['upload_path'] = './upload/guru/';
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
        $data = array(
            'nip' =>$this->input->post('nip'),
'nuptk'=>$this->input->post('nuptk'),
'npwp'=>$this->input->post('npwp'),
'nama'=>$this->input->post('nama'),
'tempat_lahir'=>$this->input->post('tempat_lahir'),
'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
'jk'=>$this->input->post('jk'),
'status'=>$this->input->post('status'),
'gol_darah'=>$this->input->post('gol_darah'),
'agama'=>$this->input->post('agama'),
'no_hp'=>$this->input->post('no_hp'),
'alamat'=>$this->input->post('alamat'),
'foto'=>$gambar
        );
        $this->db->insert('tb_guru', $data);
        $akun=array('nama'=>$this->input->post('nama'),
            'u_name'=>$this->input->post('nip'),
            'u_paswd'=>get_hash('guru123'),
            'role'=>'Guru',
            'photo'=>$gambar,
            'id_user'=>$this->input->post('nip'),
            'create_akun'=>date('Y-m-d H:i:s'),
            'create_user'=> $this->session->userdata('u_id')
    );
        $this->db->insert('user', $akun);
        return TRUE;
    }
    function ubah($data, $id){
        $this->db->where('id_guru',$id);
        $this->db->update('tb_guru', $data);
        return TRUE;
    }
    function hapus($id) {
        $this->db->where("id_guru", $id);
        $this->db->delete("tb_guru");
    }
}