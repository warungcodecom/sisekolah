
<section class="content-header">
    <h1>
        Tambah
        <small>Profile Dinamis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Profile Dinamis</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-12">
                <?php echo form_open_multipart("status/add");
                   
                ?> 
                  <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('u_id');?>">
                    <div class="box-body">
                        <div class="form-group">
                         
                            <textarea class="textarea" name="status" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>                                           
                        
                        <div class="form-group">
                            <label for="">File</label>
                           <input type="file" name="gambar" class="form-control">
                        </div>  
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo site_url('menu'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>