<section class="content-header">
    <h1>
        Tambah<?=$this->session->flashdata('error')?>  
        <small>Profile Dinamis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Profile Dinamis</li>
    </ol>
</section>
<section class="content">
     <?=$this->session->flashdata('notif')?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php echo form_open_multipart("user/add_akun");
                   
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                           <div id="label-nip"> <label>Nip</label></div>
                            <input type="text" class="form-control" id="nip" name="nip" required oninvalid="setCustomValidity('User harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : fa fa-dashboard"><div id="pesan-nip"></div>
                            
                        </div>                                         
                        <div class="form-group">
                           <div id="label-username"> <label>username</label></div>
                            <input type="text" class="form-control" id="username" name="u_name" required oninvalid="setCustomValidity('User harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : fa fa-dashboard"><div id="pesan"></div>
                            <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                        </div>   
                         <div class="form-group">
                          <div id="label-password"><label >Password</label></div>
                            <input type="text" class="form-control" name="password" id="password" required oninvalid="setCustomValidity('Link Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan password"><div id="pesan-password"></div>
                            <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                        </div>   
                       <div class="form-group">
                           <div id="label-roles"> <label for="">Roles</label></div>
                            <select name='role' class="form-control" id="roles" required>
                            <option value=''>Pilih Roles</option>
                             <?php
                                if (!empty($roles)) {
                                    foreach ($roles as $r) {
                                        echo "<option value=".$r->name.">".$r->name."</option>";                                        
                                    }
                                }
                                ?> 
                            </select>
                            <div id="pesan-roles"></div>
                        </div>  
                        <div class="form-group">
                           <div id="label-file"> <label for="">File</label></div>
                           <input type="file" name="gambar" class="form-control">
                        </div>  
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <div id="tombol-simpan"><button type="submit"  name="submit" class="btn btn-block btn-primary btn-flat"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                      </div>                        
                        
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function(){
   //validasi Nip
  $('#nip').change(function(){
   var nip = $('#nip').val();
   //mengcek apabila ada value di nip
    if(nip != ''){
        //mengcek value lebih dari 3 huruf
   if(nip.length >3){
    //mengcek apabila ada spasi
    if(!(/^\S{3,}$/.test(nip))){
  
        $('#pesan-nip').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i>nip  tidak boleh menggunakan Spasi</span></label>');
        $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
        $('#nip').css('border-color','#dd4b39');
        $('#label-nip').html('<label class="control-label text-danger" for="inputSuccess"><i class="fa fa-times-circle-o"></i> NIP</label>');
    }else{
    $.ajax({
     url: "<?php echo base_url(); ?>user/check_nip",
     method: "POST",
     data: {nip:nip},
     success: function(data){
      if(data=='yes'){
        $('#label-nip').html('<label class="control-label text-success" for="inputSuccess"><i class="fa fa-check"></i> NIP</label>');
       $('#pesan-nip').hide();
         $('#tombol-simpan').html('<button type="submit"  name="submit" class="btn btn-block btn-primary btn-flat"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>');
       $('#nip').css('border-color','#00a65a');
     }else{
         $('#pesan-nip').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i>NIP tidak bisa digunakan, Mohon Ganti !</span></label>');
         $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
 $('#label-nip').html('<label class="control-label text-danger" for="inputSuccess"><i class="fa fa-times-circle-o"></i> NIP</label>');
          $('#nip').css('border-color','#dd4b39');
     }
      
     }

    });
   
}
}else{
    //apabila kareakter kurang dari 3
$('#pesan-nip').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i>nip Harus lebih dari 3 karakter</span></label>');
 $('#label-nip').html('<label class="control-label text-danger" for="inputSuccess"><i class="fa fa-times-circle-o"></i> NIP</label>');
 $('#nip').css('border-color','#dd4b39');
$('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
}
}else{
     $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
    //apabila value tidak ada
     $('#pesan-nip').hide();
   }
  });
   
   //validasi username
  $('#username').change(function(){
   var username = $('#username').val();
   //mengcek apabila ada value di username
    if(username != ''){
        //mengcek value lebih dari 3 huruf
   if(username.length >3){
    //mengcek apabila ada spasi
    if(!(/^\S{3,}$/.test(username))){
        $('#pesan').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i>Username name tidak boleh menggunakan Spasi</span></label>');
        $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
        $('#username').css('border-color','#dd4b39');
        $('#label-username').html('<label class="control-label text-danger" for="inputSuccess"><i class="fa fa-times-circle-o"></i> Username</label>');
    }else{
    $.ajax({
     url: "<?php echo base_url(); ?>user/check_username",
     method: "POST",
     data: {username:username},
     success: function(data){
      if(data=='yes'){
         
        $('#label-username').html('<label class="control-label text-success" for="inputSuccess"><i class="fa fa-check"></i> Username</label>');
       $('#pesan').hide();
         $('#tombol-simpan').html('<button type="submit"  name="submit" class="btn btn-block btn-primary btn-flat"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>');
       $('#username').css('border-color','#00a65a');

     }else{
         $('#pesan').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i>Username tidak bisa digunakan, Mohon Ganti !</span></label>');
         $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
 $('#label-username').html('<label class="control-label text-danger" for="inputSuccess"><i class="fa fa-times-circle-o"></i> Username</label>');
          $('#username').css('border-color','#dd4b39');
     }
      
     }

    });
   
}
}else{
    //apabila kareakter kurang dari 3
$('#pesan').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i>Username Harus lebih dari 3 karakter</span></label>');
 $('#label-username').html('<label class="control-label text-danger" for="inputSuccess"><i class="fa fa-times-circle-o"></i> Username</label>');
 $('#username').css('border-color','#dd4b39');
$('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
}
}else{
     $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
    //apabila value tidak ada
     $('#pesan').hide();
   }
  });
  //validasi password
  $('#password').change(function(){
        var password = $('#password').val();
       if(password != ''){
        if(password.length >=8){
            $('#password').css('border-color','#00a65a');
             $('#label-password').html('<label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Password</label>');
             $('#label-password').css('color','#00a65a');
             $('#pesan-password').hide();
             $('#tombol-simpan').html('<button type="submit"  name="submit" class="btn btn-block btn-primary btn-flat"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>');
        }else{
            $('#pesan-password').html('<label class="control-label text-danger">Password Harus lebih dari 8 karakter</label>');
            $('#label-password').html('<label class="control-label text-danger"><i class="fa fa-times-circle-o"></i> Password</label>');
            $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
          
 $('#password').css('border-color','#dd4b39');
        }
       }else{
         $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
          $('#pesan-password').hide();
       }
   });
   //validasi roles
  $('#roles').change(function(){
        var roles = $('#roles').val();
       if(roles != ''){
      
            $('#roles').css('border-color','#00a65a');
             $('#label-roles').html('<label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Roles</label>');
             $('#label-roles').css('color','#00a65a');
             $('#pesan-roles').hide();
             $('#tombol-simpan').html('<button type="submit"  name="submit" class="btn btn-block btn-primary btn-flat"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>');
       
       }else{
         $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
         $('#pesan-roles').html('<label class="control-label text-danger">Roles Harus di pilih</label>');
            $('#label-roles').html('<label class="control-label text-danger"><i class="fa fa-times-circle-o"></i> Roles</label>');
            $('#tombol-simpan').html('<button type="button" class="btn btn-block btn-default disabled">Simpan</button>');
          
 $('#roles').css('border-color','#dd4b39');
         
       }
   });
  
 });
</script>

