<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller{

   function __construct(){
        parent::__construct();
        $this->load->model('m_daftar');
        $this->load->model('m_user');
      if (empty($this->session->userdata('u_name'))) {
         $this->session->set_flashdata('result_login','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }

    }

function index() {
    $data= array(   'record' => $this->m_user->semua(),
                    'roles' => $this->db->get('tb_role')->result() );

        $this->template->display('pengguna/view',$data);
  }

 //Tambah Data

function add_akun() {

  if(isset($_POST['submit'])) {
      $rol=$_POST['role'];
      $nip=$_POST['nip'];
      $name=$_POST['u_name'];
      $nmfile="foto_'".$name."'_'".date('Y-m-d')."'";
      $config['upload_path'] = './upload/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '5072';
      $config['max_width']  = '5000';
      $config['max_height']  = '5000';
      $config['file_name']=$nmfile;

      $this->upload->initialize($config);
  if($this->upload->do_upload('gambar')){
            $gbr=$this->upload->data();

            $data   =   array( 'u_id'=> $_POST['nip'],
                                'u_name'  =>  $_POST['u_name'],
                                'u_paswd' =>  get_hash($_POST['password']),
                                'role' => $_POST['role'],
                                'photo' => $gbr['file_name']
                            );
            $this->db->insert('user',$data);
            $config2['image_library']='gd2';
            $config2['source_image']=$this->upload->upload_path.$this->upload->file_name;
            $config2['new_image']='./upload/resize/';
            $config2['maintain_ratio']=TRUE;
            $config2['width']=100;
            $config2['height']=100;

            $this->load->library('image_lib',$config2);
            $this->image_lib->initialize($config2);
            if(!$this->image_lib->resize()){
              $this->session->set_flashdata('error',$this->image_lib->display_errors(","));
            }
                $this->session->set_flashdata('notif', "
                <script type='text/javascript'>
                  setTimeout(function () {
                  swal({
                    title: 'Berhasil !',
                    text:  'Data $name Berhasil di tambahakan !',
                    type: 'success',
                    timer: 3000,
                    showConfirmButton: true
                  });
                  },10);

                </script>");
                    redirect('user');
  }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert"> Data Gagal ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user/add');
        }
    }else{
            $data= array(   'record' => $this->m_user->semua(),
                    'roles' => $this->db->get('tb_role')->result() );
            $this->template->display('pengguna/tambah',$data);
        }
    }


    //Delete Data

    function delete_akun($id){
		$this->db->where('u_id',$id);
		$this->db->delete('user');

       	redirect('user');
    }

    function aktivasi_akun(){
        $aktifasi=$this->input->post('aktifasi');
        $id=$this->input->post('id');
        $data   = array(  'activate_login' =>  $aktifasi);
        $this->db->where('u_id',$id);
        $query= $this->db->update('user',$data);
      if($aktifasi==0){
        $this->session->set_flashdata('notif', "
            <script type='text/javascript'>
              setTimeout(function () {
              swal({
                    title: 'Berhasil !',
                    text:  'Data Berhasil dinonaktifkan  !',
                    type: 'success',
                    timer: 3000,
                    showConfirmButton: true
                  });
              },10);

            </script>");

        }elseif ($aktifasi==1) {
             $this->session->set_flashdata('notif', "
                <script type='text/javascript'>
                  setTimeout(function () {
                  swal({
                        title: 'Berhasil !',
                        text:  'Data Berhasil diaktifkan !',
                        type: 'success',
                        timer: 3000,
                        showConfirmButton: true
                       });
                      },10);

                      </script>");
        }

            redirect('user');

  }

  //cek Username

function check_username(){

      $username=$this->input->post('username');
  if($this->m_user->cek_username($username)){
   echo 'no';
  }
  else {
   echo 'yes';
  }

}

//cek Nip

function check_nip(){

      $nip=$this->input->post('nip');
  if($this->m_user->cek_nip($nip)){
   echo 'no';
  }
  else {
   echo 'yes';
  }

}

//

function filter_data_akun(){
    $role=$this->input->post('filter_roles');
    $status=$this->input->post('filter_status');
   if($role=="" && $status=="" ){
        $semua=  $this->db->get('user')->result();

          foreach ($semua as $r) {   ?>
          <tr>
            <td><?php echo $r->u_id;?></td>
            <td><img src="<?php echo base_url();?>upload/resize/<?php echo $r->photo;?>">
            <td><?php echo $r->u_name;?></td>
            <td><?php echo $r->role;?></td>
            <td>
<a data-toggle="modal" data-target="#edit-data<?php echo "$r->u_id"; ?>">
  <button  data-toggle="modal" data-target="#ubah-data"<?php if($r->activate_login==0){      ?> class="btn btn-success"><i class="fa fa-unlock"></i> Aktifkan<?php  }elseif($r->activate_login==1){?> class="btn btn-danger"><i class="fa fa-lock"></i> Nonaktifkan<?php } ?></button>
</a>
 <button onclick="validate(this)"  value="<?php echo $r->u_id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </td>
          </tr>
   <?php
                               }
   }else{
      $role=$this->input->post('filter_roles');
      $status=$this->input->post('filter_status');

        if($role!='' && $status==''){
             $this->db->where('role',$role);
        }elseif($role=='' && $status!=''){
              $this->db->where('activate_login',$status);
        }elseif($role !='' && $status !=''){
              $this->db->where('role',$role);
              $this->db->where('activate_login',$status);
        }
              $data = $this->db->get('user');
    foreach ($data->result() as $r) {  ?>
      <tr>
            <td><?php echo $r->u_id;?></td>
            <td><img src="<?php echo base_url();?>upload/resize/<?php echo $r->photo;?>">
            <td><?php echo $r->u_name;?></td>
            <td><?php echo $r->role;?></td>
            <td>
<a data-toggle="modal" data-target="#edit-data<?php echo "$r->u_id"; ?>">
  <button  data-toggle="modal" data-target="#ubah-data"<?php if($r->activate_login==0){      ?> class="btn btn-success"><i class="fa fa-unlock"></i> Aktifkan<?php  }elseif($r->activate_login==1){?> class="btn btn-danger"><i class="fa fa-lock"></i> Nonaktifkan<?php } ?></button>
</a>
 <button onclick="validate(this)"  value="<?php echo $r->u_id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </td>
          </tr>
                  <?php

                  }

                }

            }
}
