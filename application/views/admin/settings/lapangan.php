<div id="wrap_lapangan" class="col-md-5">
    <!-- general form elements -->
    <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title" id="title_lapangan">Tambah lapangan</h3>
            <div class="pull-right" style="padding:5px;">
                <btn href="#" id="_tambah_lapangan" class="btn btn-info btn-sm hide">Tambah lapangan</btn>
            </div>
        </div>
        <!-- form start -->
        <form role="form" action="<?=base_url("admin/settings/simpan_lapangan")?>" method="POST">
            <div class="box-body">
                <input type="hidden" id="id_lapangan" name="id_lapangan" value="">
                <div class="form-group">
                    <label for="nama_lapangan">Nama lapangan</label>
                    <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" placeholder="Masukkan nama lapangan">
                </div>

                 <div class="form-group">
                    <label for="deskripsi_lapangan">Detail lapangan</label>
                    <textarea rows="10" class="form-control" id="deskripsi_lapangan" name="deskripsi_lapangan" placeholder="Tuliskan dekripsi lapangan"></textarea>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" name="simpan_lapangan" value="Simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div><!-- /.box -->
</div>


<div class="col-md-7">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data lapangan</h3>
        </div>
    
        <div class="box-body">
            
             <table id="data_lapangan" class="table table-bordered">
             <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Lapangan</th>
                    <th>Deskripsi</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if($lapangan) :
                        foreach ($lapangan as $key => $data) :
                            $no = $key + 1;
                ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$data->nama_lapangan?></td>
                        <td><?=$data->deskripsi_lapangan?></td>
                        <td><button class="btn btn-info btn-sm btn-edit" data-id="<?=$data->id_lapangan?>">Edit</button></td>
                    </tr>
                <?php
                        endforeach;
                    else:
                ?>
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                <?php
                    endif;
                ?>
                </tbody>
            </table>
            
        </div><!-- /.box-body -->

           
    
    </div><!-- /.box -->
</div>
