<section class="content-header">
    <h1>
        Menu Dinamis
        <small>Seting Menu Dinamis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Menu Dinamis</li>
    </ol>
</section>
<section class="content">   

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No.</th>
                  <th>Nama Menu</th>
                  <th>Icon</th>
                  <th>Link</th>
                  <th>Kat. Menu</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
             $no=1;
                      
             foreach ($record as $r){    
                                                          
               echo"
                 <tr>
                 <td>$no</td>
                 <td>".$r->judul."</td>
                 <td>".$r->ket."</td>
                 <td>".$r->link_demo."</td>
                 <td>".$r->link_download."</td>                               
                 <td>" . anchor('menu/edit/' . $r->id_demo, '<i class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i>') . "" . anchor('menu/delete/' . $r->id_demo, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")) . "</td>
                               </tr>";
               $no++;
             }
             ?>
                
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</section><!-- /.content -->
