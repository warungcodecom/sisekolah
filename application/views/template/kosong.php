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
  <?php if($dat->edit==1 || $dat->delete==1 ){?>
<th width='140px'>Action</th>
 <?php  }  ?>
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
