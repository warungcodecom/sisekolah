<?php if($dat->akses ==1){ ?>
<section class="content-header">
    <h1>
        <?php echo $title;?>
        <small>Menu Aplikasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active"><?php echo $title;?></li>
    </ol>
</section>
<section class="content">

<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data <?php echo $title;?></h3>
              <div class="pull-right"> <?php if($dat->add==1){?><a data-toggle="modal" data-target="#tambah-data" class="btn btn-flat bg-green"><i class="fa  fa-plus-square"></i> Tambah</a>
                <?php  }  ?></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?=$this->session->flashdata('notif')?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th width='12px'>No</th>
                  <th>Nama Menu</th>
                  <th>Icon</th>
                  <th>Link</th>
                  <th>Kat. Menu</th>
                  <?php if($dat->edit==1 || $dat->delete==1 ){?>
              <th width='140px'>Action</th>
                 <?php  }  ?>
                </tr>
                </thead>
                <tbody>
               <?php
             $no=1;
                       function chek($id) {
                            $CI = get_instance();
                            $result = $CI->db->get_where('tb_menu', array('id_menu' => $id))->row_array();
                            return $result['nama_menu'];
                        }
             foreach ($data as $r){
                        $katmenu = $r->kat_menu == 0 ? 'Menu Utama' : chek($r->kat_menu);
               echo"
                 <tr>
                 <td>$no</td>
                 <td>".$r->nama_menu."</td>
                 <td>".$r->icon."</td>
                 <td>".$r->link."</td>
                 <td>".$katmenu."</td> "; ?>
                 <?php if($dat->edit==1 || $dat->delete==1 ){?>
                     <td>
                     <?php if($dat->edit==1){?>
                       <a href="javascript:;" data-toggle="modal" data-target="#edit-data<?php echo "$r->id_menu"; ?>">
                           <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-flat bg-orange"><i class="fa fa-pencil-square"></i> Ubah</button>
                       </a>
                     <?php  }  ?>
                     <?php if($dat->delete==1){?>
                       <button onclick="validate(this)"  value="<?php echo $r->id_menu; ?>" class="btn btn-flat bg-red">
                       <i class="fa  fa-trash"></i> Delete
                       </button>
                     <?php  }  ?>
                   </td>
                 <?php  }
                               echo"</tr>";
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
              <form class="form-horizontal" action="<?php echo base_url('menu/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Menu</label>
                              <div class="col-lg-10">
                            <input type="tex" name="nama" class="form-control" required oninvalid="setCustomValidity('Nama Menu Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Menu" >
                                   <?php echo form_error('nama', '<div class="text-red">', '</div>'); ?>
                                 </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Icon</label>
                              <div class="col-lg-10">
                            <input type="text" class="form-control" name="icon" required oninvalid="setCustomValidity('Icon di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : fa fa-dashboard">
                            <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                          </div>
                        </div>
                         <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Link</label>
                              <div class="col-lg-10">
                            <input type="text" class="form-control" name="link" required oninvalid="setCustomValidity('Link Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : menu/add atau #">
                            <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kat. Menu</label>
                              <div class="col-lg-10">
                            <select name='kat_menu' class="form-control ">
                            <option value='0'>Menu Utama</option>
                                <?php
                                if (!empty($menu)) {
                                    foreach ($menu as $r) {
                                        echo "<option value=".$r->id_menu.">".$r->nama_menu."</option>";
                                    }
                                }
                                ?>
                            </select>
                          </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-flat bg-green" type="submit"><i class="fa fa-save "></i> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-flat bg-blue" data-dismiss="modal"><i class="fa fa-times "></i> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>

  <!-- END Modal Tambah -->
 <!-- Modal Ubah -->
   <?php
             $no=1;

             foreach ($data as $dat){
              ?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $dat->id_menu;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('menu/ubah')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Menu</label>
                            <input type="hidden"  name="id" value="<?php echo $dat->id_menu; ?>" >
                            <div class="col-lg-10">
                            <input type="tex" name="nama" class="form-control" id="inputError" required oninvalid="setCustomValidity('Nama Menu Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama menu" value="<?php echo $dat->nama_menu; ?>" >
                                 </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Icon</label>     <div class="col-lg-10">
                            <input type="tex" name="icon" class="form-control" id="inputError" required oninvalid="setCustomValidity('Icon Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : fa fa-dashboard" value="<?php echo $dat->icon; ?>" >
                                 </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Link</label>   <div class="col-lg-10">
                            <input type="tex" name="link" class="form-control" id="inputError" required oninvalid="setCustomValidity('Link Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : menu/edit" value="<?php echo $dat->link; ?>" >
                                 </div>
                        </div>

                        <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Kat. Menu</label>
                                <div class="col-lg-10">
                                <select name="kat_menu" class="form-control">
                                    <option value='0'>Menu Utama</option>
                                    <?php
                                    foreach ($menu as $k) {
                                        echo "<option value='$k->id_menu'";
                                        echo $dat->kat_menu == $k->id_menu ? 'selected' : '';
                                        echo">$k->nama_menu</option>";
                                    }
                                    ?>
                                </select>
                              </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-flat bg-green" type="submit"><i class="fa fa-save "></i> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-flat bg-blue" data-dismiss="modal"><i class="fa fa-times "></i> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>

  <?php
}?>
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
    $(location).attr('href', '<?php echo base_url()?>menu/delete_data/' + id);
  });
}

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
