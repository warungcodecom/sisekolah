<section class="content-header">
    <h1>
        Edit
        <small>Menu Dinamis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Menu Dinamis</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open('menu/edit');
                ?>
                    
                    <div class="box-body">
                       
                        <div class="box-body">
                        <div class="form-group">
                            <label for="example">Nama Lengkap</label>
                            <input type="tex" name="nama" class="form-control" required oninvalid="setCustomValidity('Nama Lengkap Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Lengkap" value="<?php echo $record['nama']; ?>">
                                   <?php echo form_error('nama', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">username</label>
                            <input type="text" class="form-control" name="u_name" required oninvalid="setCustomValidity('User harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : fa fa-dashboard" value="<?php echo $record['u_name']; ?>">
                            <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                        </div>   
                         
                       <div class="form-group">
                            <label for="">Status</label>
                            <select name='role' class="form-control ">
                            <option value=''>Status</option>
                             <option value='User'>User</option>
                             <option value='Administrator'>Administrator</option>  
                            </select>
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