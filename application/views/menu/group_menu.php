<?php if($dat->akses ==1){ ?>
<section class="content-header">
    <h1>
        <?php echo $title;?>
        <small>Menu Aplikasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu Aplikasi</li>
    </ol>
</section>
<section class="content">

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data <?php echo $title;?></h3>

              <div class="pull-right">   <?php if($dat->add==1){?><a data-toggle="modal" data-target="#tambah-data" class="btn btn-flat bg-green"><i class="fa  fa-plus-square"></i> Tambah</a>
                <?php  }  ?>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width='12px'>No</th>
                  <th width='180px'>Nama Menu</th>
                  <th width='180px'>Role</th>
                  <th>Akses</th>
                  <th>Add</th>
                  <th>Edit</th>
                  <th>Delete</th>
                      <?php if($dat->edit==1 || $dat->delete==1 ){?>
                  <th width='140px'>Action</th>
                     <?php  }  ?>
                </tr>
                </thead>
                <tbody>
               <?php $no=1;             foreach ($data as $rs){ ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $rs->nama_menu;?></td>
      <td><?php echo $rs->name;?></td>
      <td><?php if($rs->akses==1){echo"<i class='fa fa-check-square text-green'></i>";}else{echo"<i class='fa fa-close text-red'></i>";}?></td>
      <td><?php if($rs->add==1){echo"<i class='fa fa-check-square text-green'></i>";}else{echo"<i class='fa fa-close text-red'></i>";}?></td>
      <td><?php if($rs->edit==1){echo"<i class='fa fa-check-square text-green'></i>";}else{echo"<i class='fa fa-close text-red'></i>";}?></td>
      <td><?php if($rs->delete==1){echo"<i class='fa fa-check-square text-green'></i>";}else{echo"<i class='fa fa-close text-red'></i>";}?></td>
  <?php if($dat->edit==1 || $dat->delete==1 ){?>
      <td>
      <?php if($dat->edit==1){?>
        <a href="javascript:;" data-toggle="modal" data-target="#edit-data<?php echo "$rs->id"; ?>">
            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-flat bg-orange"><i class="fa fa-pencil-square"></i> Ubah</button>
        </a>
      <?php  }  ?>
      <?php if($dat->delete==1){?>
        <button onclick="validate(this)"  value="<?php echo $rs->id; ?>" class="btn btn-flat bg-red">
        <i class="fa  fa-trash"></i> Delete
        </button>
      <?php  }  ?>
    </td>
  <?php  }  ?>
</tr>
      <?php       $no++;    }?>
                </tbody>
              </table>
            </div>
          </div>

          <?php
                    $no=1;

                    foreach ($data as $edit){
                     ?>
          <!-- Modal Ubah -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $edit->id;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Tambah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('group_menu/edit_data')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?php echo $edit->id;?>">

                       <div class="form-group">
                           <label class="col-lg-2 col-sm-2 control-label">Role</label>
                              <div class="col-lg-10">
                            <select name='id_role' class="form-control ">
                            <option value=''>Pilih Role</option>
                                 <?php

                                    foreach ($roles as $rr) {
                                      echo "<option value='$rr->name'";
                                      echo $edit->name == $rr->name ? 'selected' : '';
                                      echo">$rr->name</option>";
                                    }

                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Menu</label>
                              <div class="col-lg-10">
                            <select name='id_menu' class="form-control ">
                            <option value=''>Pilih Menu</option>
                                <?php

                                    foreach ($menu as $srs) {
                                      echo "<option value='$srs->id_menu'";
                                      echo $edit->id_menu == $srs->id_menu ? 'selected' : '';
                                      echo">$srs->nama_menu</option>";
                                    }

                                ?>
                            </select>
                          </div>
                        </div>
    <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Akses</label>
                              <div class="col-lg-10">
                                <label>
                  <input type="checkbox" class="flat-red" name="akses_data" value="1" <?php if($edit->akses==1){ echo"checked";}?>> Akses Data
                </label> <label>
                  <input type="checkbox" class="flat-red" name="add_data"  value="1" <?php if($edit->add==1){ echo"checked";}?>> Add Data
                </label>
                <label>
                  <input type="checkbox" class="flat-red" name="edit_data"  value="1" <?php if($edit->edit==1){ echo"checked";}?>> Edit Data
                </label>
                <label>
                  <input type="checkbox" class="flat-red" name="delete_data" value="1" <?php if($edit->delete==1){ echo"checked";}?>> Delete Data
                </label>
                              </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-flat bg-green" type="submit" name="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-flat bg-blue" data-dismiss="modal"> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
<?php } ?>
  <!-- END Modal Tambah -->
  <!-- Modal Tambah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('group_menu/tambah')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">


               <div class="form-group">
                   <label class="col-lg-2 col-sm-2 control-label">Status</label>
                      <div class="col-lg-10">
                    <select name='id_role' id="kategori" class="form-control ">
                    <option value=''>Status</option>
                         <?php

                            foreach ($roles as $rr) {
                                echo "<option value=".$rr->name.">".$rr->name."</option>";
                            }

                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Kat. Menu</label>
                      <div class="col-lg-10">
                    <select name='id_menu' id="post_menu" class="form-control subkategori">
                    <option value=''>Pilih Menu</option>
                    </select>
                  </div>
                </div>
<div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Akses</label>
                      <div class="col-lg-10">
                        <label>
          <input type="checkbox" class="flat-red" name="akses_data" value="1"> Akses Data
        </label> <label>
          <input type="checkbox" class="flat-red" name="add_data"  value="1"> Add Data
        </label>
        <label>
          <input type="checkbox" class="flat-red" name="edit_data"  value="1"> Edit Data
        </label>
        <label>
          <input type="checkbox" class="flat-red" name="delete_data" value="1"> Delete Data
        </label>
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-flat bg-green" type="submit" name="submit"> Simpan&nbsp;</button>
                <button type="button" class="btn btn-flat bg-blue" data-dismiss="modal"> Batal</button>
            </div>
          </form>
      </div>
  </div>
</div>

</section><!-- /.content -->
<script src="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function validate(a) {
  var id = a.value;
  swal({
    title: "Apakah Kamu Yakin?",
    text: "Kamu akan Menghapus Data Ini ",
    type: "warning",

    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Hapus",
    closeOnConfirm: false
  }, function() {
    swal("Deleted!", "Data Berhasil di Hapus.", "success");
    $(location).attr('href', '<?php echo base_url()?>group_menu/delete_data/' + id);
  });
}
$(document).ready(function(){
       $('#kategori').change(function(){
           var id=$(this).val();
           $.ajax({
               url : "<?php echo base_url();?>/group_menu/get_menu_role",
               method : "POST",
               data : {id: id},

               success: function(data){
  

                   $('.subkategori').html(data);

               }
           });
       });
   });
</script>
<?php }else{
?>
<section class="content">
  <div class="callout callout-danger">
             <center>   <h1><i class="icon fa fa-warning"></i> Maaf Anda Tidak Mempunyai Akses Kehalaman Ini !</h1></center>

                <center>  <p>Silahkan Hubungi Admin Untuk info yang Lebih Lanjut.</p></center>
              </div>
  </section>
<?php } ?>
