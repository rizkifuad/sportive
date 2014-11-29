<!-- general form elements -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Pembayaran</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="data_lapangan" class="table table-bordered table-striped">
         <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Id Booking</th>
                <th>Nama Lapangan</th>
                <th>Nama Penyewa</th>
                <th>Telepon</th>
                <th>Jadwal</th>
                <th>Durasi</th>
                <th>Jumlah Uang</th>
                <th>Kekurangan</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if($booking) :
                    foreach ($booking as $key => $data) :
                        $no = $key + 1;
            ?>
                <tr>
                    <td><?=$no?></td>
                    <td class="id_booking"><?=$data->id_booking?></td>
                    <td class="nama_lapangan"><?=$data->nama_lapangan?></td>
                    <td class="nama_penyewa"><?=$data->nama?></td>
                    <td><?=$data->telp?></td>
                    <td><?=substr($data->jadwal, 11)?></td>
                    <td><?=$data->durasi?></td>
                    <td><?=$data->jml_uang?></td>
                    <td class="kekurangan"><?=$data->pelunasan?></td>
                    <td><button class="btn btn-info btn-sm btn-edit pelunasan" data-id="<?=$data->id_lapangan?>">Pelunasan</button></td>
                </tr>
            <?php
                    endforeach;
                else:
            ?>
                <tr>
                    <td colspan="10" align="center">Tidak ada data</td>
                </tr>
            <?php
                endif;
            ?>
            </tbody>
        </table>
        
    </div><!-- /.box-body -->
    

    <div class="modal fade modal_pelunasan">
      <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" class="form-horizontal" method="post" action="<?=base_url("admin/booking/pelunasan")?>">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Pelunasan</h4>
          </div>
          <div class="modal-body">

          <!-- Form Penormalan -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Id Booking</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Id Booking" id="id_booking" name="id_booking" readonly="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Lapangan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Nama Lapangan" id="nama_lapangan" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Penyewa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Nama Penyewa" id="nama_penyewa" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Kekurangan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="kekurangan" id="kekurangan" name="kekurangan" readonly="">
                </div>
            </div>
            
            <!-- End of form penormalan -->
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-info" >Bayar</button>
            <button type="button" class="btn btn-default close_pelunasan" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
       

</div><!-- /.box -->