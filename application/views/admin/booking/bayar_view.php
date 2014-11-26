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
                    <td><?=$data->id_booking?></td>
                    <td><?=$data->nama_lapangan?></td>
                    <td><?=$data->nama?></td>
                    <td><?=$data->telp?></td>
                    <td><?=substr($data->jadwal, 11)?></td>
                    <td><?=$data->durasi?></td>
                    <td><?=$data->jml_uang?></td>
                    <td><?=$pelunasan?></td>
                    <td><button class="btn btn-info btn-sm btn-edit" data-id="<?=$data->id_lapangan?>">Pelunasan</button></td>
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

       

</div><!-- /.box -->