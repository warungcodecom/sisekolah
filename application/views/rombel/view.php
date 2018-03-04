<section class="content-header">
    <h1>
       Rombel
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Data</a></li>
        <li class="active">Rombel</li>
    </ol>
</section>
<section class="content">   

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Rombel</h3> <div class="pull-right"> <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah</a>
            </div>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                 <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                 <th>Rombel</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Ruangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
             $no=1;

             foreach ($data as $r){    
                                                
               echo"
                 <tr>
                 <td>$no</td>
                 <td>".$r->nama_rombel."</td>
                 <td>".$r->kelas."</td>
                 ";
                  $query = $this->db->query("SELECT * FROM tb_komkeahlian WHERE id_kom=$r->id_kom");$query1 = $this->db->query("SELECT * FROM tb_ruangan WHERE id_ruangan=$r->id_ruangan");

foreach ($query->result() as $s){

                  echo"<td>".$s->nama."</td>";
                  
                 }
                 foreach ($query1->result() as $s){

                  echo"<td>".$s->nama_ruangan."</td>";
                  
                 }
                
                 ?>
                  <td>
                  <div class='btn-group'>
 <a 
                            href="javascript:;"
                            
                            
                            data-toggle="modal" data-target="#edit-data<?php echo "$r->id_rombel"; ?>">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                        </a>
<?php                     echo""  . anchor('rombel/hapus/' . $r->id_rombel,  ' <button type="button" class="btn btn-danger">Delete</button>', array('onclick' => "return confirm('Data Akan di Hapus?')")) ."" ;

               $no++;
             }
             ?>
                
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    
    
  
         
  <!-- Modal Tambah -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Tambah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('rombel/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Rombel</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama Role" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="kelas" placeholder="Tuliskan Kelas Ex:I,X,XI" required>
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-2 col-sm-2 control-label">Jurusan</label>
                              <div class="col-lg-10">
                            <select name='id_kom' class="form-control ">
                            <option value=''>Jurusan</option>
                                <?php
                                if (!empty($kom)) {
                                    foreach ($kom as $r) {
                                        echo "<option value=".$r->id_kom.">".$r->nama."</option>";                                        
                                    }
                                }
                                ?> 
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-2 col-sm-2 control-label">Ruangan</label>
                              <div class="col-lg-10">
                            <select name='id_ruangan' class="form-control ">
                            <option value=''>Ruangan</option>
                                <?php
                                if (!empty($ruangan)) {
                                    foreach ($ruangan as $r) {
                                        echo "<option value=".$r->id_ruangan.">".$r->nama_ruangan."</option>";                                        
                                    }
                                }
                                ?> 
                            </select>
                          </div>
                        </div>    
                      
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>

  <!-- END Modal Tambah -->
  <!-- Modal Ubah -->
   <?php
             $no=1;

             foreach ($data as $r){    
              ?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $r->id_rombel;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('rombel/ubah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Rombel</label>
                            <div class="col-lg-10">
                              <input type="hidden" id="id" name="id" value="<?php echo "$r->id_rombel"; ?>" required>
                                <input type="text" class="form-control"  name="nama" placeholder="Tuliskan Nama Rombel" value="<?php echo "$r->nama_rombel"; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  name="kelas" placeholder="Tuliskan Kelas" value="<?php echo "$r->kelas"; ?>">
                            </div>
                        </div>
                         <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Jurusan</label>
                              <div class="col-lg-10">
                            <select name='id_kom' class="form-control ">
                            <option value=''>Jurusan</option>
                                <?php
                                    foreach ($kom as $ka) {
                                        echo "<option value='$ka->id_kom'";
                                        echo $r->id_kom == $ka->id_kom ? 'selected' : '';
                                        echo">$ka->nama</option>";
                                    }
                                    ?>  
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-2 col-sm-2 control-label">Ruangan</label>
                              <div class="col-lg-10">
                            <select name='id_ruangan' class="form-control ">
                            <option value=''>Ruangan</option>
                           
                                <?php
                                    foreach ($ruangan as $ru) {
                                        echo "<option value='$ru->id_ruangan'";
                                        echo $r->id_ruangan == $ru->id_ruangan ? 'selected' : '';
                                        echo">$ru->nama_ruangan</option>";
                                    }
                                    ?>  
                            </select>
                          </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>

  <?php
}?>

  <!-- END Modal Ubah -->
  

        
</section><!-- /.content -->
