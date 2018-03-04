    <?php if($dat->edit==1){?>
<section class="content-header">
    <h1>
        Data Sekolah
        <small>Sekolah</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Sekolah</a></li>
        <li class="active"> Data Sekolah</li>
    </ol>
</section>
<section class="content">
   <form class="form-horizontal" action="<?php echo base_url('sekolah/ubah')?>" method="post" enctype="multipart/form-data" role="form">
  <div class="row">
     <?php


             foreach ($data as $r){
             ?>
    <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-solid">
            <div class="box-body box-profile">
              <img class="img-responsive" src="<?php echo base_url(); ?>/upload/<?php echo $r->logo; ?>" alt="User profile picture">
<br>
<input type="file" name="gambar" class="form-control">
              <h3 class="profile-username text-center"><?php echo $r->nama_sekolah;?></h3>



             <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
<div class="col-md-9">
          <!-- Custom Tabs -->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Identitas Sekolah</a></li>
              <li><a href="#tab_2" data-toggle="tab">Data Perlengkapan</a></li>
              <li><a href="#tab_3" data-toggle="tab">Kontak</a></li>



            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Nama Menu</label>
                          <input type="hidden"  name="id" value="<?php echo $r->id; ?>" >
                           <input type="hidden"  name="logo" value="<?php echo $r->logo; ?>" >
                      <div class="col-lg-10">
                          <input type="tex" name="nama_sekolah" class="form-control" required oninvalid="setCustomValidity('Nama Sekolah Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Sekolah" value="<?php echo $r->nama_sekolah;?>">
                                   <?php echo form_error('nama_sekolah', '<div class="text-red">', '</div>'); ?>
                      </div>
                  </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">NPSN</label>
                        <div class="col-lg-10">
                            <input type="tex" name="npsn" class="form-control" placeholder="Masukan NPSN" value="<?php echo $r->npsn;?>">
                                   <?php echo form_error('npsn', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Jenjang Pendidikan</label>
                        <div class="col-lg-10">
                           <select name='jenjang_pendidikan' class="form-control " required>
                            <option value=''>Jenjang Pendidikan</option>
                            <?php
                                    foreach ($jenjang as $ka) {
                                        echo "<option value='$ka->nama'";
                                        echo $r->jenjang_pendidikan == $ka->nama ? 'selected' : '';
                                        echo">$ka->nama</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Akreditasi</label>
                        <div class="col-lg-10">
                            <input type="tex" name="akreditasi" class="form-control" placeholder="Masukan akreditasi" value="<?php echo $r->akreditasi;?>">
                                   <?php echo form_error('akreditasi', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Kurikulum</label>
                        <div class="col-lg-10">
                           <select name='kurikulum' class="form-control " required>
                            <option value=''>Kurikulum</option>
                            <?php
                                    foreach ($kurikulum as $ka) {
                                        echo "<option value='$ka->nama'";
                                        echo $r->kurikulum == $ka->nama ? 'selected' : '';
                                        echo">$ka->nama</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Status Sekolah</label>
                        <div class="col-lg-10">
                            <input type="tex" name="status_sekolah" class="form-control" placeholder="Masukan Status Sekolah" value="<?php echo $r->status_sekolah;?>">
                                   <?php echo form_error('status_sekolah', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                         <label class="col-lg-2 col-sm-2 control-label">Alamat Sekolah</label>
                         <div class="col-lg-10">
                            <textarea class="form-control" name="alamat" placeholder="Alamat Sekolah"
                        id="inputExperience"><?php echo $r->alamat;?></textarea>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">RT RW</label>
                        <div class="col-lg-10">
                            <input type="text" name="rt_rw" class="form-control" placeholder="Masukan RT/RW" value="<?php echo $r->rt_rw;?>">
                                   <?php echo form_error('rt_rw', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Kelurahan</label>
                        <div class="col-lg-10">
                            <input type="text" name="kelurahan" class="form-control" placeholder="Masukan Kelurahan " value="<?php echo $r->kelurahan;?>">
                                   <?php echo form_error('kelurahan', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Kecamatan</label>
                        <div class="col-lg-10">
                            <input type="text" name="kecamatan" class="form-control" placeholder="Masukan Kecamatan " value="<?php echo $r->kecamatan;?>">
                                   <?php echo form_error('kecamatan', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Kota</label>
                        <div class="col-lg-10">
                            <input type="text" name="kota" class="form-control" placeholder="Masukan Kota " value="<?php echo $r->kota;?>">
                                   <?php echo form_error('kota', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Provinsi</label>
                        <div class="col-lg-10">
                            <input type="text" name="provinsi" class="form-control" placeholder="Masukan Provinsi " value="<?php echo $r->provinsi;?>">
                                   <?php echo form_error('provinsi', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Negara</label>
                        <div class="col-lg-10">
                            <input type="text" name="negara" class="form-control" placeholder="Masukan negara " value="<?php echo $r->negara;?>">
                                   <?php echo form_error('negara', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Status Kepemilikan</label>
                        <div class="col-lg-10">
                            <input type="text" name="status_pemilikan" class="form-control" placeholder="Masukan Status Kepemilikan " value="<?php echo $r->status_pemilikan;?>">
                                   <?php echo form_error('negara', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">SK Pendirian</label>
                        <div class="col-lg-10">
                            <input type="text" name="sk_sekolah" class="form-control" placeholder="Masukan SK Pendirian " value="<?php echo $r->sk_sekolah;?>">
                                   <?php echo form_error('nsk_sekolahegara', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">SK Pendirian</label>
                        <div class="col-lg-10">
                            <input type="text" name="sk_sekolah" class="form-control" placeholder="Masukan SK Pendirian " value="<?php echo $r->sk_sekolah;?>">
                                   <?php echo form_error('nsk_sekolahegara', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Tanggal SK Pendirian</label>
                        <div class="col-lg-10">
                            <input type="text" name="tanggal_sk" class="form-control" value="<?php echo $r->tanggal_sk;?>" id="datamask" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">SK Izin Oprasional</label>
                        <div class="col-lg-10">
                            <input type="text" name="sk_izinop" class="form-control" placeholder="Masukan SK Izin Oprasional " value="<?php echo $r->sk_izinop;?>">
                                   <?php echo form_error('sk_izinop', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                  <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Tgl SK Izin Oprasional</label>
                        <div class="col-lg-10">
                            <input type="text" name="tanggal_skop" class="form-control" value="<?php echo $r->tanggal_skop;?>" id="datamask" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Nomer Rekening</label>
                        <div class="col-lg-10">
                            <input type="text" name="no_rek" class="form-control" placeholder="Masukan Nomer Rekening" value="<?php echo $r->no_rek;?>">
                                   <?php echo form_error('no_rek', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">NPWP</label>
                        <div class="col-lg-10">
                            <input type="text" name="npwp" class="form-control" placeholder="Masukan Nomer npwp" value="<?php echo $r->npwp;?>">
                                   <?php echo form_error('npwp', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Luas Tanah</label>
                        <div class="col-lg-10">
                            <input type="text" name="luas_tanah" class="form-control" placeholder="Masukan Luas Tanah" value="<?php echo $r->luas_tanah;?>">
                                   <?php echo form_error('luas_tanah', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>





              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
               <dl class="dl-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Nomer Telepon</label>
                        <div class="col-lg-10">
                            <input type="text" name="nomer_telepon" class="form-control" placeholder="Masukan Nomer Telepon" value="<?php echo $r->nomer_telepon;?>">
                                   <?php echo form_error('nomer_telepon', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Nomer FAX</label>
                        <div class="col-lg-10">
                            <input type="text" name="fax" class="form-control" placeholder="Masukan Nomer fax" value="<?php echo $r->fax;?>">
                                   <?php echo form_error('fax', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" placeholder="Masukan email" value="<?php echo $r->email;?>">
                                   <?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>
             <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">WEB</label>
                        <div class="col-lg-10">
                            <input type="text" name="web" class="form-control" placeholder="Masukan email" value="<?php echo $r->web;?>">
                                   <?php echo form_error('web', '<div class="text-red">', '</div>'); ?>
                        </div>
                </div>

              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
    </form>
</section>
<?php
 } ?>
<?php }else{
?>
<section class="content">
  <div class="callout callout-danger">
             <center>   <h1><i class="icon fa fa-warning"></i> Maaf Anda Tidak Mempunyai Akses Kehalaman Ini !</h1></center>

                <center>  <p>Silahkan Hubungi Admin Untuk info yang Lebih Lanjut.</p></center>
              </div>
  </section>
<?php } ?>
