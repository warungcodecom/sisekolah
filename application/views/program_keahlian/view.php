<section class="content-header">
    <h1>
       Program Keahlian
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Data</a></li>
        <li class="active">Program Keahlian</li>
    </ol>
</section>
<section class="content">   

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Program Keahlian</h3> <div class="pull-right"> <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah</a>
            </div>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                 <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                 <th>Program Keahlian</th>
                  <th>Bidang Keahlian</th>
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
                 <td>".$r->nama."</td>
                 ";
                  $query = $this->db->query("SELECT * FROM tb_bidkeahlian WHERE id_bid=$r->id_bid");

foreach ($query->result() as $s){

                  echo"<td>".$s->nama."</td>
                  <td>".$r->keterangan."</td>";
                 }
                 ?>
                  <td>
                  <div class='btn-group'>
 <a 
                            href="javascript:;"
                            data-id="<?php echo "$r->id_prog"; ?>"
                            data-nama="<?php echo "$r->nama"; ?>"
                            data-keterangan="<?php echo" $r->keterangan"; ?>"
                            
                            data-toggle="modal" data-target="#edit-data<?php echo "$r->id_prog"; ?>">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                        </a>
<?php                     echo""  . anchor('prog_keahlian/hapus/' . $r->id_prog,  ' <button type="button" class="btn btn-danger">Delete</button>', array('onclick' => "return confirm('Data Akan di Hapus?')")) ."" ;

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
              <form class="form-horizontal" action="<?php echo base_url('prog_keahlian/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Program Keahlian</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama Role" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                            <div class="col-lg-10">
                              <textarea class="form-control" name="keterangan" placeholder="Tuliskan Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-2 col-sm-2 control-label">Bidang Keahlian</label>
                              <div class="col-lg-10">
                            <select name='id_bid' class="form-control ">
                            <option value=''>Bidang Keahlian</option>
                                <?php
                                if (!empty($bid)) {
                                    foreach ($bid as $r) {
                                        echo "<option value=".$r->id_bid.">".$r->nama."</option>";                                        
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
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $r->id_prog;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('prog_keahlian/ubah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Role</label>
                            <div class="col-lg-10">
                              <input type="hidden" id="id" name="id" value="<?php echo "$r->id_prog"; ?>" required>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama Role" value="<?php echo "$r->nama"; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                            <div class="col-lg-10">
                              <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tuliskan keterangan"><?php echo "$r->keterangan"; ?></textarea>
                            </div>
                        </div>
                         <div class="form-group">
                           <label class="col-lg-2 col-sm-2 control-label">Bidang Keahlian</label>
                              <div class="col-lg-10">
                            <select name='id_bid' class="form-control ">
                            <option value=''>Bidang Keahlian</option>
                                <?php
                                    foreach ($bid as $ka) {
                                        echo "<option value='$ka->id_bid'";
                                        echo $r->id_bid == $ka->id_bid ? 'selected' : '';
                                        echo">$ka->nama</option>";
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
