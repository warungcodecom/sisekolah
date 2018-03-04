<section class="content-header">
  <h1>
    Data User
    <small>Data User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-suitcase"></i>User</a></li>
    <li class="active">Data User</li>
  </ol>
</section>
<section class="content">
<?=$this->session->flashdata('notif')?>
<?=$this->session->flashdata('error')?>
<!--Box Filter-->
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Filter</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <select class="form-control" name="filter_roles" id="filter_roles">
            <option value="">Semua Role</option>
            <?php
            if (!empty($roles)) {
              foreach ($roles as $r) {
                echo "<option value=".$r->name.">".$r->name."</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-control" name="filter_status" id="filter_status">
            <option value="">Semua Status</option>
            <option value="1">Aktif</option>
            <option value="0">Nonaktif</option>
          </select>
        </div>
        <div class="col-md-4">
          <button type="submit"  name="submit" id="sub_filter" class="btn btn-block bg-aqua btn-flat">
            <i class="glyphicon glyphicon-hdd"></i> Filter
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--akhir box filter -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid ">
        <div class='box-header with-border bg-purple'>
          <h3 class='box-title'>
            <i class="fa fa-users"></i>
            Data User
          </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url('user/add_akun'); ?>" class="btn btn-primary btn-small">
              <i class="glyphicon glyphicon-plus"></i>
              Tambah Data
            </a>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID User</th>
                <th>Foto</th>
                <th>Username</th>
                <th>Role</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody id="data-user">
              <?php		foreach ($record as $r) {   ?>
                <tr>
                  <td><?php echo $r->u_id;?></td>
                  <td><img src="<?php echo base_url();?>upload/resize/<?php echo $r->photo;?>">
                  <td><?php echo $r->u_name;?></td>
                  <td><?php echo $r->role;?></td>
                  <td>
                    <a data-toggle="modal" data-target="#edit-data<?php echo "$r->u_id"; ?>">
                      <button  data-toggle="modal" data-target="#ubah-data"<?php if($r->activate_login==0){      ?> class="btn btn-success">
                        <i class="fa fa-unlock"></i> Aktifkan
                      <?php  }elseif($r->activate_login==1){?> class="btn btn-danger">
                        <i class="fa fa-lock"></i> Nonaktifkan
                      <?php } ?>
                      </button>
                    </a>
                    <button onclick="validate(this)"  value="<?php echo $r->u_id; ?>" class="btn btn-danger">
                      <i class="glyphicon glyphicon-trash"></i>
                       Delete
                     </button>
                   </td>
                 </tr>
               <?php    }   ?>
             </tbody>
           </Table>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </div>
</div>
<?php foreach ($record as $r){ ?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $r->u_id;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Notifikasi</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('user/aktivasi_akun')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">

                              <input type="hidden" id="id" name="id" value="<?php echo "$r->u_id"; ?>" required>
                                   <?php if($r->activate_login==0){
                        ?>
                                <input type="hidden" class="form-control" id="nama" name="aktifasi" placeholder="Tuliskan Nama Role" value="1">
<h3>Anda yakin akan Mengaktifkan akun Ini ?</h3>
                            <?php }elseif($r->activate_login==1){
                        ?>
                       <input type="hidden" class="form-control" id="nama" name="aktifasi" placeholder="Tuliskan Nama Role" value="0">
               <h3>        Anda yakin akan Nonaktifkan akun Ini ?</h3>
                       <?php }?>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Iya&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
<?php } ?>
</section><!-- /.content -->
<script src="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function validate(a) {
  var id = a.value;
  var name = $('#hapus').attr('data-user');
  swal({
    title: "Apakah Kamu Yakin?",
    text: "Kamu akan Menghapus User dengan Id " + id,
    type: "warning",

    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Hapus",
    closeOnConfirm: false
  }, function() {
    swal("Deleted!", "User Berhasil di Hapus." + id, "success");
    $(location).attr('href', '<?php echo base_url()?>user/delete_akun/' + id);
  });
}

$(document).ready(function() {


  function filter() {

    var filter_roles = $('#filter_roles').val();
    var filter_status = $('#filter_status').val();
    $.ajax({
      url: "<?php echo base_url(); ?>user/filter_data_akun",
      method: "POST",
      data: {
        filter_roles: filter_roles,
        filter_status: filter_status,
      },
      success: function(data) {
        $('#data-user').html(data);
      }
    });

  }
  $('#sub_filter').click(function() {

    filter();
  });


});
</script>
