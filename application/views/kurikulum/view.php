<section class="content-header">
    <h1>
       Kurikulum
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Data</a></li>
        <li class="active">Kurikulum</li>
    </ol>
</section>
<section class="content">   

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kurikulum</h3> <div class="pull-right"> <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah</a>
            </div>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                 <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                  <th>Nama Kurikulum</th>
                  <th>Status</th>
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
                 <td>".$r->nama_kurikulum."</td>";
                 $status=$r->is_aktif;

                 if($status=="y"){
                 echo"<td>Aktif</td>"; 
                 }elseif($status=="n"){
                  echo"<td>Tidak Aktif</td>";

                 }
                     ?>                     
                 <td>
                  <div class='btn-group'>
 <a 
                            href="javascript:;"
                            
                            data-toggle="modal" data-target="#edit-data<?php echo "$r->id_kurikulum"; ?>">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                        </a>
<?php                     echo""  . anchor('kurikulum/hapus/' . $r->id_kurikulum,  ' <button type="button" class="btn btn-danger">Delete</button>', array('onclick' => "return confirm('Data Akan di Hapus?')")) ."" ;

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
              <form class="form-horizontal" action="<?php echo base_url('kurikulum/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Kurikulum</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama Role" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Status</label>
                            <div class="col-lg-10">
                              <select name="aktif" class="form-control">
                                <option value="y">Aktif</option>
                                <option value="n">Tidak Aktif</option>
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
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $r->id_kurikulum;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('kurikulum/ubah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Role</label>
                            <div class="col-lg-10">
                              <input type="hidden" id="id" name="id" value="<?php echo "$r->id_kurikulum"; ?>" required>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama Role" value="<?php echo "$r->nama_kurikulum"; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Status</label>
                            <div class="col-lg-10">
                             <select name="aktif" class="form-control">
                              <option value="y">Aktif</option>
                                <option value="n">Tidak Aktif</option>
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
