 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(''); ?>/upload/resize/<?php echo $this->session->userdata('photo'); ?>"  alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
          $role=$this->session->userdata('role');
          $u_id=$this->session->userdata('u_id');
          if($role=='Guru'){
               $guru=$this->db->get_where('tb_guru',array('nip'=> $u_id))->result();


foreach ($guru as $key) {
 echo"<p>".$key->nama."</p>";   # code...
}

          }elseif($role=='Siswa'){
          $siswa=$this->db->get_where('tb_siswa',array('nis'=> $u_id))->result();


foreach ($siswa as $key) {
 echo"<p>".$key->nama."</p>";   # code...
}
          }elseif($role=='Ortu'){
          $ortu=$this->db->get_where('tb_ortu',array('id_ortu'=> $u_id))->result();


foreach ($ortu as $key) {
 echo"<p>".$key->nama."</p>";   # code...
}
          }else{

           $pegawai=$this->db->get_where('tb_pegawai',array('id_pegawai'=> $u_id))->result();


foreach ($pegawai as $key) {
 echo"<p>".$key->nama."</p>";   # code...
}




          }
          ?>
          <a href="<?php echo base_url('assets'); ?>/#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        $role =$this->session->userdata('role');
         $this->db->select('*');
     $this->db->from('tb_menu');

     $this->db->join('group_menu','group_menu.id_menu=tb_menu.id_menu');
     $this->db->order_by('nama_menu','asc');
          $this->db->where('tb_menu.kat_menu',0);
     $this->db->where('group_menu.id_role',$role);

     $smain=$this->db->get()->result();


                foreach ($smain as $sm) {
                    // chek ada submenu atau tidak
                   $role =$this->session->userdata('role');
         $this->db->select('*');
     $this->db->from('tb_menu');
      $this->db->where('tb_menu.kat_menu',$sm->id_menu);
     $this->db->join('group_menu','group_menu.id_menu=tb_menu.id_menu');
     $this->db->where('group_menu.id_role',$role);

     $subs=$this->db->get();

                    if ($subs->num_rows() > 0) {
                        // buat menu + sub menu


                        echo '<li class="treeview"><a href="'.base_url("$sm->link").'" class="dropdown-toggle"><i class="' . $sm->icon . '"></i>
                                                         <span>' .$sm->nama_menu . '</span>
                                                         <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>';
                        echo "<ul class='treeview-menu'>";
                        foreach ($subs->result() as $s) {

                             echo '<li ><a href="'.base_url("$s->link").'"><i class="' . $s->icon . '"></i>' . $s->nama_menu. '</a></li>';


                        }
                        echo "</ul>";
                        echo '</li>';


                    } else {

                        echo '<li><a href="'.base_url("$sm->link").'"><i class="' . $sm->icon . ' fa-lg">
                                                         </i>  <span class="treeview">' . $sm->nama_menu . '</span></a></li>';

                      }
                    }


            ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
