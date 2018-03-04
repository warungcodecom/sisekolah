<section class="content-header">
    <h1>
       Guru
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Data</a></li>
        <li class="active">Guru</li>
    </ol>
</section>
<section class="content">   

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Guru</h3> <div class="pull-right"> <a href="<?php base_url();?>guru/tambah" class="btn btn-primary">Tambah</a>
            </div>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                 <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>NIP</th>
                 <th>FOTO</th>
                  <th>Nama Lengkap</th>
                  <th>TTL</th>
                  <th>jk</th>
                  <th>No HP</th>
                  <?php 
                  $role =$this->session->userdata('role');
        
    
                $main = $this->db->get_where('tb_menu', ['role' => $role]);

                foreach ($main->result() as $m) {
                       if($m->edit_data =="on" || $m->delete_data=="on"){
                        echo" <th>Action</th>";
                       } 
               }
                 ?>
                </tr>
                </thead>
                <tbody>
               <?php
             $no=1;

             foreach ($data as $r){    
                                                
               echo"
                 <tr>
                 <td>".$r->nip."</td>
                 <td>";?><img src='<?php echo base_url();?>upload/guru/<?php echo $r->foto; ?>' width='70px' height='70px'></td><?php
                 echo"
                 <td>".$r->nama."</td>
                 <td>".$r->tempat_lahir.", ". $r->tanggal_lahir."</td>
                 <td>".$r->jk."</td>
                 <td>".$r->no_hp."</td>                         
                 ";?>
                <?php 
                 $main = $this->db->get_where('tb_menu', ['role' => $role]);
                  foreach ($main->result() as $m) {
                       if($m->edit_data =="on" || $m->delete_data=="on"){
                       ?>
                 <td>
                  <div class='btn-group'>
 <a 
                            href="javascript:;"
                           
                            data-toggle="modal" data-target="#edit-data<?php echo "$r->id_guru"; ?>">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                        </a>
<?php                     echo""  . anchor('guru/hapus/' . $r->nip,  ' <button type="button" class="btn btn-danger">Delete</button>', array('onclick' => "return confirm('Data Akan di Hapus?')")) ."";
echo"</td>";
      } 
               }
               $no++;
             }
             ?>
                
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    
    
  
         
  

        
</section><!-- /.content -->
