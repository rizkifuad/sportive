<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Quick Example</h3>
    </div><!-- /.box-header -->
    <!-- form penyimpanan booking -->
    <form role="form" method="post" action="<?=base_url("admin/booking/save_booking")?>">
        <div class="box-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Booking" data-date-format="YYYY-MM-DD"required>
            </div>
            <div class="form-group bootstrap-timepicker">
                <label for="tanggal">Jam</label>
                <input type="text" class="form-control timepicker " id="jam" name="jam" placeholder="Jam Booking" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi Jam</label>
                <input type="number" class="form-control" name="durasi" id="durasi" placeholder="Durasi Jam">
            </div>
            <div class="form-group">
                <label for="DP">
                Jumlah DP</label>
                <input type="number" class="form-control" name="dp" id="dp" placeholder="Jumlah DP" 
                min="<?=$dp["uang_muka"]?>">
            </div>
            <div class="form-group">
                <label for="DP">Lapangan</label>
                <select class="form-control" id="lapangan" name="lapangan">
                    <!-- Get list lapangan by member id -->
                    <?php 
                        foreach ($lapangan as $key => $value) {
                            echo ("<option>".$value->nama_lapangan."</option>");
                        }

                    ?>
                </select>
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form> <!-- /.form penyimpanan booking -->

</div><!-- /.box -->