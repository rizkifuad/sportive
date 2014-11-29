<div class="box">
    <div class="box-header">
        <h3 class="box-title">Daftar Jadwal</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?= form_open('admin/settings/updateJadwal'); ?>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th style="width: 10px" class="jam"><i class="fa fa-check"></i></th>
                    <th class="jam">Hari</th>
                    <th class="jam">Jam Buka</th>
                    <th class="jam">Jam Tutup</th>
                </tr>
                <?php 
                $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
                foreach($jadwal as $data) { 
                    $id_hari = $data["hari"];
                    if($data['status'] == 1)
                    {
                        $isChecked = 'checked';
                        $isDisabled = '';
                    }
                    else
                    {
                        $isChecked = '';
                        $isDisabled = 'disabled';
                    }
                ?>
                <tr>
                    <td>
                        <input value="<?= $id_hari; ?>" name="checboxHari[]" type="checkbox" class="checkboxHari" <?= $isChecked; ?>>
                    </td>
                    <td class="jam"><?= $hari[$id_hari]; ?></td>
                    <td>
                        <div class="bootstrap-timepicker">
                            <input value="<?= $data['jam_buka']; ?>" type="text" class="form-control timepicker jam <?= $hari[$id_hari]; ?>" name="jam_buka[]" placeholder="Jam Booking" <?= $isDisabled; ?>>
                        </div>
                    </td>
                    <td>
                        <div class="bootstrap-timepicker">
                            <input value="<?= $data['jam_tutup']; ?>" type="text" class="form-control timepicker jam <?= $hari[$id_hari]; ?>" name="jam_tutup[]" placeholder="Jam Booking" <?= $isDisabled; ?>>
                        </div>
                    </td>
                </tr>
                <? } ?>
            </tbody>
        </table>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <?= form_close(); ?>
    </div><!-- /.box-body -->
</div>