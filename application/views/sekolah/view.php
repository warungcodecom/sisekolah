<?php if($dat->akses ==1){ ?>
<section class="content-header">
    <h1>
  <?php echo $title;?>
        <small>Sekolah</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Sekolah</a></li>
        <li class="active">   <?php echo $title;?></li>
    </ol>
</section>
<section class="content">
    <?=$this->session->flashdata('notif')?>
  <div class="row">
     <?php


             foreach ($data as $r){
             ?>
    <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-solid">
            <div class="box-body box-profile">
              <img class="img-responsive" src="<?php echo base_url(); ?>/upload/<?php echo $r->logo; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $r->nama_sekolah;?></h3>


              <?php if($dat->edit==1){?>


              <a href="<?php echo base_url();?>sekolah/ubah/<?php echo $r->id;?>" class="btn btn-flat bg-green btn-block"><b>Ubah Data</b></a>
             <?php  }  ?>
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
                <table class="table table-striped">
                  <tr>
                    <th>Nama Sekolah</th>
                    <td><?php echo $r->nama_sekolah;?></td>
                  </tr>
                  <tr>
                    <th>NPSN</th>
                    <td><?php echo $r->npsn;?></td>
                  </tr>
                  <tr>
                    <th>Jenjang Pendidikan</th>
                    <td><?php echo $r->jenjang_pendidikan;?></td>
                  </tr>
                  <tr>
                    <th>Akreditasi </th>
                    <td><?php echo $r->akreditasi;?></td>
                  </tr>
                  <tr>
                    <th>Kurikulum</th>
                    <td><?php echo $r->kurikulum;?></td>
                  </tr>
                  <tr>
                    <th>Status Sekolah</th>
                    <td><?php echo $r->status_sekolah;?></td>
                  </tr>
                  <tr>
                    <th>Alamat Sekolah</th>
                    <td><?php echo $r->alamat;?></td>
                  </tr>
                  <tr>
                    <th>RT/RW</th>
                    <td><?php echo $r->rt_rw;?></td>
                  </tr>
                  <tr>
                    <th>Kelurahan</th>
                    <td><?php echo $r->kelurahan;?></td>
                  </tr>
                  <tr>
                    <th>Kecamatan</th>
                    <td><?php echo $r->kecamatan;?></td>
                  </tr>
                  <tr>
                    <th>Kabupaten/Kota</th>
                    <td><?php echo $r->kota;?></td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td><?php echo $r->provinsi;?></td>
                  </tr>
                  <tr>
                    <th>Negara</th>
                    <td><?php echo $r->negara;?></td>
                  </tr>
                </table>


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table class="table table-striped">
                  <tr>
                    <th>Status Kepemilikan</th>
                    <td><?php echo $r->status_pemilikan;?></td>
                  </tr>
                  <tr>
                    <th>SK Pendirian Sekolah</th>
                    <td><?php echo $r->sk_sekolah;?></td>
                  </tr>
                  <tr>
                    <th>Tanggal SK Pendirian</th>
                    <td><?php echo $r->tanggal_sk;?></td>
                  </tr>
                  <tr>
                    <th>SK Izin Oprasional</th>
                    <td><?php echo $r->sk_izinop;?></td>
                  </tr>
                  <tr>
                    <th>Tgl SK Izin Oprasional</th>
                    <td><?php echo $r->tanggal_skop;?></td>
                  </tr>
                  <tr>
                    <th>Nomer Rekening</th>
                    <td><?php echo $r->no_rek;?></td>
                  </tr>
                  <tr>
                    <th>NPWP</th>
                    <td><?php echo $r->npwp;?></td>
                  </tr>
                  <tr>
                    <th>Luas Tanah</th>
                    <td><?php echo $r->luas_tanah;?></td>
                  </tr>

              </table>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
          <table class="table table-striped">
              <tr>
                <th>Nomer Telepon</th>
                <td><?php echo $r->nomer_telepon;?></td>
              </tr>
              <tr>
                <th>Nomer FAX</th>
                <td><?php echo $r->fax;?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo $r->email;?></td>
              </tr>
              <tr>
                <th>WEB</th>
                <td><?php echo $r->web;?></td>
              </tr>
              </table>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <?php
         } ?>
      </div>
</section>
<?php }else{
?>
<section class="content">
  <div class="callout callout-danger">
             <center>   <h1><i class="icon fa fa-warning"></i> Maaf Anda Tidak Mempunyai Akses Kehalaman Ini !</h1></center>

                <center>  <p>Silahkan Hubungi Admin Untuk info yang Lebih Lanjut.</p></center>
              </div>
  </section>
<?php } ?>
