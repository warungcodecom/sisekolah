<section class="content-header">
    <h1>
        Role Aplikasi
        <small>Seting Role Aplikasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Role Aplikasi</li>
    </ol>
</section>
<section class="content">   

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Role</h3> <div class="pull-right"> <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah</a>
            </div>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                 <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                  <th>Nama Role</th>
                  <th>Keterangan</th>
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
                 <td>".$r->name."</td>
                 <td>".$r->keterangan."</td>                         
                 <td>";?>
                  <div class='btn-group'>
 <a 
                            href="javascript:;"
                            data-id="<?php echo "$r->id_role"; ?>"
                            data-nama="<?php echo "$r->name"; ?>"
                            data-keterangan="<?php echo" $r->keterangan"; ?>"
                            
                            data-toggle="modal" data-target="#edit-data<?php echo "$r->id_role"; ?>">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                        </a>
<?php                     echo""  . anchor('role/hapus/' . $r->id_role,  ' <button type="button" class="btn btn-danger">Delete</button>', array('onclick' => "return confirm('Data Akan di Hapus?')")) ."" ;

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
              <form class="form-horizontal" action="<?php echo base_url('role/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Role</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama Role">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                            <div class="col-lg-10">
                              <textarea class="form-control" name="keterangan" placeholder="Tuliskan Keterangan"></textarea>
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
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $r->id_role;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('role/ubah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Role</label>
                            <div class="col-lg-10">
                              <input type="hidden" id="id" name="id" value="<?php echo "$r->id_role"; ?>">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama Role" value="<?php echo "$r->name"; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                            <div class="col-lg-10">
                              <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tuliskan keterangan"><?php echo "$r->keterangan"; ?></textarea>
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
