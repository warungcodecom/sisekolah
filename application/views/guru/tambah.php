<section class="content-header">
    <h1>
       Guru
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Data</a></li>
        <li class="active">Guru</li>
    </ol>
</section>
<section class="content">   
	<div class="box box-solid ">
            <div class="box-header with-border bg-aqua color-palette">
              <h3 class="box-title">Form Data Guru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('guru/tambah')?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Guru*</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Guru" required>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                		<div class="form-group">
                  <label >NIP</label>

                  <input type="number" name="nip" class="form-control"  placeholder="Masukan NIP" required>
              			</div>
                </div>
                <div class="col-lg-4">
                		<div class="form-group">
                  <label >NUPTK</label>

                  <input type="number" name="nuptk" class="form-control"  placeholder="Masukan NIP">
              			</div>
                </div>
                <div class="col-lg-4">
                		<div class="form-group">
                  <label >NPWP</label>

                  <input type="number" name="npwp" class="form-control"  placeholder="Masukan NPWP">
              			</div>
                </div>
            </div>
            <div class="row">
                  <div class="col-lg-5">
                		<div class="form-group">
                  <label >Tempat Lahir*</label>

                  <input type="text" name="tempat_lahir" class="form-control"  placeholder="Masukan Tempat Lahir" required>
              			</div>
                </div>
                <div class="col-lg-5">
                		<div class="form-group">
                  <label >Tanggal Lahir*</label>

                  <input type="text" name="tanggal_lahir" class="form-control"  id="datamask" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                  <p class="help-block">EX:tahun/bulan/tanggal (yyyy/mm/dd)</p>
              			</div>
                </div>
                
            </div>
            <div class="row">
            	<div class="col-lg-5">
            <div class="form-group">
            	<label >Jenis Kelammin*</label>
            	<div class="form-group">
            		<div class="col-lg-6">
            			<label>
                  <input type="radio" name="jk" class="minimal" value="L"> Laki - Laki   
                </label> 
            		</div>
            	  <div class="col-lg-6">
                <label>
                  <input type="radio" name="jk" class="minimal" value="P">Perempuan
                </label>
            </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3">
        	 <div class="form-group">
            	<label >Golongan Darah</label>
            	 <input type="text" name="gol_darah" class="form-control"  placeholder="Masukan Golongan Darah">
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-lg-4">
    		<div class="form-group">
    	<label >Agama*</label>
    	<select name='agama' class="form-control " required>
                            <option value=''>Agama</option>
                                <?php
                                if (!empty($agama)) {
                                    foreach ($agama as $r) {
                                        echo "<option value=".$r->nama_agama.">".$r->nama_agama."</option>";                                        
                                    }
                                }
                                ?> 
                            </select>
    </div>
    		
    	</div>

    <div class="col-lg-5">
            <div class="form-group">
            	<label >Status</label>
            	<div class="form-group">
            		<div class="col-lg-6">
            			<label>
                  <input type="radio" name="status" class="minimal" value="Belum Menikah"> Belum Menikah
                </label> 
            		</div>
            	  <div class="col-lg-6">
                <label>
                  <input type="radio" name="status" class="minimal" value="Sudah Menikah">Sudah Menikah
                </label>
            </div>
            </div>
            </div>
        </div>
                
              </div>
              <div class="form-group">
                  <label >Nomber Handphone*</label>

                  <input type="number" name="no_hp" class="form-control"  placeholder="Masukan Nomber Handphone" required>
              			</div>
              			<div class="form-group">
                  <label >Alamat*</label>

                  <textarea class="form-control" name="alamat" placeholder="Tuliskan Alamat" required></textarea>
              			</div>
              			<div class="form-group">
                  <label >Foto</label>

                  <input type="file" name="gambar" class="form-control">
              			</div>
              			<p class="help-block">*Keterangan : yang bertanda * harus di isi</p>
          </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
              </div>
            </form>
          </div>
          <br>
          <br>
</section>